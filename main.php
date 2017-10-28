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
/*end models*/

include_once "configs.php";