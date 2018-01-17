<?php

class Admin
{

  static protected $base_derectory = "../view/admin/";

  static function adminPage()
  {
    self::layout('index.php');
  }


  /*Login*/
  static function adminLoginForm(){
    self::layout_only_tpl('login.php');
  }
  static function adminLogout(){
    session_start();//стартуем сессию
    unset ($_SESSION['$logSESS']);//удаляем зарегистрированную глобальную переменную
    session_destroy();//уничтожаем сессию
    header("location: ../");//перебрасываем на главную страницу пользовательской части
    exit;
  }
  static function adminAuth(){
    global $db;
      //АВТОРИЗАЦИЯ
      //уничтожаем переменную с логином и паролем которые были созданы путем ввода их в строку
        if (isset ($_GET['loginDB'])) {$loginDB = $_GET['loginDB'];unset($loginDB);}
        if (isset ($_GET['passDB'])) {$passDB = $_GET['passDB'];unset($passDB);}

      //заносим в отдельные переменные логин и пароль присланных с помощью post запроса
        if (isset ($_POST['loginDB'])) {$loginDB = $_POST['loginDB'];}
        if (isset ($_POST['passDB'])) {$passDB = $_POST['passDB'];}

        if(isset($loginDB) AND isset($passDB))//если существуют логин и пароль
        {
          if(preg_match("/^[a-zA-Z0-9_-]+$/s",$loginDB) AND preg_match("/^[a-zA-Z0-9]+$/s",$passDB))//проверяем их на корректность ввода с помощью регулярных выражений
          {
            $prov = getenv('HTTP_REFERER');//определяем страницу с который пришел запрос
            $prov = str_replace("www.","",$prov);//удаляем www если есть
            preg_match("/(http\:\/\/[-a-z0-9_.]+\/)/",$prov,$prov_pm);//чистим адресс от лишнего, нам необходимо добиться ссылки вот такого вида http://xxxx.ru
            $prov = $prov_pm[1];//заносим чистый адрес в отдельную переменную
            $server_root = BASE_URL."/";
            $server_root = str_replace("www.","",$server_root);//удаляем www если есть

            if($server_root == $prov)//если адрес нашего блога и адрес страницы с которой был прислан зарос равны
            {
              $passDB = md5($passDB);//шифруем введенный пароль
              $users_obj = new Users($db);
              $log_and_pass = $users_obj->load(
                array('login = ?',$loginDB)
              );
              if($log_and_pass != "")//если был выведен результат из БД
              {
                if($loginDB == $log_and_pass[login] AND $passDB == $log_and_pass[pass])//если введенная информация совпадает с информацией из БД
                {
                  session_start();//стартуем сессию
                  $_SESSION['$logSESS'] = $log_and_pass[login];//создаем глобальную переменную
                  header("location: /admin");//переносим пользователя на главную страницу
                  exit;
                }
                else//если введеная инфо не совпадает с инфо из БД
                {
                  header("location: /admin/login");//переносим на форму авторизации
                  exit;
                }
              }
              else//если не найдено такого юзера в БД
              {
                header("location: /admin/login");//переносим на форму авторизации
                exit;
              }
            }
            else//если запрос был послан с другого адреса
            {
              header("location: /admin/login");//переносим на форму авторизации
              exit;
            }
          }
          else//если введены не корректный логин и пароль
          {
            header("location: /admin/login");//переносим на форму авторизации
            exit;
          }
        }
  }
  /*End Login*/

  /*Pages*/
  static function adminPages()
  {
    global $db,$f3;
    $pages_object = new Pages($db);
    $all_pages = $pages_object->find();
    $f3->set("all_pages", $all_pages);
    self::layout_only_tpl('page/index.php');
  }
  static function addPages()
  {
    global $f3, $db;
    $menu_obj = new Menu($db);
    $menus = $menu_obj->find();

    $f3->set("all_menus", $menus);
    self::layout('page/addPages.php');
  }
  static function savePages(){

    global $db,$f3;

    $pages_object = new Pages($db);
    $array_for_save['title'] = $_REQUEST['title'];
    $array_for_save['description'] = $_REQUEST['description'];
    $array_for_save['enabled'] = $_REQUEST['enabled'];
    $array_for_save['menu_id'] = $_REQUEST['menu_id'];

    $pages_object->copyfrom($array_for_save);
    $pages_object->save();

    $all_pages = $pages_object->find();
    $f3->set("all_pages", $all_pages);

    self::layout_only_tpl('page/index.php');
  }
  static function editPages(){
    global $db,$f3;
    if (isset($_REQUEST['id'])) {
      $id = $_REQUEST["id"];
      $pages_object = new Pages($db);
      $page_for_update = $pages_object->load(
        array('page_id = ?',$id)
      );

      $menu_obj = new Menu($db);
      $menus = $menu_obj->find();

      $f3->set("all_menus", $menus);

      $f3->set("page_for_update", $page_for_update);
      self::layout('page/editPages.php');
    }
  }

