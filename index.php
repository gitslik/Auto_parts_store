<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*File with settigs include controllers and model*/
include 'main.php';
/*end settings*/


/*Frontend Routings*/
$f3->route('GET|POST /', 'Index::indexPage');
$f3->route('GET|POST /category', 'Index::category');
$f3->route('GET|POST /search', 'Index::search');
$f3->route('GET|POST /product', 'Index::view_product');

/*End Frontend Routings*/


/*Admin routings*/
$f3->route('GET|POST /admin', 'Admin::adminPage');
/*slider*/
$f3->route('GET|POST /admin/slider', 'Admin::adminSliderPage');
$f3->route('GET|POST /admin/slider-edit', 'Admin::adminSliderPage');
$f3->route('GET|POST /admin/slider-delete', 'Admin::adminDeleteSlideItem');
$f3->route('GET|POST /admin/slider-add', 'Admin::adminAddSlider');
$f3->route('GET|POST /admin/slider-upload', 'Admin::adminUploadSlider');
/*end slider*/

$f3->route('GET|POST /admin/menu', 'Admin::adminMenu');

/*Category*/
$f3->route('GET|POST /admin/category', 'Admin::adminCategory');
$f3->route('GET|POST /admin/addCategoryForm', 'Admin::addCategoryForm');
$f3->route('GET|POST /admin/saveCategoryForm', 'Admin::saveCategoryForm');
$f3->route('GET|POST /admin/editCategoryForm/@id', 'Admin::editCategoryForm');
$f3->route('GET|POST /admin/deleteCategory/@id', 'Admin::deleteCategory');
/*End Category*/


/*Products*/
$f3->route('GET|POST /admin/products', 'Admin::adminProducts');
$f3->route('GET|POST /admin/productsOfCategory', 'Admin::adminViewProducts');
$f3->route('GET|POST /admin/addProducts', 'Admin::adminAddProducts');
$f3->route('GET|POST /admin/saveProduct', 'Admin::adminSaveProduct');
/*End Products*/


/*Pages*/
$f3->route('GET|POST /admin/pages', 'Admin::adminPages');
$f3->route('GET|POST /admin/addPages', 'Admin::addPages');
$f3->route('GET|POST /admin/savePages', 'Admin::savePages');
$f3->route('GET|POST /admin/deletePages', 'Admin::deletePages');
$f3->route('GET|POST /admin/editPages', 'Admin::editPages');
$f3->route('GET|POST /admin/updatePages', 'Admin::updatePages');
/*EndPages*/

/*End Admin Routings*/



$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');



if (!function_exists('print_arr')) {
  function print_arr($var, $return = false)
  {
    $type = gettype($var);

    $out = print_r($var, true);
    $out = htmlspecialchars($out);
    $out = str_replace(' ', '&nbsp; ', $out);
    if ($type == 'boolean')
      $content = $var ? 'true' : 'false';
    else
      $content = nl2br($out);

    $out = '<div style="
       border:2px inset #666;
       background:black;
       font-family:Verdana;
       font-size:11px;
       color:#6F6;
       text-align:left;
       margin:20px;
       padding:16px">
         <span style="color: #F66">(' . $type . ')</span> ' . $content . '</div><br /><br />';

    if (!$return)
      echo $out;
    else
      return $out;
  }
}

if (!function_exists('print_die')) {
  function print_die($var, $return = false, $ip = null)
  {
    if (($ip && $_SERVER['REMOTE_ADDR'] == $ip) || !$ip) {
      print_arr($var, $return);
      die;
    }
  }
}

$f3->run();
