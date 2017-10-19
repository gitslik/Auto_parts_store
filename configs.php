<?php

$db = new DB\SQL(
  'mysql:host=localhost;port=3306;dbname=shop',
  'shop',
  'root'
);

define('SITE_EMAIL', 'support@shop.us');
define('SITE_NAME', 'shop');
define('BASE_URL', 'http://127.0.0.1/shop');
define('SITE_URL', ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

$f3->set('DEBUG', 3);