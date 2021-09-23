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
        <div class="row">
            <div class="col-xs-1" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/forum/kategoriak'); ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true" style="margin-right: 5px"></i> Mégse</a>
                </div>
            </div>
            <div class="col-xs-11">
                <h1>
                    Új kategória
                </h1>
            </div>
        </div>
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
    </section>

    <!-- Main content -->
    <section class="content col-xs-8" style="margin-left: 16.66666667% !important;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo base_url('admin/tartalom/hirek/kategoriak/uj');?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_title" class="control-label">Cím</label>
                        <input type="text" id="category_title" name="category_title" class="form-control" maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="category_parent" class="control-label">Szülő kategória</label>
                        <select id="category_parent" name="category_parent" class="form-control selectpicker">
                            <option value="0">Nincs szülő</option>
                            <optgroup label="Főkategóriák">
                                <?php
                                if(isset($main_categories)):
                                    foreach ($main_categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </optgroup>
                        </select>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <button id="save_new_category" class="btn btn-primary form-control"><i class="fa fa-save" aria-hidden="true"></i> Mentés</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="message-modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert" id="modal-message-text">...</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
