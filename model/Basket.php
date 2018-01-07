<?php

class Basket extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'basket');
  }

  public function getBasket()
  {

    $basket = $this->load(
      array('`user_id` = ?',$_SESSION['user'])
    );

    if(!$basket){

      $this->user_id = $_SESSION['user'];
      $this->active = '1';
      $this->date = time();
      $this->save();
      $basket = $this->load(
        array('user_id = ?',$_SESSION['user'])
      );
    }
    return $basket;
  }
}

?>