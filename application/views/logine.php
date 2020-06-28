<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login SPPD V5</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets_login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets_login/images/bg-01.jpg')">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w" action="<?php echo base_url('login/proses'); ?>" method="post">
                    <span class="login100-form-title p-b-9">
                        Login
                    </span>
                    <?php
                    // Validasi error, jika username atau password tidak cocok
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                    ?>
                        <div class="alert alert-danger animated fadeInDown" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Peringatan!</strong>
                            <?php
                            // Menampilkan error
                            echo validation_errors();
                            // Session data users 
                            echo $this->session->flashdata('result_login'); ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Username
                        </span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Username Harus Diisi">
                        <!-- <div class="wrap-input100 validate-input" data-validate="Username is required"> -->
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password
                        </span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password Harus diisi">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-23">
                        <button class="login100-form-btn" type="submit" id="btn_login">
                            Sign In
                        </button>
                    </div>

                </form>
            </div>
            <div id="dropDownSelect1"></div>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/vendor/animsition/js/animsition.min.js"></script>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/vendor/bootstrap/js/popper.js"></script>
            <script src="<?= base_url(); ?>assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/vendor/select2/select2.min.js"></script>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/vendor/daterangepicker/moment.min.js"></script>
            <script src="<?= base_url(); ?>assets_login/vendor/daterangepicker/daterangepicker.js"></script>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/vendor/countdowntime/countdowntime.js"></script>
            <!--===============================================================================================-->
            <script src="<?= base_url(); ?>assets_login/js/main.js"></script>
        </div>

</body>

</html>