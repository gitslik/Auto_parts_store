<?php

class Files extends DB\SQL\Mapper
{
  public $file_id;

  public $path;

  public $url;

  public $product_id;

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'poducts');
  }

  static function uploadFile($files){
    if (is_uploaded_file($_FILES["uploadfile"]["tmp_name"])){
      move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "./uploads/".$_FILES["uploadfile"]["name"]);
      return "uploads/".$_FILES["uploadfile"]["name"];
    }else{
      return false;
    }
  }
}

?>