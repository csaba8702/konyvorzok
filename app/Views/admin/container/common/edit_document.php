<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Diák
 * Date: 2018. 03. 27.
 * Time: 13:18
 */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1>
                    Szabályzat szerkesztése
                </h1>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
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
        <div class="panel panel-primary" style="margin-top: 10px;">
            <div class="panel-heading">
                <h4 class="panel-title text-center">Dokumentum feltöltése</h4>
            </div>
            <div class="panel-body">

                <input type="hidden" id="upload_url" value="<?php echo $upload_url; ?>">
                <div class="file-loading">
                    <input id="document_input" name="document_input" type="file">
                </div>
                <?php if(is_file(FCPATH.$uploaded_file)): ?>
                    <div class="alert alert-primary">
                        <div class="col-xs-5 col-xs-offset-3">
                            <p class="text-center"><?php echo $uploaded_file_title; ?></p>
                        </div>
                        <div class="col-xs-4">
                            <p class="pull-right">Módosítás ideje: <?php echo $modify_time; ?></p>
                        </div>
                    </div>


                    <object data="<?php echo base_url($uploaded_file); ?>" type="application/pdf" class="col-xs-12" style="margin: 10px; min-height: 900px;">
                        alt : <a href="<?php echo base_url($uploaded_file); ?>"><?php echo $uploaded_file_title; ?></a>
                    </object>

                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
