<?php
  if(!isset($page_title)) {
    $page_title = 'Watermil';
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Watermill - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <title></title> -->

    <!-- Custom fonts for this template-->
    <!-- <link rel="stylesheet" type="text/css" href=" <?php echo url_for('gulpfile/fontawesome-free/css/all.min.css'); ?>"> -->
    <link rel="stylesheet" href="<?php echo url_for('css/fonts.css'); ?>">
    <!-- Page level plugin CSS-->
    <link rel="stylesheet" href="<?php echo url_for('gulpfile/bootstrap/css/bootstrap.css'); ?>">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?php echo url_for('css/admin.css'); ?>">

  </head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Garden Emporium</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">1+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo url_for('/index.php'); ?>">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <span>Dashboard</span>
        </a>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Account Settings</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
        </div>
      </li> -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Orders</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo url_for('/orders-unauthorised.php'); ?>">Unauthorised Orders</a>
          <a class="dropdown-item" href="<?php echo url_for('/orders-authorised.php'); ?>">Authorised Orders</a>
          <!-- <a class="dropdown-item" href="#">All Orders</a> -->
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('/employee.php'); ?>">
            <!-- <i class="fas fa-fw fa-employee"></i> -->
            <span>Employees</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo url_for('/stock.php'); ?>">
          <!-- <i class="fas fa-fw fa-products"></i> -->
          <span>Stock</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('/location.php'); ?>">
            <!-- <i class="fas fa-fw fa-category"></i> -->
            <span>Locations</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('/category.php'); ?>">
            <!-- <i class="fas fa-fw fa-category"></i> -->
            <span>Categories</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('/supplier.php'); ?>">
            <!-- <i class="fas fa-fw fa-category"></i> -->
            <span>Suppliers</span></a>
      </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo url_for('/pricelist.php'); ?>">
            <!-- <i class="fas fa-fw fa-category"></i> -->
            <span>Supplier Price List</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="<?php echo url_for('/sale.php'); ?>" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Sales</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo url_for('/sale.php'); ?>">All Sales</a>
          <a class="dropdown-item" href="<?php echo url_for('/sale-new.php'); ?>">New Sale</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

    </ul>