  static function updatePages(){

    global $db,$f3;

    $pages_object = new Pages($db);
    $array_for_save['title'] = $_REQUEST['title'];
    $array_for_save['description'] = $_REQUEST['description'];
    $array_for_save['enabled'] = $_REQUEST['enabled'];
    $array_for_save['menu_id'] = $_REQUEST['menu_id'];

    $page_find = $pages_object->load(
      array('page_id = ?',$_REQUEST['page_id'])
    );

    if (isset($page_find)){
      $page_find->title = $_REQUEST['title'];
      $page_find->description = $_REQUEST['description'];
      $page_find->enabled = $_REQUEST['enabled'];
      $page_find->menu_id = $_REQUEST['menu_id'];
      $page_find->save();
    }

    $all_pages = $pages_object->find();
    $f3->set("all_pages", $all_pages);

    self::layout_only_tpl('page/index.php');
  }


  static function deletePages(){
    global $db;
    $pages_object = new Pages($db);
    $page_for_delete = $pages_object->load(
      array('page_id = ?',$_REQUEST['id'])
    );

    if (isset($page_for_delete)){
      $page_for_delete->erase();
    }
    header("location: /admin");
  }
  /*EndPages*/

  /*Poducts*/
  static function adminProducts()
  {
    global $db,$f3;
    $categories_obj = new Category($db);
    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout('products/index.php');
  }
  static function adminViewProducts($f3)
  {
    global $db,$f3;
    $id = ($f3->POST['id']);
    $products_obj = new Products($db);
    $products = $products_obj->getProductsOfCategory((int)$id);

    $f3->set("all_products_this_category", $products);
    self::layout_only_tpl('products/viewProducts.php');
  }
  static function adminAddProducts()
  {
    global $db,$f3;

    $category = new Category($db);
    $categories = $category->getMenu();
    $f3->set("all_category", $categories);

    self::layout('products/addProducts.php');
  }
  static function adminSaveProduct()
  {
    global $db,$f3;

    $files_photo = $_FILES;

    $params = explode('&',$_REQUEST['params']);

    $array_params = array();
    foreach ($params as $param ) {
      $options = (explode('=',$param));
      $array_params[$options[0]] = $options[1];
    }

    $files_object = new Files($db);
    $path_new_file_in_directory = $files_object->uploadProductsPhotos($files_photo);

    $product_table = new Products($db);

    $array_params['photo_id'] = 0;

    $array_fin_for_save = array();

    $array_fin_for_save['name'] = $_REQUEST['name'];
    $array_fin_for_save['description'] = $_REQUEST['description'];
    $array_fin_for_save['price'] = $array_params['price'];
    $array_fin_for_save['product_code'] = $array_params['product_code'];
    $array_fin_for_save['condition'] = $array_params['condition'];
    $array_fin_for_save['part_number'] = $array_params['part_number'];
    $array_fin_for_save['photo_id'] = 0;
    $array_fin_for_save['category_id'] = $array_params['category_id'];

    $product_table->copyfrom($array_fin_for_save);
    if(!$product_table->save()){
      header("location: /admin");
    }

    $lastInsertIdProducts = $product_table->get('_id');

    foreach ($path_new_file_in_directory as $path) {
      $files_object = new Files($db);
      $array_for_files = array();
      $array_for_files['path'] = $path;
      $array_for_files['url'] = $path;
      $array_for_files['type'] = 0;
      $array_for_files['product_id'] = $lastInsertIdProducts;

      $files_object->copyfrom($array_for_files);
      $files_object->save();
    }

    $categories_obj = new Category($db);
    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout_only_tpl('products/index.php');
  }


