<?php

$db = new DB\SQL(
  'mysql:host=mysql.hostinger.ru;port=3306;dbname=u258501922_taru',
  'u258501922_taru',
  'gremlin12'
);

define('SITE_EMAIL', 'slik_9@mail.ru');
define('SITE_NAME', 'shop');
define('BASE_URL', 'http://slik-9.xyz');
define('BASE_PATH', __DIR__);
define('SITE_URL', ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

$f3->set('DEBUG', 3);