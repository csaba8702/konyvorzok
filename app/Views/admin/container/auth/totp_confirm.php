<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2017.12.27.
 * Time: 11:31
 */
?>
<!DOCTYPE html>
<html lang="<?php
if(isset($lang_abbr)){
    echo $lang_abbr;
}
else{
    echo "en";
}
?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo "Belépés-hitelesítés | Admin | " . config_item('site_title'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo site_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo site_url('bower_components/admin-lte/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />

    <style>
        #google_play > img{
            height: 65px !important;
        }
    </style>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo site_url('/') ?>"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        <?php
        $errors = get_instance()->session->flashdata('errors');
        if(isset($errors) && is_array($errors) && !empty($errors[0])): ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach ($errors as $error):?>
                    <?php echo $error . "<br/>"; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12 text-center">
                <h5>
                    Az alábbi QR-kódot olvassa be a Google Hitelesítő alkalmazással.<br/>
                    A kapott számsort írja be a kód alatti mezőbe!
                </h5>
            </div>
            <div class="col-xs-12">

                <a id="app_store" class="pull-right" href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank">
                    <img src="<?php echo base_url('assets/app_stores/apple_app_store.svg') ?>" class="img-responsive">
                </a>

                <a id="google_play" class="pull-left" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=hu">
                    <img alt='Szerezd meg: Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/hu_badge_web_generic.png'/>
                </a>
            </div>
        </div>

        <form action="<?php echo base_url('admin/belepes/totp'); ?>" method="post" enctype="multipart/form-data">
                <input
                    type="hidden"
                    name="identity"
                    value="<?php echo set_value('identity',$identity); ?>"
                    title=""
                />
            <div class="form-group has-feedback text-center">
                <span id="totp_qr">
                    <img src="<?php echo trim($qr_code); ?>" alt="two-factor-qr-code">
                </span>
            </div>
            <div class="form-group has-feedback text-center">
                <input
                    type="text"
                    class="form-control text-center"
                    name="totp_code"
                    placeholder="Kód"
                    title=""
                />
                <span class="glyphicon glyphicon-key form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block form-control" title="Tovább" value="Tovább">
            </div>
        </form>
    </div><!-- /.login-box-body -->

</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>

</body>
</html>