  static function deleteProduct(){
    global $f3, $db;

    $id = $_REQUEST['id'];
    if (isset($id)) {
      $categories_obj = new Products($db);
      $categories_obj->deleteProducts($id);
    }
    $categories_obj = new Category($db);
    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout('products/index.php');
  }

  static function editProducts(){

    global $db,$f3;

    $id =$_REQUEST['id'];

    $category = new Category($db);
    $categories = $category->getMenu();


    $product_obj = new Products($db);

    $products_for_edit = $product_obj->load(array('product_id =?',$id));

    $file_obj = new Files($db);

    $files_for_edit = $file_obj->find(array('product_id =? and type = 0',$id));

    //print_die(count($files_for_edit));
    $f3->set("files_for_edit", $files_for_edit);
    $f3->set("product", $products_for_edit);
    $f3->set("all_category", $categories);
    self::layout('products/editProducts.php');
  }

  static function deleteImageProduct(){
    global $db;
    $obj_file = new Files($db);
    $file_for_delete = $obj_file->load(
      array('file_id = ?',$_REQUEST["options"])
    );

    if (isset($file_for_delete)){
      $file_for_delete->erase();
      return true;
    }
  }
  static function updateProducts(){

  }
  /*End Products*/



  /*Category*/
  static function adminCategory()
  {
    global $f3, $db;
    $categories_obj = new Category($db);
    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout_only_tpl('category/index.php');
  }
  static function addCategoryForm()
  {
    global $f3, $db;
    $categories_obj = new Category($db);
    $categories = $categories_obj->findHeadCategory();

    $f3->set("all_sub_categories", $categories);
    self::layout_only_tpl('category/addCategory.php');
  }
  static function saveCategoryForm()
  {
    global $f3, $db;
    $categories_obj = new Category($db);

    if (count($_FILES)) {
      $files_obj = new Files($db);
      $file_input = $_FILES;
      $path_category_photo = $files_obj->uploadCategoryPhotos($file_input);
    }

    $params = explode('&',$_REQUEST['params']);

    $array_params = array();
    foreach ($params as $param ) {
      $options = (explode('=',$param));
      $array_params[$options[0]] = $options[1];
    }

    $array_fin_for_save = array();

    $array_fin_for_save['name'] = $_REQUEST['name'];
    $array_fin_for_save['description'] = $_REQUEST['description'];
    $array_fin_for_save['parent_category_id'] = $array_params['parent_category_id'];
    $array_fin_for_save['photo_id'] = 0;
    $array_fin_for_save['enabled'] = $array_params['enabled'];

    $categories_obj->copyfrom($array_fin_for_save);
    $categories_obj->save();

    $lastInsertIdCategory = $categories_obj->get('_id');

    $array_for_files = array();

    $array_for_files['path'] = $path_category_photo[0];
    $array_for_files['url'] = $path_category_photo[0];
    $array_for_files['type'] = 1;
    $array_for_files['product_id'] = $lastInsertIdCategory;

    $files_obj->copyfrom($array_for_files);
    $files_obj->save();

    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout_only_tpl('category/index.php');
  }
  static function editCategoryForm()
  {
    $id_category = $_REQUEST['id'];
    global $f3, $db;
    $categories_obj = new Category($db);
    $categories = $categories_obj->findHeadCategory();

    $category_for_edit = $categories_obj->find(array('category_id =?',$id_category));

    $file_obj = new Files($db);

    $file_for_edit = $file_obj->find(array('product_id =? and type = 1',$id_category));

    $options = array();
    $options["info_category"] = $category_for_edit[0];
    $options["all_sub_categories"] = $categories;


    $f3->set("file_for_edit", $file_for_edit);
    $f3->set("options", $options);
    self::layout_only_tpl('category/editCategory.php');
  }
  static function updateCategoryForm(){

    global $f3, $db;

    $categories_obj = new Category($db);

    $cat = $categories_obj->load(
      array('category_id = ?',$_REQUEST['id'])
    );

    $array_fin_for_save['name'] = $_REQUEST['name'];
    $array_fin_for_save['description'] = $_REQUEST['description'];
    $array_fin_for_save['parent_category_id'] = $_REQUEST['parent_category_id'];
    $array_fin_for_save['photo_id'] = 0;
    $array_fin_for_save['enabled'] = 1;

    $cat->copyfrom($array_fin_for_save);
    $cat->save();


    if (count($_FILES)) {
      $files_obj = new Files($db);
      $file_input = $_FILES;
      $path_category_photo = $files_obj->uploadCategoryPhotos($file_input);

    $file_row = $files_obj->load(
      array('product_id = ? and type = 1',$_REQUEST['id'])
    );


    $array_for_files = array();

    $array_for_files['path'] = $path_category_photo[0];
    $array_for_files['url'] = $path_category_photo[0];

    if(!$file_row){
      $array_for_files['type'] = 1;
      $array_for_files['product_id'] = $_REQUEST['id'];
      $files_obj_for_save = new Files($db);
      $files_obj_for_save->copyfrom($array_for_files);
      $files_obj_for_save->save();
    }else{
      $file_row->copyfrom($array_for_files);
      $file_row->save();
    }


    }

    $categories_obj = new Category($db);
    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout_only_tpl('category/index.php');

  }
  static function deleteCategory($id)
  {
    global $f3, $db;
    $categories_obj = new Category($db);

    $id = $id['PARAMS']['id'];
    if (isset($id)) {
      $categories_obj->deleteCategory($id);
    }

    $categories = $categories_obj->find();
    $f3->set("all_categories", $categories);
    self::layout_only_tpl('category/index.php');
  }
  /*End Category*/

