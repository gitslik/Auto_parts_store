<?php

class Index
{

  static protected $base_derectory = "../view/";

  static function indexPage()
  {
    global $f3;
    $all_menus = Menu::allMenu();

    if (count($all_menus)>0) {
      $f3->set("all_menus", $all_menus);
    }

    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_slider)>0) {
      $f3->set("all_sliders", $all_slider);
    }

    self::layout('index.php');
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