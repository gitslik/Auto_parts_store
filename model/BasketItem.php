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
}

?>