  /*Menu*/
  static function adminMenu()
  {
    global $f3, $db;
    $menu_obj = new Menu($db);
    $menus = $menu_obj->find();

    $f3->set("all_menus", $menus);
    self::layout_only_tpl('menu/index.php');
  }
  static function addMenu(){
    self::layout_only_tpl('menu/addMenu.php');
  }
  static function addMenuSave(){
    global $f3, $db;
    $menu_obj = new Menu($db);
    $array_for_menu['name_menu'] = $f3->BODY;
    $menu_obj->copyfrom($array_for_menu);
    $menu_obj->save();
    $menus = $menu_obj->find();
    $f3->set("all_menus", $menus);
    self::layout_only_tpl('menu/index.php');
  }

  static function addMenuDelete(){
    global $f3, $db;
    $menu_obj = new Menu($db);
    $menu_for_delete = $menu_obj->load(
      array('id = ?',$_REQUEST['menu'])
    );

    if (isset($menu_for_delete)){
      $menu_for_delete->erase();
    }

    $menus = $menu_obj->find();
    $f3->set("all_menus", $menus);
    self::layout_only_tpl('menu/index.php');
  }

  static function adminFooter(){
    self::layout_only_tpl('footermenu/index.php');
  }

  static function adminFooterInfo(){
    global $f3, $db;
    $page_obj = new Pages($db);
    $pages = $page_obj->find(array('info =?',0));
    $pages_list = $page_obj->find(array('info =?',1));

    $f3->set("pages_lists", $pages_list);
    $f3->set("pages", $pages);
    self::layout_only_tpl('footermenu/info.php');
  }

  static function addInfopagesOption(){
    global $f3, $db;
    $page_obj = new Pages($db);

    $page_for_update = $page_obj->load(
      array('page_id = ?',$_REQUEST['page'])
    );

    $page_for_update['info'] = 1;

    $page_for_update->copyfrom($page_for_update);
    $page_for_update->save();

    $pages = $page_obj->find(array('info =?',0));
    $pages_list = $page_obj->find(array('info =?',1));

    $f3->set("pages_lists", $pages_list);
    $f3->set("pages", $pages);
    self::layout_only_tpl('footermenu/info.php');
  }
  static function deleteInfopagesOption(){
    global $f3, $db;
    $page_obj = new Pages($db);

    $page_for_update = $page_obj->load(
      array('page_id = ?',$_REQUEST['page'])
    );

    $page_for_update['info'] = 0;

    $page_for_update->copyfrom($page_for_update);
    $page_for_update->save();

    $pages = $page_obj->find(array('info =?',0));
    $pages_list = $page_obj->find(array('info =?',1));

    $f3->set("pages_lists", $pages_list);
    $f3->set("pages", $pages);
    self::layout_only_tpl('footermenu/info.php');
  }

  static function adminFooterSubscription(){
    global $f3, $db;
    $subscription_obj = new Subscription($db);
    $all_subscription = $subscription_obj->find();
    $f3->set("all_subscription", $all_subscription);
    self::layout_only_tpl('footermenu/subscription.php');
  }

