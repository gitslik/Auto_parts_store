<?php

$db = new DB\SQL(
  'mysql:host=localhost;port=3306;dbname=tehavtokg',
  'tehavtokg',
  'yYw1b*10'
);

define('SITE_EMAIL', 'technicavtoservice@gmail.com');
define('SITE_NAME', 'tehavto');
define('BASE_URL', 'http://tehavto.kg');
define('BASE_PATH', __DIR__);
define('SITE_URL', ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

$f3->set('DEBUG', 3);