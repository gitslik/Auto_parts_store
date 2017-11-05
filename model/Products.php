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
 public function getPhotoUrl(){
  return false;
 }

 public function getDefaulImage(){
  return BASE_URL . '/image/ImageProduct.jpg';
 }
 public function getPrize(){
  return $this->price . ' сом';
 }
 public function getShorDescription(){
  return mb_substr($this->description, 0, 100);
 }
}

?>