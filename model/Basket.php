<?php

class Basket extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'basket');
  }

  public function getBasket()
  {
    $id = $_SESSION['user'];
    $basket = $this->load(
      array('user_id = ?',$id)
    );
    if(!$basket){
      $array_basket = array();
      $array_basket['user_id'] = $id;
      $array_basket['active'] = '1';
      $array_basket['date'] = time();

      $this->copyfrom($array_basket);
      $this->save();
      $basket = $this->load(
        array('basket_id = ?',$this->lastInsertId())
      );
    }
    return $basket;
  }
}

?>