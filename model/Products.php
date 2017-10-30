<?php

class Products extends DB\SQL\Mapper
{
  public $product_id;

  public $name;

  public $description;

  public $price;

  public $photo_id;

  public $photo;

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'poducts');
  }


}

?>