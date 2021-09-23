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
            <div class="col-sm-4">
                <h1>
                    Beérkezett üzenetek
                </h1>
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
                            <form id="received_msg">
                                <table id="admin_inbox_messages" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="admin_inbox_messages_info">
                                    <thead>
                                        <tr role="row">
                                            <th><input name="select_all" type="checkbox" title="Összes kijelölése"></th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="admin_inbox_messages" rowspan="1" colspan="1" aria-sort="ascending">Megtekintve</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="admin_inbox_messages" rowspan="1" colspan="1" aria-sort="ascending">Tárgy</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="admin_inbox_messages" rowspan="1" colspan="1" aria-sort="ascending">Feladó</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="admin_inbox_messages" rowspan="1" colspan="1" aria-sort="ascending">Feladás ideje</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="admin_inbox_messages" rowspan="1" colspan="1" aria-sort="ascending">Műveletek</th>
                                        </tr>
                                    </thead>
                                </table>
                                <button type="button" id="delete_selected_rcv_msgs" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Kijelöltek törlése</button>
                                <button type="button" id="refresh_msg_list" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Frissítés</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Msg delete modal - Simple Item -->
        <div class="modal modal-default fade" id="delete_msg_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Üzenet törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan törölni akarja ezt az üzenetet?<br/><strong>Figyelem! A művelet nem visszavonható!</strong></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="delete_this_msg" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Messages delete modal - Multiple Items -->
        <div class="modal modal-default fade" id="delete_msgs_multiple_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Kijelölt üzenetek törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan törölni akarja a kijelölt <strong id="delete_multiple_num"></strong> üzenetet?<br/><strong>Figyelem! A művelet nem visszavonható!</strong></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="delete_selected_msgs" data-dismiss="modal"><i class="fa fa-trash" aria-hidden="true"></i> Törlés</button>
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
