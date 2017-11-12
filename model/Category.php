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

  public function findHeadCategory(){
    return $this->find('parent_category_id = 0');
  }

  public function deleteCategory($id)
  {
    $category_id = explode('=',$id);

    $cat_row = $this->load(
      array('category_id = ?',$category_id[1])
    );

    if (count($cat_row)==1) {
      $cat_row->erase();
    }
    return false;
  }

}

?>