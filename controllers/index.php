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
    $f3->set("categories", $categories);
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
    $products = $ProductClass->find(array('ca'),array());
    $f3->set("categories", $categories);
    $f3->set("thisCategory", $thisCategory);
    $f3->set("products", $products);
    self::layout('category.php');
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
}