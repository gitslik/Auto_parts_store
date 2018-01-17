<?php

#error_reporting(0);
session_start();

if(!isset($_SESSION['user']) || $_SESSION['user']<=0  ){

    $_SESSION['user'] = rand(11111111,99999999);

}
$f3 = require('lib/base.php');

/*controllers*/
include_once "controllers/index.php";
include_once "controllers/admin.php";
/*end controllers*/

/*models*/
include_once "model/Menu.php";
include_once "model/Slider.php";
include_once "model/Category.php";
include_once "model/Files.php";
include_once "model/Products.php";
include_once "model/Pages.php";
include_once "model/Users.php";
include_once "model/Basket.php";
include_once "model/BasketItem.php";
include_once "model/Youtube.php";
include_once "model/Checkout.php";
include_once "model/Subscription.php";
include_once "Api/sender.php";
/*end models*/

include_once "configs.php";