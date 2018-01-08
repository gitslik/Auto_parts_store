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
      array('`user_id` = ?',$id)
    );

    if(!$basket){

      $this->user_id = $id;
      $this->active = '1';
      $this->date = time();
      $this->save();
      $basket = $this->load(
        array('user_id = ?',$id)
      );
    }
    return $basket;
  }
}

?>