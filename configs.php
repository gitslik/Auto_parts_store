<?php

$db = new DB\SQL(
  'mysql:host=localhost;port=3306;dbname=id3330757_shop',
  'id3330757_slik_9',
  'gremlin12'
);

define('SITE_EMAIL', 'slik_9@mail.ru');
define('SITE_NAME', 'shop');
define('BASE_URL', 'https://slik-9.000webhostapp.com');
define('SITE_URL', ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') ? 'https://' : 'http://') . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

$f3->set('DEBUG', 3);
/*$f3->set('ONERROR',
  function($f3) {
    // recursively clear existing output buffers:
    while (ob_get_level())
      ob_end_clean();
    // your fresh page here:
    echo $f3->get('ERROR.text');
  }
);*/
