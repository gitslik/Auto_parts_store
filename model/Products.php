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

  public $product_code;

  public $condition;

  public $part_number;

  public $photo_id;

  public $category_id;*/

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
   global $db;

  $FilesTable = new Files($db);
   $files = $FilesTable->find(array('product_id=? and type=0',$this->product_id));
   if(count($files)){
     return $files;
   }
   return false;
 }

 public function getDefaulImage(){
  return BASE_URL . '/image/ImageProduct.jpg';
 }
 public function getPrize(){
  return $this->price . ' сом';
 }
 public function getShorDescription(){
  return mb_substr($this->description, 0, 50);
 }
}

?>