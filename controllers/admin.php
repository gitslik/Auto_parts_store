<?php

class Admin
{

  static protected $base_derectory = "../view/admin/";

  static function adminPage()
  {
    global $f3;
    self::layout('index.php');
  }


  static function adminPages()
  {
    self::layout_only_tpl('page/index.php');
  }



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
    print_arr($_FILES);
    $params = explode('&',$_REQUEST['params']);
    print_arr($params);
    print_die($_REQUEST);

    $category = new Category($db);
    $categories = $category->getMenu();
    $f3->set("all_category", $categories);

    self::layout_only_tpl('products/addProducts.php');
  }
  /*End Products*/



  static function adminCategory()
  {
    self::layout_only_tpl('category/index.php');
  }

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