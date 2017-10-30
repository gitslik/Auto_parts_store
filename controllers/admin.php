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

  static function adminProducts()
  {
    self::layout_only_tpl('products/index.php');
  }

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
    print_die($_REQUEST);
    Slider::deleteSlideItem();
  }
  static function adminEditSlider()
  {
    print_die($_REQUEST);
  }
  static function adminAddSlider()
  {

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