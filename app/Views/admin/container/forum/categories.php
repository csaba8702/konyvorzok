<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 12:19
 */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-2">
                <h1>
                    Kategóriák
                </h1>
            </div>
            <div class="col-sm-10" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/forum/kategoriak/uj'); ?>" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true" style="margin: 2px;"></i> Új kategória</a>
                </div>
            </div>
        </div>
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
        <div class="box">
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="categories_list">
                            <table id="admin_forum_categories" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="admin_forum_categories_info">
                                <thead>
                                    <tr role="row">
                                        <th><input name="select_all" type="checkbox"></th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_forum_categories" rowspan="1" colspan="1" aria-sort="ascending">Cím</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_forum_categories" rowspan="1" colspan="1" aria-sort="ascending">Szülő kategória</th>
                                        <th tabindex="0" rowspan="1" colspan="1" aria-controls="admin_forum_categories">Műveletek</th>
                                    </tr>
                                </thead>
                            </table>
                                <button id="cat_delete_selected" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Kijelöltek törlése</button>
                                <div class="alert alert-warning" style="margin: 5px !important;">
                                    <h4 class="form-control-static">
                                        <i class="fa fa-2x fa-exclamation-triangle" aria-hidden="true" style="float: left; margin-right: 10px"></i>
                                        Ha egy kategóriához alkategóriák tartoznak, akkor addig nem törölhető az a kategória,<br/>
                                        amíg az összes alkategória törlése meg nem történik!
                                    </h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category delete modal - Simple Item -->
        <div class="modal modal-default fade" id="delete_category_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Kategória törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan törölni akarja ezt a kategóriát (<span id="modal_cat_name"></span>)?<br/><strong>Figyelem! A művelet nem visszavonható!</strong></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="delete_this_category" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Categories delete modal - Multiple Items -->
        <div class="modal modal-default fade" id="delete_category_multiple_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Kijelölt kategóriák törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan törölni akarja a kijelölt <strong id="delete_multiple_num"></strong> kategóriát?<br/><strong>Figyelem! A művelet nem visszavonható!</strong></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="delete_selected_categories" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
