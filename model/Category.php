<?php

/**
 * Class Category
 */
class Category extends DB\SQL\Mapper
{

/*  public $category_id;

  public $name;

  public $parent_category_id;

  public $photo_id;

  public $enabled;*/

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