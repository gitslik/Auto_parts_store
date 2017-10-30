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


}

?>