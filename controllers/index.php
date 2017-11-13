<?php

class Index
{

  static protected $base_derectory = "../view/";

  static function indexPage()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $f3->set("categories", $categories);
    self::layout('index.php');
  }
  static function category()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $id = $_GET['id'];
    $thisCategory  = $CategoryClass->load(array('category_id=?',$id));
    $ProductClass = new Products($db);
    $allChildCategories  = $CategoryClass->find(array('parent_category_id=?',$id));
    $idsCategory  = array($id);
    foreach($allChildCategories as $catHil){
      $idsCategory[]  = $catHil->category_id;
    }
    $position = 0;
    if(isset($_GET['page'])){
      $position = (int)$_GET['page'];
    }
    $products = $ProductClass->paginate($position,6,array('category_id in('.implode(',',$idsCategory).')'));
/*    print_arr($position);
    print_die($products);*/
    $f3->set("categories", $categories);
    $f3->set("thisCategory", $thisCategory);
    $f3->set("products", $products);

    self::layout('category.php');
  }
  static function page()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }

    $PageClass = new Page($db);
    $allChildCategories  = $CategoryClass->find(array('parent_category_id=?',$id));
    $idsCategory  = array($id);
    foreach($allChildCategories as $catHil){
      $idsCategory[]  = $catHil->category_id;
    }

    $page = $PageClass->load(array('menu_id=?',$f3->get('PARAMS.page_id')));;
    $f3->set("categories", $categories);

    $f3->set("page", $page);
    self::layout('page.php');
  }
  static function search()
  {
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $search = mb_strtolower($_GET['search']);
    $array_search  = explode(' ', $search);
    $ProductClass = new Products($db);
    $querySelect  = "LOWER(name) like '%".htmlspecialchars($search)."%' or LOWER(description) like '%".htmlspecialchars($search)."%' ";
    foreach($array_search as $word){
      $querySelect .="or LOWER(name) like '%".htmlspecialchars($word)."%' or LOWER(description) like '%".htmlspecialchars($word)."%' ";
    }
    $products = $ProductClass->find(array($querySelect));
    $f3->set("categories", $categories);
    $f3->set("thisCategory", 'Поиск');
    $f3->set("products", $products);
    self::layout('search.php');
  }
  static function view_product(){
    global $f3;
    $all_menus = Menu::allMenu();
    $all_slider = Slider::getSlideIconIndexPage();

    if (count($all_menus)>0 && count($all_slider)>0) {
      $f3->set("all_menus", $all_menus);
      $f3->set("all_sliders", $all_slider);
    }
    global $db;
    $CategoryClass = new Category($db);
    $menu = $CategoryClass->getMenu();
    $categories = array();
    foreach($menu as $key => $m){
      if($m->parent_category_id <= 0){
        $categories[$m->category_id]['menu']  = $m;
      }
    }

    foreach($menu as $key => $c){

      if($c->parent_category_id>0 ){
        $categories[$c->parent_category_id]['child'][$c->category_id] = $c;
      }
    }
    $id = $_GET['id'];
    $ProductClass = new Products($db);

    $product  = $ProductClass->load(array('product_id=?',$id));
    $f3->set("categories", $categories);
    $f3->set("thisCategory", 'Поиск');
    $f3->set("product", $product);
    self::layout('product.php');
  }
  static function layout($template)
  {
    echo View::instance()->render(self::$base_derectory . 'header.php');
    echo View::instance()->render(self::$base_derectory . $template);
    echo View::instance()->render(self::$base_derectory . 'footer.php');
  }

  static function layout_only_tpl($template)
  {
    echo View::instance()->render(self::$base_derectory . $template);
  }
}