  static function checkout(){
    global $f3, $db;
    $checkoutTable = new Checkout($db);
    $chekouts  = $checkoutTable->find(array(),array('order' => 'id  DESC'));
    $f3->set("chekouts", $chekouts);
    self::layout_only_tpl('checkout/index.php');
  }
  static function checkoutdetails(){
    global $f3, $db;
    $checkoutTable = new Checkout($db);
    $chekout  = $checkoutTable->load(
      array('basket=?',$_REQUEST['id'])
    );
    $basketItem = new BasketItem($db);
    $Products = new Products($db);
    $items  = $basketItem->getBasketItems($_REQUEST['id']);
    $f3->set("cart_items", $items);
    $f3->set("productTable", $Products);
    $f3->set("checkout", $chekout);
    self::layout_only_tpl('checkout/details.php');
  }
  static function statuscheckout(){
    global $f3, $db;
    $checkoutTable = new Checkout($db);
    $id = $_REQUEST['id'];
    $chekouts  = $checkoutTable->load(
      array('id=?',$id)
    );
    $chekouts->status = $_REQUEST['status_id'];
    $chekouts->save();
  }
  static function removecheckout(){
    global $f3, $db;
    $checkoutTable = new Checkout($db);
    $id = $_REQUEST['id'];
    $chekouts  = $checkoutTable->load(
      array('id=?',$id)
    );
    if ($chekouts) {
      $chekouts->erase();
    }
  }
  static function adminFooterCollbeack(){
    self::layout_only_tpl('footermenu/collbeack.php');
  }

  static function adminYoutube(){
    global $f3,$db;
    $obj_youtube = new Youtube($db);
    $video_id = $obj_youtube->find();
    if (isset($video_id[0]->id_youtube)) {
      $key_video = $video_id[0]->id_youtube;
      $f3->set("key_video", $key_video);
    }
    self::layout_only_tpl('youtube/index.php');
  }

  static function addYoutube(){
    global $f3,$db;

    $id_youtube = trim($_REQUEST["id"]);


    $obj_youtube = new Youtube($db);


    $obj_youtube::addYoutubeItem($id_youtube);

    $video_id = $obj_youtube->find();
    if (isset($video_id[0]->id_youtube)) {
      $key_video = $video_id[0]->id_youtube;
      $f3->set("key_video", $key_video);
    }
    self::layout_only_tpl('youtube/index.php');
  }

  static function deleteYoutube(){
    global $f3, $db;
    $obj_youtube = new Youtube($db);
    $youtube_for_delete = $obj_youtube->load(
      array('id_youtube = ?',$_REQUEST["options"])
    );

    if (isset($youtube_for_delete)){
      $youtube_for_delete->erase();
    }

    $video_id = $obj_youtube->find();
    if (isset($video_id[0]->id_youtube)) {
      $key_video = $video_id[0]->id_youtube;
      $f3->set("key_video", $key_video);
    }
    self::layout_only_tpl('youtube/index.php');
  }
  /*End Menu*/

  /*Slider*/
  static function adminSliderPage()
  {
    global $f3;
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_slider)>0) {
      $f3->set("all_sliders", $all_slider);
    }
    self::layout_only_tpl('slider/index.php');
  }
  static function adminDeleteSlideItem()
  {
    global $f3;
    Slider::deleteSlideItem($_REQUEST['id']);
    $all_slider = Slider::getSlideIconIndexPage();
    if (count($all_slider)>0) {
      $f3->set("all_sliders", $all_slider);
    }
    self::layout_only_tpl('slider/index.php');
  }
  static function adminAddSlider()
  {
    global $f3;

    self::layout_only_tpl('slider/add-slider.php');
  }
  static function adminUploadSlider($f3)
  {
    global $f3;

    $file = Files::uploadFile($_FILES['img']);
    $params = array();
    $params['url'] = $file;
    Slider::addSlideItem($params);

    $all_slider = Slider::getSlideIconIndexPage();
    if (count($all_slider)>0) {
      $f3->set("all_sliders", $all_slider);
    }
    self::layout_only_tpl('slider/index.php');
  }
  /*End Slider*/

  static function layout($template)
  {
    echo View::instance()->render(self::$base_derectory . 'header.php');
    echo View::instance()->render(self::$base_derectory . $template);
    echo View::instance()->render(self::$base_derectory . 'footer.php');
  }

  static function layout_only_tpl($template)
  {
    echo View::instance()->render(self::$base_derectory . $template);
  }
}