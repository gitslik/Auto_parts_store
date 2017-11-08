<?php

class Files extends DB\SQL\Mapper
{
  public $file_id;

  public $path;

  public $url;

  public $product_id;

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'files');
  }



  static function uploadFile($files){
    if (is_uploaded_file($files["tmp_name"])){
      move_uploaded_file($files["tmp_name"], "./uploads/".$files["name"]);
      return "uploads/".$files["name"];
    }else{
      return false;
    }
  }


  public function uploadProductsPhotos($files){
    if (count($files)) {
      $array_photo_path = array();
      foreach ($files as $file) {
        if (is_uploaded_file($file["tmp_name"])){
          move_uploaded_file($file["tmp_name"], "./products_photos/".$file["name"]);
          $array_photo_path[] = "products_photos/".$file["name"];
        }
      }
      return $array_photo_path;
    }
  }


}

?>