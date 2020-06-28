<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi SPPD Web | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets_bs3/images/favicon.ico" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_bs3/SourceSansPro/SourceSansPro.css">
<!-- <link href="<?= base_url(); ?>assets_bs3/SourceSansPro/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet"> -->
</head>
<!-- <body class="hold-transition login-page "> -->
<body class="hold-transition login-page" style="background-image: url('images/bg-01.jpg');  background-blend-mode: overlay;">
    <div class="login-box box-success">
         <div class="login-logo">
            <center><img width="100px" src="<?= base_url('images/logo_bpkp.png'); ?>"></center>
                <a href="#"><b>APLIKASI SPPD</b>&nbspWEB</a>
        </div>
        <div class="login-box-body">
        <!-- /.login-logo -->
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="<?php echo base_url('login/proses'); ?>" method="post">
                <?php
                // Validasi error, jika username atau password tidak cocok
                if (validation_errors() || $this->session->flashdata('result_login')) {
                ?>
                    <!-- <div class="alert alert-danger animated fadeInDown" role="alert"> -->
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Peringatan!</strong>
                        <?php
                        // Menampilkan error
                        echo validation_errors();
                        // Session data users 
                        echo $this->session->flashdata('result_login');
                        ?>
                    </div>
                <?php
                }
                ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" Name="username" id="username" value="<?php if (get_cookie('uemail')) { echo get_cookie('uemail'); } ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback" ></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php if (get_cookie('upassword')) { echo get_cookie('upassword'); } ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                     <div class="col-xs-8">
          <div class="checkbox icheck" >
            <label>
              <input type="checkbox" name="chkremember" <?php if (get_cookie('uemail')) { ?> checked="checked" <?php } ?> value="Remember me"> Remember Me
            </label>
          </div>
        </div>

                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" id="btn_login" class="btn btn-block btn-success">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->



    <!-- jQuery 3 -->
    <script src="<?= base_url(); ?>assets_bs3/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url(); ?>assets_bs3/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url(); ?>assets_bs3/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '50%' /* optional */
            });
        });
    </script>
</body>

</html>