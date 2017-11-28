<?php
//СКРИПТ ПРОВЕРКИ АВТОРИЗАЦИИ
if(isset($_GET['logSESS'])) {$logSESS = $_GET['logSESS'];unset($logSESS);}
if(isset($_POST['logSESS'])) {$logSESS = $_POST['logSESS'];unset($logSESS);}

session_start();
$logSESS = $_SESSION['$logSESS'];
if(!isset($logSESS))
{
  header("location: /admin/login");
  exit;
}
//СКРИПТ ПРОВЕРКИ АВТОРИЗАЦИИ
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Bootstrap Admin Theme</title>

  <!-- Bootstrap Core CSS -->
  <link href="../../css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../../css/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../../css/dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../../css/vendor/morrisjs/morris.css" rel="stylesheet">

  <link href="../../css/admin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../../css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../css/vendor/jquery/jquery.min.js"></script>

  <script src="../../js/admin/admin.js"></script>

  <script type="text/javascript" src="../../js/tinymce/tinymce.min.js"></script>

  <script>
    var shop = new Shop();
  </script>
</head>

<body>

<div id="wrapper">

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Раздел Администрации Сайта</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-envelope fa-fw"></i>
        </a>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li>
            <a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
        <!-- /.dropdown-user -->
      </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li class="sidebar-search">
            <div class="input-group custom-search-form">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
            </div>
            <!-- /input-group -->
          </li>

          <li>
            <a href="#" class="menu_shop" onclick="self.shop.indexPageTest('menu')"><i class="fa fa-dashboard fa-fw"></i>Меню</a>
          </li>
          <li>
            <a href="#" class="menu_shop" onclick="self.shop.indexPageTest('pages')"><i class="fa fa-dashboard fa-fw"></i>Страницы</a>
          </li>
          <li>
            <a href="#" class="menu_shop" onclick="self.shop.indexPageTest('products')"><i class="fa fa-dashboard fa-fw"></i>Продукция</a>
          </li>
          <li>
            <a href="#" class="menu_shop" onclick="self.shop.indexPageTest('category')"><i class="fa fa-dashboard fa-fw"></i>Категории</a>
          </li>
          <li>
            <a href="#" class="menu_shop" onclick="self.shop.indexPageTest('slider')"><i class="fa fa-dashboard fa-fw"></i>Слайдер</a>
          </li>

<!--          <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="flot.html">Flot Charts</a>
              </li>
              <li>
                <a href="morris.html">Morris.js Charts</a>
              </li>
            </ul>
          </li>-->


        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>
