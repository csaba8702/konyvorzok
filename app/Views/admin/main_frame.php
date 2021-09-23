<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 7:10
 */

    /*
     * Később kidolgozásra kerülő elemek elrejtése */
    $hide_prepared = true;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url('assets/favicons/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('assets/favicons/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets/favicons/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo site_url('assets/favicons/manifest.json'); ?>">
    <link rel="mask-icon" href="<?php echo site_url('assets/favicons/safari-pinned-tab.svg'); ?>" color="#5bbad5">
    <meta name="theme-color" content="#d9d34a">

    <title><?php echo $page_title . " | " . $site_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="<?php echo site_url('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo site_url('bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo site_url('bower_components/admin-lte/dist/css/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo site_url('bower_components/admin-lte/dist/css/skins/_all-skins.min.css'); ?>" rel="stylesheet" type="text/css" />

    <?php if(empty($css_files) === false): ?>
        <?php foreach ($css_files as $css_file): ?>
            <link href="<?php echo (substr_count($css_file,"http") > 0) ? $css_file : site_url($css_file); ?>" rel="stylesheet" type="text/css">
        <?php endforeach; ?>
    <?php endif; ?>

    <link href="<?php echo site_url('assets/admin/css/admin_global.css'); ?>" rel="stylesheet" type="text/css">

    <!-- jQuery 3 -->
    <script src="<?php echo site_url('bower_components/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>

    <style>
        /*
        * https://stackoverflow.com/questions/23141854/adding-asterisk-to-required-fields-in-bootstrap-3
        */
        .form-group.required .control-label:after {
            content:"*";
            color:red;
        }
    </style>

    <!-- Google Font -->
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/google_fonts.css'); ?>">
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-mini-expand-feature fixed sidebar-collapse">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('admin') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="open-site-menu">
                        <a href="<?php echo base_url(); ?>" target="_blank" title="Weboldal megnyitása">
                            Weboldal megnyitása <i class="fa fa-external-link-square" aria-hidden="true"></i>
                        </a>
                    </li>
                    <?php if(!$hide_prepared): ?>
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">4 olvasatlan üzenet!</li>
                            <li><a href="<?php echo site_url('admin/uzenetek/erkezett-uzenetek') ?>">Összes üzenet megtekintése</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>


                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <?php if(isset($new_notifications) && ($new_notifications > 0)): ?>
                            <span class="label label-warning"><?php echo $new_notifications; ?></span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if(isset($new_notifications) && ($new_notifications > 0)): ?>
                            <li class="header"><?php echo $new_notifications; ?> új értesítés</li>
                            <?php endif; ?>
                            <li><a href="<?php echo site_url('admin/uzenetek/ertesitesek') ?>">Összes értesítés</a></li>
                        </ul>
                    </li>

                    <?php if(!$hide_prepared): ?>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">9 új jelentés</li>
                            <li>
                                <a href="<?php echo site_url('admin/felhasznalok/jelentett-felhasznalok') ?>">Összes megtekintése</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo site_url($current_user->profile_image_path); ?>" class="user-image" alt="Profilkép" style="background-color: #ffffff; border-radius: 0;">
                            <span class="hidden-xs"><?php echo $current_user->username; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo site_url($current_user->profile_image_path); ?>" alt="Profilkép" style="background-color: #ffffff; border-radius: 0;">

                                <p>
                                    <?php
                                    echo $current_user->username;
                                    $createDate = new DateTime($current_user->date_created);
                                    ?>
                                    <small>Regisztrált ekkor: <?php echo($createDate->format('Y-m-d')); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(strtolower('admin/felhasznalok/profil/'.$_SESSION['id'].'/'.$_SESSION['username'])) ?>" class="btn btn-default" style="background-color: var(--profile-button-bg); color: var(--profile-button-color);">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('admin/kilepes'); ?>" class="btn btn-default" style="background-color: var(--profile-button-bg); color: var(--profile-button-color);">Kilépés</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image" style="background-color: #ffffff; padding: 2px;">
                    <img src="<?php echo site_url($current_user->profile_image_path); ?>" alt="Profilkép">
                </div>
                <div class="pull-left info">
                    <p style="padding: 5px 5px 15px 5px !important;">
                        <?php echo $current_user->username; ?>
                    </p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">&nbsp;</li>

                <!-- Beállítások menüblokk -->
                <li class="treeview" id="system-menu">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span data-toggle="tooltip" data-placement="bottom" title="Globális beállítások (oldalnév, időzóna, stb...)">Beállítások</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('admin/beallitasok/rendszer'); ?>" data-toggle="tooltip" data-placement="bottom" title="Rendszerszintű beállítások, naplózás, stb...">
                                <i class="fa fa-cog"></i> Rendszer
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/beallitasok/adatvedelem'); ?>" data-toggle="tooltip" data-placement="bottom" title="Adatvédelmi nyilatkozat szerkesztése ">
                                <i class="fa fa-user-secret" aria-hidden="true"></i> Adatvédelem
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tartalom menüblokk -->
                <li class="treeview" id="content-menu">
                    <a href="#">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span data-toggle="tooltip" data-placement="bottom" title="Hírek, cikkek kezelése">Tartalom</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('admin/tartalom/hirek'); ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Hírek</a></li>
                        <li><a href="<?php echo base_url('admin/tartalom/hirek/kategoriak'); ?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Hírkategóriák</a></li>
                        <?php if(!$hide_prepared): ?><li><a href="<?php echo base_url('admin/tartalom/cikkek'); ?>"><i class="fa fa-file-text" aria-hidden="true"></i> Cikkek</a></li><?php endif; ?>
                    </ul>
                </li>

                <!-- Üzenetek menüblokk -->
                <li class="treeview" id="messages-menu">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span data-toggle="tooltip" data-placement="bottom" title="Üzenetek kezelése">Üzenetek</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('admin/uzenetek/erkezett-uzenetek'); ?>">
                                <i class="fa fa-envelope"></i> Beérkezett üzenetek
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/uzenetek/elkuldott-uzenetek'); ?>">
                                <i class="fa fa-arrow-circle-o-left"></i> Elküldött üzenetek
                            </a>
                        </li>
                        <?php
                        if(!is_null($contact_config)):
                        $contact_group = $contact_config->contact_group_id;
                        if(
                                (!is_null($contact_group) && $aauth->is_loggedin())
                                &&
                                $aauth->is_member($contact_group,$_SESSION['id'])):
                        ?>
                            <li>
                                <a href="<?php echo base_url('admin/uzenetek/kapcsolatfelvetelek'); ?>">
                                    <i class="fa fa-at" aria-hidden="true"></i> Kapcsolatfelvételek
                                </a>
                            </li>
                        <?php
                        endif;
                        endif;
                        ?>

                        <li>
                            <a href="<?php echo base_url('admin/uzenetek/ertesitesek'); ?>">
                                <i class="fa fa-bell-o"></i> Értesítések
                            </a>
                        </li>
                        <?php if(!$hide_prepared): ?>
                        <li>
                            <a href="<?php echo base_url('admin/uzenetek/spam'); ?>">
                                <i class="fa fa-ban"></i> Spam
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/uzenetek/kuka'); ?>">
                                <i class="fa fa-trash-o"></i> Kuka
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>



                <!-- Felhasználók menüblokk -->
                <li class="treeview" id="users-menu">
                    <a href="#">
                        <i class="fa fa-users"></i> <span data-toggle="tooltip" data-placement="bottom" title="Felhasználók listája, jogok szerkesztése, kitiltás...">Felhasználók</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('admin/felhasznalok'); ?>">
                                <i class="fa fa-user"></i> Összes felhasználó
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/felhasznalok/csoportok'); ?>">
                                <i class="fa fa-users"></i> Csoportok
                            </a>
                        </li>
                        <?php if(!$hide_prepared): ?>
                        <li>
                            <a href="<?php echo base_url('admin/felhasznalok/tiltott-felhasznalok'); ?>">
                                <i class="fa fa-ban"></i> Tiltott felhasználók
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/felhasznalok/jelentett-felhasznalok'); ?>">
                                <i class="fa fa-flag-checkered"></i> Jelentett felhasználók
                                <small class="label pull-right bg-red">9</small>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>


                <!-- Fórum menüblokk -->
                <li class="treeview" id="content-menu">
                    <a href="#">
                        <i class="fa fa-pencil-square-o"></i> <span data-toggle="tooltip" data-placement="bottom" title="Fórum műveletek">Fórum</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('admin/forum'); ?>" title="Áttekintés">
                                <i class="fa fa-eye"></i> Áttekintés
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/forum/temak'); ?>" title="Fórum témák listája">
                                <i class="fa fa-wpforms"></i> Témák
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/forum/kategoriak'); ?>" title="Kategóriák szerkesztése">
                                <i class="fa fa-list-alt"></i> Kategóriák
                            </a>
                        </li>
                        <?php if(!$hide_prepared): ?>
                        <li>
                            <a href="<?php echo base_url('admin/forum/jelentesek'); ?>" title="Jelentett bejegyzések/hozzászólások">
                                <i class=" fa fa-flag-checkered"></i> Jelentések
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/forum/beallitasok'); ?>" title="Fórummal kapcsolatos beállítások">
                                <i class="fa fa-cogs"></i> Beállítások
                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo base_url('admin/forum/szabalyzat-szerkesztese'); ?>" title="Fórummal szabályzat szerkesztése">
                                <i class="fa fa-gavel" aria-hidden="true"></i> Szabályzat
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <?php
    if(isset($view)){
        echo $view;
    }
    ?>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src="<?php echo site_url('bower_components/fastclick/lib/fastclick.js'); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('bower_components/admin-lte/dist/js/adminlte.min.js'); ?>" type="text/javascript"></script>

<?php if(empty($js_files) === false): ?>
    <?php foreach ($js_files as $js_file): ?>
        <script src="<?php echo (substr_count($js_file,"http") > 0) ? $js_file : site_url($js_file); ?>" type="text/javascript"></script>
    <?php endforeach; ?>
<?php endif; ?>

<script>
var base_url = "<?php echo base_url(); ?>";
</script>
</body>
</html>
