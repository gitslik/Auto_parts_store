<?php

class Index
{

  static protected $base_derectory = "../view/";

  static function indexPage()
  {

    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    $categories_main = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }
    foreach($menu as $key => $m){

      $categories_main[$m->category_id]['menu']  = $m;

    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $ProductClass = new Products($db);
    $recomended = $ProductClass->find(array('product_id >0'),array('order' => 'product_id DESC','limit' => 3,'offset' => 0));
    $news = $ProductClass->find(array('product_id >0'),array('order' => 'product_id  ASC','limit' => 3,'offset' => 0));
    $f3->set("categories", $categories);
    $f3->set("categories_main", $categories_main);
    $f3->set("recomended", $recomended);
    $f3->set("news", $news);
    $obj_youtube = new Youtube($db);
    $video_id = $obj_youtube->find();
    if (isset($video_id[0]->id_youtube)) {
      $key_video = $video_id[0]->id_youtube;
      $f3->set("key_video", $key_video);
    }
    self::layout('index.php');
  }
  static function category()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $id = $_GET['id'];
    $thisCategory  = $CategoryClass->load(array('category_id=?',$id));
    $ProductClass = new Products($db);
    $allChildCategories  = $CategoryClass->find(array('parent_category_id=?',$id));
    $idsCategory  = array($id);
    foreach($allChildCategories as $catHil){
      $idsCategory[]  = $catHil->category_id;
    }
    $position = 0;
    if(isset($_GET['page'])){
      $position = (int)$_GET['page'];
    }
    $products = $ProductClass->paginate($position,6,array('category_id in('.implode(',',$idsCategory).')'));
/*    print_arr($position);
    print_die($products);*/
    $f3->set("categories", $categories);
    $f3->set("thisCategory", $thisCategory);
    $f3->set("products", $products);

