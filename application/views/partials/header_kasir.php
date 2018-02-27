<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$session_data = $this->session->userdata('logged_in');
$data['username'] = $session_data['username'];
$data['ava'] = $session_data['ava'];


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Keyhut</title>
    <link rel="icon" href="<?php echo base_url('/assets/img/cashier.png'); ?> ">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('/assets/css/bootstrap.css') ?> " rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('/assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/zabuto_calendar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/js/gritter/css/jquery.gritter.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/lineicons/style.css'); ?>">    
    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('/assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/style-responsive.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('/assets/js/chart-master/Chart.js'); ?>"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Keyhut Cashier</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <p class="centered"><a href="<?php echo base_url('index.php/profile/') ?>"><img src="<?php echo base_url('/bower_components/uploads') ?>/<?= $session_data['ava']; ?>" class="img-circle" width="60"></a></p>
                  <span> <h5 class="centered"><?= $session_data['username'];?></h5></span>
                    
                  <li class="mt">
                      <a class="active" href="<?php echo site_url(); ?>/Kasir">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo base_url('index.php/kasir/pembelian'); ?>" >
                          <i class="fa fa-desktop"></i>
                          <span>Pembelian</span>
                      </a>
                      <!-- <ul class="sub">
                          <li><a  href="<?php echo base_url('index.php/home/product'); ?>">Product</a></li>
                          
                          <li><a class="active" href="<?php echo base_url('index.php/kat'); ?>">Kategori</a></li>
                      </ul> -->
                  </li>

                  
                  <li class="sub-menu">
                      <a href="<?php echo base_url('index.php/penjualan'); ?>" >
                          <i class="fa fa-book"></i>
                          <span>Laporan</span>
                      </a>
                      
                  </li>
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->