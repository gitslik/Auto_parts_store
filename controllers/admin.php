<?php

class Admin
{

  static protected $base_derectory = "../view/admin/";

  static function adminPage()
  {
    global $f3;
    self::layout('index.php');
  }

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

    self::layout_only_tpl('page/addPages.php');
  }
  static function savePages(){}
  static function editPages(){}
  static function updatePages(){}
  static function deletePages(){}
  /*EndPages*/

  /*Poducts*/
  static function adminProducts()
  {
    global $db,$f3;
    $categories_obj = new Category($db);
    $categories = $categories_obj->find();

    $f3->set("all_categories", $categories);
    self::layout_only_tpl('products/index.php');
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

    self::layout_only_tpl('products/addProducts.php');
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

    $array_fin_for_save['name'] = $array_params['name'];
    $array_fin_for_save['description'] = $array_params['description'];
    $array_fin_for_save['price'] = $array_params['price'];
    $array_fin_for_save['product_code'] = $array_params['product_code'];
    $array_fin_for_save['condition'] = $array_params['condition'];
    $array_fin_for_save['part_number'] = $array_params['part_number'];
    $array_fin_for_save['photo_id'] = 0;
    $array_fin_for_save['category_id'] = $array_params['category_id'];

    $product_table->copyfrom($array_fin_for_save);
    $product_table->save();

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

  static function adminMenu()
  {
    self::layout_only_tpl('menu/index.php');
  }


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
  static function adminEditSlider()
  {
    print_die($_REQUEST);
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