<?php
ini_set('display_errors', '0');
ini_set('error_reporting', E_ALL);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image" href="<?= base_url(); ?>images/favicon.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/dist/css/skins/skin-green.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- sweet alert 1 -->
  <!-- <link href="<?= base_url(); ?>assets_bs3/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet"> -->
  <link href="<?= base_url(); ?>assets_bs3/plugins/sweetalert1/dist/sweetalert.css" rel="stylesheet">
  <script src="<?= base_url(); ?>assets_bs3/plugins/sweetalert1/dist/sweetalert.min.js"></script>
  <!-- sweet alert 2 -->
  <!-- <script src="<?= base_url(); ?>assets_bs3/plugins/sweetalert/sweetalert2.min.js"></script> -->
  <!-- <link href="<?= base_url(); ?>assets_bs3/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet"> -->
  <!-- sweet alert - limon -->
  <!-- <script src="<?= base_url(); ?>assets_bs3/swal/sweetalert2.all.min.js"></script> -->
  <!-- <link href="<?= base_url(); ?>assets_bs3/swal/sweetalert2.css" rel="stylesheet"> -->
  <!-- datatables -->
  <!-- https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/DataTables3/DataTables-1.10.21/css/dataTables.bootstrap.css">
  <!-- jquery -->
  <script src="<?= base_url(); ?>assets_bs3/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- tombol -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/DataTables3/DataTables-1.10.21/css/jquery.dataTables.min.css"> -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/DataTables3/Buttons-1.6.2/css/buttons.dataTables.min.css"> -->
  <!-- https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css -->
  <!-- https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css -->
  <!-- tombol -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <!-- <link href="<?= base_url(); ?>assets_bs3/SourceSansPro/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet"> -->
 <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/SourceSansPro/SourceSansPro.css">  
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/SourceSansPro/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<!-- <body class="hold-transition skin-blue sidebar-mini"> -->

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
          <img src="<?= base_url(); ?>images/logo_bpkp.png" width="100%" height="20%">
        </span>
        <!-- <img src="<?= base_url(); ?>images/logo.png" width="20%" height="20%"> -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
          <img src="<?= base_url(); ?>images/logo_bpkp.png" width="35%" height="20%">
          <b>SPPD</b>WEB
        </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- Notifications: style can be found in dropdown.less -->
            <!-- Tasks: style can be found in dropdown.less -->
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('images/user/') . $image; ?>" class="user-image" alt="User Image">
                <!-- <img src="<?= base_url(); ?>assets_bs3/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                <span class="hidden-xs"><?= $username; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header bg-purple">
                  <img src="<?= base_url('images/user/') . $image; ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $username; ?> - <?php echo $wa; ?>
                    <small><?php echo $univ; ?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#"><?= $level; ?></a>
                    </div>
                    <br />
                    <center><small><?= $email; ?></small></center>
                    <!--  <div class="col-xs-4 text-center">
                        <a href="#"><?= $email; ?></a>
                      </div> -->
                    <br />
                    <center><small>Member Since:</small></center>
                    <center><small><?php echo tgl_indo($date_created); ?></small></center>
                    <!-- <center><small><?php echo date(DATE_RFC850, $date_created); ?></small></center> -->
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <!-- <a href="users" class="btn btn-default btn-flat">Profile</a> -->
                    <a href="<?= site_url('Users/read/') . $username; ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar ">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url('images/user/') . $image; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $username; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <br />
          <?php
          // Data main menu
          $main_menu = $this->db->get_where('menu', array('main_menu' => 0));
          foreach ($main_menu->result() as $main) {
            // Query untuk mencari data sub menu
            $sub_menu = $this->db->get_where('menu', array('main_menu' => $main->id_menu));
            // Memeriksa apakah ada sub menu, jika ada sub menu tampilkan dimana nilai row dari id_menu dari menu utama yag nilainya 0
            if ($sub_menu->num_rows() > 0) {
              if ($main->id_menu > 0) {
                // Main menu yang memiliki sub menu
                echo "<li class='treeview'>" . anchor($main->link, '<i class="' . $main->icon . '"></i>' . '<span>' . $main->nama_menu . '</span>' .
                  '<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>');
                // Menampilkan data sub menu
                echo "<ul class='treeview-menu'>";
                foreach ($sub_menu->result() as $sub) {
                  echo "<li>" . anchor($sub->link, '<i class="' . $sub->icon . '"></i>' . $sub->nama_menu) . "</li>";
                }
                echo "</ul>
          </li>";
              }
            }
            // Jika tidak memiliki sub menu maka tampilkan data main menu
            else {
              if ($main->id_menu > 0) {
                // Data main menu tanpa sub menu
                echo "<li>" . anchor($main->link, '<i class="' . $main->icon . '"></i>' .  '<span>' .  $main->nama_menu) .  '</span>' . "</li>";
              }
            }
          }
          ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- header sd baris 184 -->