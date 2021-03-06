<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="ru" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="ru" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<html dir="ltr" lang="ru" class="">
<!--<![endif]-->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
  $hesder_label = '';
  if(isset($title)){
    $hesder_label = $title;
  }?>
  <title>СТО <?php echo $hesder_label?></title>

  <base href="<?php echo BASE_URL?>/" />

  <meta name="description" content="Auto Point" />



  <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link href="//fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link href="catalog/view/theme/jetimpex/stylesheet/material-design.css" rel="stylesheet">

  <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link href="catalog/view/theme/jetimpex/stylesheet/photoswipe.css" rel="stylesheet">
  <link href="catalog/view/theme/jetimpex/stylesheet/stylesheet.css" rel="stylesheet">
  <link href="catalog/view/theme/jetimpex/js/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="catalog/view/theme/jetimpex/stylesheet/homebuilder.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="catalog/view/javascript/jquery/swiper/css/swiper.min.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="catalog/view/javascript/jquery/swiper/css/opencart.css" type="text/css" rel="stylesheet" media="screen" />

  <link href="favicon.png" rel="icon" />

  <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="catalog/view/theme/jetimpex/js/jetimpex_colorswitcher/jquery.cookies.js" type="text/javascript"></script>
  <script src="catalog/view/theme/jetimpex/js/jetimpex_colorswitcher/style_switcher_demo.js" type="text/javascript"></script>
  <script src="catalog/view/javascript/jetimpex/swiper/swmin.js" type="text/javascript"></script>
  <script src="catalog/view/javascript/jquery/swiper/js/swiper.jquery.js" type="text/javascript"></script>
  <script src="catalog/view/javascript/jetimpex/parallax/rd-parallax-min.js" type="text/javascript"></script>
  <script src="catalog/view/theme/jetimpex/js/jetimpex_megamenu/superfish.min.js" type="text/javascript"></script>
  <script src="catalog/view/theme/jetimpex/js/jetimpex_megamenu/jquery.rd-navbar.min.js" type="text/javascript"></script>


  <link id="color_scheme" href="catalog/view/theme/jetimpex/stylesheet/color_schemes/color_scheme_1.css" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113506450-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-113506450-1');
  </script>

</head>
<body>
<p id="gl_path" class="hidden">jetimpex</p>
<div id="page">
  <div class="ie-warning">
    <a href="//windows.microsoft.com/en-us/internet-explorer/download-ie">
      <img src="catalog/view/theme/jetimpex/image/warning_bar_0000_us.jpg" height="75" width="1170" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
    </a>
  </div>
  <nav id="top">
    <div class="container">
      <div id="logo">
        <a href="<?php echo BASE_URL?>">
          <img src="/image/catalog/logo.png" title="Auto Point" alt="Auto Point" class="img-responsive" />
        </a>
      </div>
      <div class="box-cart pull-right">
        <div id="cart" class="cart toggle-wrap">
          <button type="button" data-loading-text="Загрузка..." class="toggle">
            <i class="fa fa-shopping-cart"></i>
            <strong>Корзина </strong>
            <span id="cart-total" class="cart-total">Товаров 0 ($0.00)</span>
            <span id="cart-total2" class="cart-total2">0</span>
          </button>
          <ul class="pull-right toggle_cont">
            <li>
              <p class="text-center">Ваша корзина пуста!</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <header>
    <div class="stuck-menu"> 				<div class="container">
      </div>
    </div>
    <div class="container">
      <div class="navigation">
        <div class="megamenu">
          <ul class="sf-menu">

              <?php foreach ($all_menus as $menu_item){
                $url = BASE_URL . '/page/' . $menu_item['id'];
                if($menu_item['id'] == 1){
                  $url  = '/';
                }?>
                <li>
                  <a href="<?php echo $url;?>" data-letters="Главная"><span><?php echo $menu_item['name_menu']; ?></span></a>
                </li>
              <?php  } ?>

          </ul>
        </div>
        <script>
          ;(function ($) {
            $('#cart > ul').load('/cart/info');
            $('#cart-total2').load('/cart/info-count');
            $(document).ready(function(){
              var o = $('.sf-menu');
              o.superfish();
              o.find('li a').each(function () {
                if ($(location).attr('href').indexOf($(this).attr('href')) >= 0){
                  $(this).addClass('active');
                  return;
                }
              });
              if (o.parents('aside').length){
                var width = $('.container').outerWidth() - $('aside').outerWidth();
                o.find('.sf-mega').each(function () {
                  $(this).width(width);
                })
              }
            });
          })(jQuery);
          function details_go(url){
            location.href = url;
          }
        </script>

        <div id="search" class="search">
          <input type="text" name="search" value="" placeholder=""/>
          <button type="button" class="button-search"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </header>