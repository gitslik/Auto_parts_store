<?php

class Slider extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'menu');
  }

  static function getSlideIconIndexPage()
  {
    global $db;
    $slider_icons = $db->exec('SELECT * FROM slider WHERE sub_id = 0');
    return $slider_icons;
  }
}

?>