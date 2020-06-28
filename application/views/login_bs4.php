<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi SPPD | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- fave icon -->
    <link rel="icon" type="image" href="<?= base_url(); ?>assets_bs4/images/favicon.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets_bs4/plugins/fontawesome-free/css/all.min.css"); ?>">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <link rel="stylesheet" href="<?= base_url("assets_bs4/plugins/ionicons-2.0.1/css/ionicons.min.css"); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets_bs4/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets_bs4/dist/css/adminlte.min.css"); ?> ">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <link href="<?= base_url("assets_bs4/plugins/SourceSansPro/SourceSansPro.css"); ?> " rel="stylesheet">

</head>

<body class="hold-transition login-page mt-3">
     <center><img width="100px" src="<?= base_url('assets_bs4/images/logo_bpkp.png'); ?>" class="img-fluid"></center> 
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Aplikasi SPPD</b>&nbsp&nbspWEB</a>
           </div>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url("login/proses"); ?>" method="post" class="user">

                    <!-- <div class="row"> -->
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
                    <!-- </div> -->

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url("assets_bs4/plugins/jquery/jquery.min.js"); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets_bs4/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets_bs4/dist/js/adminlte.min.js"); ?>"></script>

</body>

</html>