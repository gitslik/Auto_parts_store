<?php

class Subscription extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'subscription');
  }

}

?>