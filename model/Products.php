<?php

/**
 * Class Products
 */
class Products extends DB\SQL\Mapper
{

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
  public function getMainPhoto(){
   global $db;

  $FilesTable = new Files($db);
   $files = $FilesTable->load(array('product_id=? and type=0',$this->product_id));

   if($files){
     return $files->url;
   }else{
     return $this->getDefaulImage();
   }
   return false;
 }

  public function deleteProducts($id)
  {
    $product_row = $this->load(
      array('product_id = ?',$id)
    );
    if (count($product_row)==1) {
      $product_row->erase();
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
  return mb_substr(strip_tags(htmlspecialchars_decode($this->description)), 0, 50);
 }
}

?>