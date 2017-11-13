<?php

#error_reporting(0);
session_start();

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
include_once "model/Page.php";

/*end models*/

include_once "configs.php";