<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?= $title; ?> | Payment 24</title>
     <link rel="icon" href="<?= base_url() . 'assets/icon/logo-favicon.png' ?>" type="image/x-icon">
     <!-- Google Font: Source Sans Pro -->

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>plugins/fontawesome-free/css/all.min.css">
     <!-- overlayScrollbars -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

     <!-- DataTables -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
     <!-- daterange picker -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>plugins/daterangepicker/daterangepicker.css">
     <!-- Select2 -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>/plugins/select2/css/select2.min.css">
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>dist/css/adminlte.min.css">

     <!-- datepicker work -->
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>datepicker/datepicker.min.css">
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>datepicker/datepicker.min.css">
     <script src="<?= base_url('') . 'assets/' ?>datepicker/jquery.min.js"></script>
     <script src="<?= base_url('') . 'assets/' ?>datepicker/boostrap-datepicker.min.js"></script>
     <link rel="stylesheet" href="<?= base_url('') . 'assets/' ?>dist/css/mycss.css">

     <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->



     <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>

<body class="hold-transition text-sm">
     <div class="wrapper">

          <!-- Preloader -->
          <div class="preloader flex-column justify-content-center align-items-center">
               <img class="animation__wobble" src="<?= base_url('') . 'assets/' ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>

          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-dark p-0">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <!-- <li class="nav-item d-none d-sm-inline-block">
                         <a href="<?= base_url('') . 'home' ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                         <a href="#" class="nav-link">Contact</a>
                    </li> -->
               </ul>
               <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                              <i class="fas fa-expand-arrows-alt"></i>
                         </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                              <i class="fas fa-th-large"></i>
                         </a>
                    </li>
               </ul>
               <div class="user-panel pt-3 mb-3 d-flex">
                    <div class="image">
                         <img src="<?= base_url('') . 'assets/' ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                         <a href="#" class="d-block"><?= $this->session->userdata('pengguna_nama');; ?></a>
                    </div>
               </div>
          </nav>
          <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
               <div class="sidebar">
                    <!-- <hr> -->
                    <a href="#" class="brand-link pt-4 pb-1">
                         <img src="<?= base_url('') . 'assets/' ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                         <p class="brand-text font-weight-light">Payment 24</p>
                    </a>


                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                         <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                              <li class="nav-header">Menu</li>
                              <li class="nav-item">
                                   <a href="<?= base_url('') . 'admin/' ?>" class="nav-link">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>Dashboard</p>
                                   </a>
                              </li>
                              <li class="nav-header">Kurir</li>
                              <li class="nav-item">
                                   <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-check"></i>
                                        <p>
                                             Belum Setor
                                             <i class="right fas fa-angle-left"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'home/belum-setor' ?>" class="nav-link">
                                                  <!-- <i class="far fa-circle nav-icon"></i> -->
                                                  <p>Cek</p>
                                             </a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-item">
                                   <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-clipboard-check"></i>
                                        <p>
                                             Sudah Setor
                                             <i class="right fas fa-angle-left"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'home/sudah-setor' ?>" class="nav-link">
                                                  <!-- <i class="far fa-circle nav-icon"></i> -->
                                                  <p>Cek</p>
                                             </a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-header">Admin</li>
                              <li class="nav-item">
                                   <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-wallet"></i>
                                        <p>
                                             Saldo
                                             <i class="right fas fa-angle-left"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'setoran-kurir' ?>" class="nav-link">
                                                  <p>Setoran from Kurir</p>
                                             </a>
                                        </li>
                                   </ul>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'setoran-finance' ?>" class="nav-link">
                                                  <p>Setoran to Finance</p>
                                             </a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-item">
                                   <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-history"></i>
                                        <p>
                                             Histori
                                             <i class="right fas fa-angle-left"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'tagihan-th' ?>" class="nav-link">
                                                  <p>Tagihan</p>
                                             </a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-header">Akun</li>
                              <li class="nav-item">
                                   <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                             Akun
                                             <i class="right fas fa-angle-left"></i>
                                        </p>
                                   </a>
                                   <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'pengguna' ?>" class="nav-link">
                                                  <p>Akun</p>
                                             </a>
                                        </li>
                                        <li class="nav-item">
                                             <a href="<?= base_url('') . 'ubah-password' ?>" class="nav-link">
                                                  <p>Ubah Password</p>
                                             </a>
                                        </li>
                                   </ul>
                                   <!-- <a href="<?= base_url('') . 'pengguna' ?>" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>User</p>
                                   </a>
                                   <a href="<?= base_url('') . 'ubah-password' ?>" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Ubah Password</p>
                                   </a> -->
                              </li>
                              <li class="nav-item">
                                   <a href="<?= base_url('') . 'keluar' ?>" class="nav-link">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
                                        <p>Keluar</p>
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
                                   <h1 class="m-0">Dashboard <small class="text-sm"><?= $title; ?></small></h1>

                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                   <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                   </ol>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- Main content -->
               <section class="content">
                    <div class="container-fluid">