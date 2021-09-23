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
            <div class="col-sm-1">
                <h1>
                    Hírek
                </h1>
            </div>
            <div class="col-sm-11" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/tartalom/hirek/uj'); ?>" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true" style="margin: 2px;"></i> Új hír</a>
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
                            <form id="all_news_tbl">
                                <table id="admin_list_news" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="admin_list_news_info">
                                    <thead>
                                    <tr role="row">
                                        <th><input name="select_all" type="checkbox" title="Összes kijelölése"></th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Cím</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Kategória</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Szerző</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Publikálva</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Műveletek</th>
                                    </tr>
                                    </thead>
                                </table>
                                <button type="button" id="delete_selected_news" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Kijelöltek törlése</button>
                                <button type="button" id="refresh_page" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Frissítés</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News delete modal - Simple Item -->
        <div class="modal modal-default fade" id="delete_news_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Hír törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan törölni akarja ezt a hírt?<br/><strong>Figyelem! A művelet nem visszavonható!</strong></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="delete_news_now_btn" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- News delete modal - Multiple Items -->
        <div class="modal modal-default fade" id="delete_news_multiple_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Kijelölt hírek törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan törölni akarja a kijelölt <strong id="delete_multiple_num"></strong> hírt?<br/><strong>Figyelem! A művelet nem visszavonható!</strong></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="delete_selected_news_btn" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
