<?php

class Youtube extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'youtube');
  }



  static function addYoutubeItem($id)
  {
    global $db;
    if (isset($id) && $id != "") {
      $youtube_url = $db->exec("SELECT * FROM youtube WHERE id = 1");

      if (count($youtube_url)==0) {
       $result = $db->exec("INSERT INTO youtube SET id_youtube =?", array(1=>$id));
      } elseif (count($youtube_url)==1) {
       $result = $db->exec("UPDATE youtube SET id_youtube = ? WHERE id = 1", array(1=>$id));
      } else {
       $result = false;
      }
    }
    return $result;
  }

}

?>