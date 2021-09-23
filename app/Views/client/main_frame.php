<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:11
 */
/*
     * Később kidolgozásra kerülő elemek elrejtése */
$hide_prepared = true;
?>
<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <?php if(isset($meta_config)): ?>
        <meta name="robots" content="<?php echo $meta_config->robots; ?>"/>
        <meta name="keywords" content="<?php echo $meta_config->keywords; ?>"/>
        <meta name="description" content="<?php echo $meta_config->description; ?>"/>
    <?php else: ?>
        <meta name="robots" content="noindex, nofollow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
    <?php endif; ?>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url('assets/favicons/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('assets/favicons/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets/favicons/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo site_url('assets/favicons/manifest.json'); ?>">
    <link rel="mask-icon" href="<?php echo site_url('assets/favicons/safari-pinned-tab.svg'); ?>" color="#5bbad5">
    <meta name="theme-color" content="#d9d34a">
	<!-- google html title -->
	<meta name="google-site-verification" content="7ntCVQZM20rXqWxLFaScAu0IK5MhuYQT7ydOqZu2occ" />

    <title><?php echo $page_title . " | " . $site_title; ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="<?php echo base_url('assets/common/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />

    <?php if(empty($css_files) === false): ?>
        <?php foreach ($css_files as $css_file): ?>
            <link href="<?php echo (substr_count($css_file,"http") > 0) ? $css_file : site_url($css_file); ?>" rel="stylesheet" type="text/css">
        <?php endforeach; ?>
    <?php endif; ?>

    <link href="<?php echo base_url('assets/client/css/forum_global.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url('assets/client/css/social_icons.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url('assets/common/css/scrollToTop.css'); ?>" rel="stylesheet" type="text/css" />

    <style>
        body > div:nth-child(3),
        body > section:nth-child(1){
            margin-top: 50px;
        }
        /*
        https://stackoverflow.com/questions/23141854/adding-asterisk-to-required-fields-in-bootstrap-3
        */
        .form-group.required .control-label:after {
            content:"*";
            color:red;
        }

        .grecaptcha-badge {
            margin-bottom: 50px;
        }

        .user_navbar>li>a:hover, .user_navbar>li>a:focus {
            background-color: #d1d1d1 !important;
        }

        .unreaded_notifications{
            background-color: yellow !important;
            color: #000000 !important;
        }
        .unreaded_notifications:hover, .unreaded_notifications:focus{
            background-color: yellow !important;
            color: #000000 !important;
        }
		.unreaded_notifications_icon {
			color: yellow !important;
		}
		.unreaded_notifications_icon:hover {
			color: #000000 !important;
		}
    </style>


    <!-- jQuery 3 -->
    <script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- menu -->
    <nav class="nav navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#userMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-xs" href="<?php echo base_url(); ?>"><?php echo $site_title; ?></a>
        </div>
        <div class="collapse navbar-collapse" id="userMenu">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>">Főoldal</a></li>
                <li><a href="<?php echo base_url('forum'); ?>">Fórum</a></li>
                <li><a href="<?php echo base_url('hirek'); ?>">Hírek</a></li>
                <?php if(!$hide_prepared): ?><li><a href="<?php echo base_url('cikkek'); ?>">Cikkek</a></li><?php endif; ?>
                <?php if($aauth->is_loggedin()): ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Felhasználók
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu user_navbar">
                            <li><a href="<?php echo base_url('felhasznalok'); ?>"><i class="fa fa-sm fa-users" aria-hidden="true"></i> Összes felhasználó</a></li>
                            <?php if(!$hide_prepared): ?><li><a href="<?php echo base_url('felhasznalok/tiltolista'); ?>"><i class="fa fa-sm fa-ban" aria-hidden="true"></i> Saját tiltólista</a></li><?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <li><a href="<?php echo base_url('kapcsolat'); ?>">Kapcsolat</a></li>
            </ul>
			
			<!-- user menu -->
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0;">
                <?php if($aauth->is_loggedin()): ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle <?php echo $new_notifications > 0 ? 'unreaded_notifications_icon':''; ?>" data-toggle="dropdown" href="#">
							<i class="fa fa-sm fa-user-circle-o" aria-hidden="true"></i><?php echo $user_id = $this->session->userdata('username'); ?>
                            <span class="caret"></span>
						</a>
                        <ul class="dropdown-menu user_navbar">
                            <li><a href="<?php echo base_url('felhasznalok/profil/'.$_SESSION['id'].'/'.$_SESSION['username']); ?>"><i class="fa fa-sm fa-user-circle-o" aria-hidden="true"></i> Profil</a></li>
							<li class="divider"></li>
                            <li><a href="<?php echo base_url('uzenetek'); ?>"><i class="fa fa-sm fa-envelope" aria-hidden="true"></i> Üzenetek</a></li>
                            <li>
                                <a href="<?php echo base_url('ertesitesek'); ?>">
                                    <i class="fa fa-sm fa-exclamation-triangle" aria-hidden="true"></i>
                                     Értesítések
                                    <?php if($new_notifications > 0): ?>
                                        <span class="label label-warning"><?php echo $new_notifications; ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li><a href="<?php echo base_url('kilepes'); ?>"><i class="fa fa-sm fa-sign-out" aria-hidden="true"></i> Kilépés</a></li>
							
							<?php if($this->aauth->is_admin($this->session->userdata('id'))): ?>
							<li class="divider"></li>
                            <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-sm fa-unlock" aria-hidden="true"></i> Admin terület</a></li>
							<?php endif; ?>
                        </ul>
                    </li>

                <?php else: ?>
                    <li><a href="<?php echo base_url('regisztracio'); ?>" rel="nofollow"><span class="glyphicon glyphicon-user"></span> Regisztráció</a></li>
                    <li><a href="<?php echo base_url('belepes'); ?>" rel="nofollow"><span class="glyphicon glyphicon-log-in"></span> Belépés</a></li>
                <?php endif; ?>
            </ul>
			<!-- .user menu -->
			
			<!-- notification menu -->
            <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm" style="margin-right: 0;">
                <?php if($aauth->is_loggedin()): ?>
                <li id="notification-dropdown" class="nav-item dropdown">
                  <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-sm far fa-bell" aria-hidden="true"></i>
					<?php if($new_notifications > 0): ?>
						<span id="notification-bell" class="label label-warning"><?php echo $new_notifications; ?></span>
					<?php endif; ?>
                  </a>
                    <ul class="dropdown-menu">
                      </li>
					    <div id="notification-box-content">
						  <!--<li class="notification-box">
							<div class="row">
							  <div class="col-lg-3 col-sm-3 col-3 text-center">
								<img src="http://85.67.108.119/forum/uploads/users/profiles/1/profile.jpg" class="img-responsive img-circle">
							  </div>    
							  <div class="col-lg-8 col-sm-8 col-8">
								<a href="#"><strong class="text-info">Kovács Csaba</strong></a>
								<div>
								  <a href="#">Válaszolt a hozzászólásra: teszt fórum</a>
								</div>
								<small class="text-warning">2019-04-05 00:59</small>
							  </div>    
							</div>
						  </li>
						  <li class="notification-box bg-gray">
							<div class="row">
							  <div class="col-lg-3 col-sm-3 col-3 text-center">
								<img src="http://85.67.108.119/forum/uploads/users/profiles/1/profile.jpg" class="img-responsive img-circle">
							  </div>    
							  <div class="col-lg-8 col-sm-8 col-8">
								<a href="#"><strong class="text-info">Kovács Csaba</strong></a>
								<div>
								  <a href="#">Válaszolt a hozzászólásra: teszt fórum</a>
								</div>
								<small class="text-warning">2019-04-05 00:59</small>
							  </div>    
							</div>
						  </li>-->
						</div>
						  <li class="footer bg-dark text-center">
							<a href="<?php echo base_url('ertesitesek'); ?>" class="text-light">Összes éretsítés</a>
						  </li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
			<!-- .notification menu -->
        </div>

    </nav>
    <div class="container-fluid client-breadcrumb affix-breadcrumb">
        <div class="row">
            <?php
            if(isset($breadcrumb)){
                echo $breadcrumb;
            }
            ?>
        </div>
    </div>
    <!-- end menu -->

    <!-- content -->
    <?php
    if(isset($view)){
        echo $view;
    }
    ?>
    <!-- end content -->

    <!--<a href="#" class="scrollToTop">
        <i class="fa fa-4x fa-arrow-circle-o-up" aria-hidden="true"></i>
        <br/>
        <span>Fel</span>
    </a>-->

    <!-- footer -->
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-inverse navbar navbar-fixed-bottom">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#userFooterMenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="userFooterMenu">
                    <ul class="nav navbar-nav text-center">
                        <li><a href="<?php echo base_url('dokumentumok/szabalyzat'); ?>">Szabályzat</a></li>
                        <li><a href="<?php echo base_url('dokumentumok/adatvedelem'); ?>">Adatvédelem</a></li>
                        <li><a href="<?php echo base_url('kapcsolat'); ?>">Kapcsolat</a></li>
                        <li><a href="<?php echo base_url('regisztracio'); ?>">Regisztráció</a></li>
                        <li><a href="<?php echo base_url('elfelejtett-jelszo'); ?>">Elfelejtett jelszó</a></li>
                        <li class="xs-links-container hidden-sm hidden-md hidden-lg">
                            <div class="xs-links">
                                <a href="#" class="social-xs-links"><i class="social-icon-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="social-xs-links"><i class="social-icon-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="social-xs-links"><i class="social-icon-youtube" aria-hidden="true"></i></a>
                            </div>

                        </li>
                    </ul>
                    <?php if(!$hide_prepared): ?>
                    <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-right: 0;">
                        <li><a href="#"><i class="social-icon-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="social-icon-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="social-icon-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </div>
    <!-- end footer -->
	
	<template id="notification-box-message">
		<li class="notification-box {{bg-gray}}">
			<div class="row">
				<div class="col-lg-3 col-sm-3 col-3 text-center">
					<img src="{{sender-image}}" class="img-responsive img-circle">
				</div>    
				<div class="col-lg-8 col-sm-8 col-8">
					<a href="#"><strong class="text-info">{{notify-sender-name}}</strong></a>
					<div>
						<a href="{{notify-message-link}}">{{notify-message}}<a>
					</div>
					<small class="text-warning">{{notify-time}}</small>
				</div>
			</div>
		</li>
	</template>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo site_url('assets/common/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('assets/common/js/scrollToTop.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('assets/common/js/notifybar.js'); ?>" type="text/javascript"></script>

    <?php if(empty($js_files) === false): ?>
        <?php foreach ($js_files as $js_file): ?>
            <script src="<?php echo (substr_count($js_file,"http") > 0) ? $js_file : site_url($js_file); ?>" type="text/javascript"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
        jQuery.noConflict();
        jQuery(document).ready(function ($) {
            $(".harakiri-alert").fadeTo(10000, 500).slideUp(500, function(){
                $(".harakiri-alert").slideUp(500);
            });
        });
    </script>
</body>
</html>