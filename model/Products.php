<?php

/**
 * Class Products
 */
class Products extends DB\SQL\Mapper
{
 /* public $product_id;

  public $name;

  public $description;

  public $price;

  public $photo_id;

  public $photo;*/

  /**
   * Products constructor.
   * @param \DB\SQL $db
   */
  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'products');
  }

  public function getProductsOfCategory($id)
  {
    return $this->find(array("category_id=?",$id));
  }

}

?>