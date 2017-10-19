<?php

#error_reporting(0);
session_start();

$f3 = require('lib/base.php');

/*index page*/
include_once "controllers/index.php";
include_once "model/Menu.php";
/*end index page*/

include_once "configs.php";