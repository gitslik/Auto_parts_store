<?php

/**
 * Class Users
 */
class Users extends DB\SQL\Mapper
{

  /**
   * Users constructor.
   * @param \DB\SQL $db
   */
  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'users');
  }


}

?>