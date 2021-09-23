<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 12:19
 */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Fórum
        </h1>
    </section>

    <?php if(isset($_SESSION['system_error_msg'])): ?>
        <div class="alert harakiri-alert alert-danger text-center">
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
        <div class="alert harakiri-alert alert-success text-center">
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

    <!-- Main content -->
    <section class="content">
        <!-- fórum témák -->
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" title="Ma aktív felhasználók">Ma aktív felhasználók</span>
                        <span class="info-box-number">
                            <?php echo (isset($today_active_users_num)) ? $today_active_users_num : "?" ; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" title="Összes felhasználó">Összes felhasználó</span>
                        <span class="info-box-number">
                            <?php echo (isset($total_users_num)) ? $total_users_num : "?" ; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" title="Mai új téma">Mai új téma</span>
                        <span class="info-box-number">
                            <?php echo (isset($today_posts_num)) ? $today_posts_num : "?" ; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-maroon"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" title="Összes téma">Összes téma</span>
                        <span class="info-box-number">
                            <?php echo (isset($total_posts_num)) ? $total_posts_num : "?" ; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="fa fa-commenting-o" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" title="Mai hozzászólások">Mai hozzászólások</span>
                        <span class="info-box-number">
                            <?php echo (isset($today_comments_num)) ? $today_comments_num : "?" ; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-comments-o" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text" title="Összes hozzászólás">Összes hozzászólás</span>
                        <span class="info-box-number">
                            <?php echo (isset($total_comments_num)) ? $total_comments_num : "?" ; ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- Heti aktivitás -->
    <section class="content-header">
        <h1>
            Heti aktivitás
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Felhasználók változása</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="chart">
                            <canvas id="usersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Új témák</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="chart">
                            <canvas id="postsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.Heti aktivitás -->
</div>
<!-- /.content-wrapper -->
