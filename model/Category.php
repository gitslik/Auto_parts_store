<?php

/**
 * Class Category
 */
class Category extends DB\SQL\Mapper
{
 /* public $name;

  public $category_id;

  public $has_parent;

  public $enabled;

  public $photo_id;

  public $photo;*/
  /**
   * Category constructor.
   * @param \DB\SQL $db
   */
  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'category');
  }

  public function getMenu(){
  return $this->find(
    array('enabled >?',0)
     );
  }

}

?>