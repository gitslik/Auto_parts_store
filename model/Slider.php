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
    $sliders = $db->exec('SELECT * FROM slider WHERE sub_id = 0');
    return $sliders;
  }

  static function getSlideItem($id_slide)
  {
    global $db;
    $sliders = $db->exec("SELECT * FROM slider WHERE id = {$id_slide}");
    return $sliders;
  }

  static function updateSlideItem($params)
  {
    global $db;
    $db->exec("UPDATE slider SET url = ?, `position` = ? WHERE id = ?",
      array(1 => $params['url'],2=>$params['position'],3=>$params['id']));
  }

  static function deleteSlideItem($params)
  {
    global $db;
    $db->exec('DELETE FROM slider WHERE id=?', array(1 => $params['id']));
    return true;
  }


  static function uploadSlideFile($files){
    print_die($_FILES);
    if (is_uploaded_file($_FILES["uploadfile"]["tmp_name"])){
      move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "./uploads/".$_FILES["uploadfile"]["name"]);
      return "uploads/".$_FILES["uploadfile"]["name"];
    }else{
      return false;
    }
  }

  static function addSlideItem($params)
  {
    global $db;
    $db->exec("INSERT INTO slider SET sub_id=?,url=?,`position`=?",
      array(1=>'0',2=>$params['url'],3=>$params['position']));
  }

/*  static function updatePosition()
  {
    global $db;
    $db->exec("UPDATE slider SET `position` = ? WHERE id = ?",
      array(1 => $params['url'],2=>$params['position'],3=>$params['id']));
  }*/

}

?>