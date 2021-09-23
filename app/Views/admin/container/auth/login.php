<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.03.01.
 * Time: 21:23
 */
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "Belépés | Admin | " . config_item('site_title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="<?php echo site_url('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo site_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo site_url('bower_components/Ionicons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo site_url('bower_components/admin-lte/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo site_url('bower_components/admin-lte/plugins/iCheck/square/blue.css'); ?>">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- jQuery 3 -->
    <script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?php echo config_item('site_title'); ?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <h4 class="login-box-msg">Admin Belépés</h4>

        <?php if(isset($_SESSION['system_error_msg'])): ?>
            <div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="Bezárás" title="Bezárás">×</a>
                <?php
                if(is_array($_SESSION['system_error_msg'])){
                    foreach ($_SESSION['system_error_msg'] as $error_msg){
                        echo $error_msg . "<br/>";
                    }
                }
                else echo $_SESSION['system_error_msg']; ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['system_success_msg'])): ?>
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="Bezárás" title="Bezárás">×</a>
                <?php
                if(is_array($_SESSION['system_success_msg'])){
                    foreach ($_SESSION['system_success_msg'] as $success_msg){
                        echo $success_msg . "<br/>";
                    }
                }
                else echo $_SESSION['system_success_msg']; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('admin/belepes') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <label for="login_email" class="control-label">Email</label>
                <input type="email" id="login_email" name="login_email" class="form-control">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="login_password" class="control-label">Jelszó</label>
                <input type="password" id="login_password" name="login_password" class="form-control" minlength="6">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" id="login_remember" name="login_remember"> Bejelentkezve marad
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Belépés</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo site_url('bower_components/admin-lte/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