    self::layout('category.php');
  }
  static function page()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }

    $PageClass = new Pages($db);
    $allChildCategories  = $CategoryClass->find(array('parent_category_id=?',$id));
    $idsCategory  = array($id);
    foreach($allChildCategories as $catHil){
      $idsCategory[]  = $catHil->category_id;
    }


    $page = $PageClass->load(array('menu_id=?',$f3->get('PARAMS.page_id')));

    $f3->set("categories", $categories);

    $f3->set("page", $page);
    self::layout('page.php');
  }
  static function search()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $search = mb_strtolower($_GET['search']);
    $array_search  = explode(' ', $search);
    $ProductClass = new Products($db);
    $querySelect  = "LOWER(name) like '%".htmlspecialchars($search)."%' or LOWER(description) like '%".htmlspecialchars($search)."%' ";
    foreach($array_search as $word){
      $querySelect .="or LOWER(name) like '%".htmlspecialchars($word)."%' or LOWER(description) like '%".htmlspecialchars($word)."%' ";
    }
    $products = $ProductClass->find(array($querySelect));

    $f3->set("categories", $categories);
    $f3->set("thisCategory", 'Поиск');
    $f3->set("products", array('subset'=>$products));
    self::layout('search.php');
  }
  static function checkout(){
    global $db;
    global $f3;

    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }

    $basketModel = new Basket($db);
    $basketItem = new BasketItem($db);
    $Products = new Products($db);
    $basket = $basketModel->getBasket();
    $items  = $basketItem->getBasketItems($basket->basket_id);
    $main_price  = 0;


    foreach($items as $item) {
      $product = $Products->load(
        array('product_id=?', $item->product_id)
      );
      $main_price = $main_price + ($product->price * $item->quantity);
    }
    $checkoutTable = new Checkout($db);

    $array_data  = array(
      'user_id' => $_SESSION['user'],
      'name' => (strip_tags(htmlspecialchars($_POST['fio']))),
      'address' => strip_tags(htmlspecialchars($_POST['adress'])),
      'email' => strip_tags(htmlspecialchars($_POST['email'])),
      'phone' => strip_tags(htmlspecialchars($_POST['phone'])),
      'status' => 1,
      'basket' => $basket->basket_id,
      'total' => $main_price,
      'date' => date('Y-m-d H:m:s'),
    );
    $checkoutTable->copyfrom($array_data);
    $checkoutTable->save();
    $basket->active = 0;
    $basket->save();
    $_SESSION['user'] = rand(11111111,99999999);
    $f3->set("categories", $categories);
    $f3->set("thisCategory", 'Оформление заказа');
    $f3->set("allSum", $main_price);
    $f3->set("cart_items", $items);
    self::sendInfoEmail();
    self::layout('checkout.php');

  }
  static function cart()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }

    $basketModel = new Basket($db);
    $basketItem = new BasketItem($db);
    $Products = new Products($db);
    $basket = $basketModel->getBasket();
    $items  = $basketItem->getBasketItems($basket->basket_id);
    $main_price  = 0;


    $f3->set("categories", $categories);
    $f3->set("thisCategory", 'Корзина');
    $f3->set("productTable", $Products);
    $f3->set("cart_items", $items);
    self::layout('cart.php');
  }
  static function cart_add(){
    global $db;
    $basketModel = new Basket($db);
    $basketItem = new BasketItem($db);
    $basket = $basketModel->getBasket();
    $product_id = $_REQUEST['product_id'];
    $quantity = $_REQUEST['quantity'];
    $items  = $basketItem->addItem($basket->basket_id,$product_id,$quantity);
    $count = 0;
    if(isset($items[0]) && isset($items[0]['count']) && $items[0]['count']>0){
      $count = $items[0]['count'];
    }
    echo json_encode(array('redirect'=>0,'success'=>true,'text_items2'=>"Количество ({$count})"));

  }

  static function updatequantity(){
    global $db;
    $basketModel = new Basket($db);
    $basketItem = new BasketItem($db);
    $basket = $basketModel->getBasket();
    $product_id = $_REQUEST['product_id'];
    $quantity = $_REQUEST['quantity'];
    $items  = $basketItem->updatequantity($basket->basket_id,$product_id,$quantity);

  }

  static function cart_count(){
    global $db;
    $basketModel = new Basket($db);
    $basketItem = new BasketItem($db);
    $basket = $basketModel->getBasket();
    $items = $db->exec('SELECT SUM(quantity) as count FROM basket_items WHERE basket_id = ' . $basket->basket_id);
    $count = 0;
    if(isset($items[0]) && isset($items[0]['count']) && $items[0]['count']>0){
      $count = $items[0]['count'];
    }
    echo "Количество ({$count}) ";

  }
  static function cart_info(){
    global $db;
    $basketModel = new Basket($db);
    $basketItem = new BasketItem($db);
    $Products = new Products($db);
    $basket = $basketModel->getBasket();
    $items  = $basketItem->getBasketItems($basket->basket_id);
    $main_price  = 0;
    foreach($items as $item){
      $product = $Products->load(
        array('product_id=?',$item->product_id)
      );
      $main_price = $main_price + ($product->price * $item->quantity);
      echo ' <li>
              <p>'.mb_substr($product->name,0,50). '  - ('.$item->quantity.')  '.($product->price * $item->quantity).' сом</p>
            </li>';
    }
    echo ' <li style="padding: 8px">
            <h4 class="text-center" style="    margin: 0;">Итого '.$main_price.' сом</h4>
            </li>';
    echo ' <li>
             <div class="button-group">
          <a type="button" class="btn-primary" href="/cart" style="font-size: 10px;   color:#fff; "> <i class="fa fa-shopping-cart"></i> <span>Завершить покупку</span> </a>
        </div>
            </li>';

  }
  static function view_product(){
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $id = $_GET['id'];
    $ProductClass = new Products($db);

    $product  = $ProductClass->load(array('product_id=?',$id));
    $f3->set("categories", $categories);
    $f3->set("thisCategory", 'Поиск');
    $f3->set("product", $product);
    self::layout('product.php');
  }
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
  static function sendInfoEmail(){
    /*$sender = new sender;*/
    $message = "Новый заказ на сайте, можете пожалуйста проверить " . BASE_URL;





    $message_data = array(
      'to'		=> 'technicavtoservice@gmail.com',
      'to_name' 	=> 'Auti Poin',
      'title'		=> 'Новый заказ на сайте',
      'text'		=> $message,
      'alt_text'	=> strip_tags($message)
    );
    mail($message_data['to'],$message_data['title'],$message);
/*    $mailSend = $sender->sendMail($sender->smtp_data, $message_data);
    if($mailSend == 0)
    {
      echo "MF000";
    }
    else
    {
      echo "Error";
    }*/
  }
}