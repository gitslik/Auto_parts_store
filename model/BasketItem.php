<?php

class BasketItem extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'basket_items');
  }

  public function getBasketItems($id)
  {
    return $this->find(array("basket_id=?",$id));
  }
  public function addItem($basket_id,$product_id,$quantity)
  {
    $basket = $this->load(
      array('basket_id = ? and 	product_id=?',$basket_id,$product_id)
    );
      if($basket){
        $basket->quantity = $basket->quantity + $quantity;
        $basket->save();
      }else{
        $array_basket = array();
        $array_basket['basket_id'] = $basket_id;
        $array_basket['product_id'] = $product_id;
        $array_basket['quantity'] = $quantity;

        $this->copyfrom($array_basket);
        $this->save();
      }
    return 'added';
  }
}

?>