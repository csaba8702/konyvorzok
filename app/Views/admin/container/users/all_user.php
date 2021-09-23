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
            <div class="col-sm-4">
                <h1>
                    Összes felhasználó
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
                                <table id="admin_all_user" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="admin_all_user_info">
                                    <thead>
                                    <tr role="row">
                                        <th><input name="select_all" type="checkbox" title="Összes kijelölése"></th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_user" rowspan="1" colspan="1" aria-sort="ascending">Profilkép</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_user" rowspan="1" colspan="1" aria-sort="ascending">Felhasználónév</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_user" rowspan="1" colspan="1" aria-sort="ascending">Regisztrált</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_user" rowspan="1" colspan="1" aria-sort="ascending">E-mail</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_user" rowspan="1" colspan="1" aria-sort="ascending">Utolsó belépés</th>
                                        <th tabindex="0" rowspan="1" colspan="1" aria-controls="admin_forum_posts">Műveletek</th>
                                    </tr>
                                    </thead>
                                </table>
                                <button type="button" id="refresh_msg_list" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Frissítés</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Msg ban user modal - Simple Item -->
        <div class="modal modal-default fade" id="ban_user_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Felhasználó tiltása</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan letiltja ezt a felhasználót(<span id="simple_ban_username"></span>)?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="ban_this_user" data-dismiss="modal"><i class="fa fa-lock" aria-hidden="true"></i> Tiltás</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Msg unban user modal - Simple Item -->
        <div class="modal modal-default fade" id="unban_user_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Felhasználó tiltásának visszavonása</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan feloldja a felhasználó(<span id="simple_unban_username"></span>) tiltását?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-success" id="unban_this_user" data-dismiss="modal"><i class="fa fa-unlock" aria-hidden="true"></i> Feloldás</button>
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
