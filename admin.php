<?php 
session_start();
ini_set("display_errors","OFF"); 

if($_SESSION['user_login']==""){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
       <!-- Right navbar links -->
       <ul class="navbar-nav ml-auto">
        
      <!-- Navbar Search -->
      

      <li>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <a href="#">
          <img src="images/pro-img.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
          <p class="d-block"><?php echo $_SESSION['user_login'];  ?></p>
            <?php  
            // if($_SESSION['log_admin']!=""){
            //   $_SESSION['log_admin'];
            // }
            ?>
          </a>
        </div>
      </div>

      </li>
      <li>
        <a href="logout.php" role="button">
          Logout
        </a>
      </li>
    </ul>
 

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Destination</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          
          <li class="nav-item">
            <a href="admin.php?view=addproduct.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=listproduct.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Product List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=addbrand.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Brand</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=listbrand.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Brand List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=addcategory.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=listcategory.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Category List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=addsubcategory.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Sub-Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=listsubcategory.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sub-Category List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=user.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add user</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=listuser.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>user List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=addcountry.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Country</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=listcountry.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Country</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=addstate.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add State</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin.php?view=liststate.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List State</p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <!-- /.col --><!--
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>--><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    //include_once("listuser.php");
    ini_set("display_errors","OFF");
                if($_REQUEST['view']){
                include($_REQUEST['view']);}
                else{
                    include_once("main.php");
                } 
                ?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="admin.php">Destination</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
