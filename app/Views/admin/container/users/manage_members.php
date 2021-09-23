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
            <div class="col-xs-6">
                <h1>
                    Csoporttagok kezelése <?php echo isset($group_data) ? "[ " .$group_data->name . " ]" : ""; ?>
                    <a href="<?php echo base_url('admin/felhasznalok/csoportok') ?>" class="btn btn-primary">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Vissza
                    </a>
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_user" rowspan="1" colspan="1" aria-sort="ascending">Utolsó belépés</th>
                                        <th tabindex="0" rowspan="1" colspan="1" aria-controls="admin_forum_posts">Műveletek</th>
                                    </tr>
                                    </thead>
                                </table>
                                <button type="button" id="add_members_btn" class="btn btn-primary" title="Kijelöltek hozzáadása a csoporthoz"><i class="fa fa-plus-circle" aria-hidden="true"></i> Kijelöltek hozzáadása</button>
                                <button type="button" id="drop_members_btn" class="btn btn-danger" title="Kijelöltek eltávolítása a csoportból"><i class="fa fa-trash" aria-hidden="true"></i> Kijelöltek eltávolítása</button>
                                <button type="button" id="refresh_page" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Frissítés</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-default fade" id="add_members_multiple_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tagok hozzáadása</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-primary">
                            <h4 class="text-center">Biztosan hozzáadja a kijelölt (<span id="add_selected_count"></span>) felhasználót a(z) <?php echo isset($group_data) ? "[ " .$group_data->name . " ]" : ""; ?> csoporthoz?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse
                        </button>

                        <button type="button" class="btn btn-primary" id="apply_members_button" data-dismiss="modal">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Tagok hozzáadása
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-default fade" id="drop_members_multiple_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tagok eltávolítása</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan eltávolítja a kijelölt (<span id="drop_selected_count"></span>) felhasználót a(z) <?php echo isset($group_data) ? "[ " .$group_data->name . " ]" : ""; ?> csoportból?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse
                        </button>

                        <button type="button" class="btn btn-danger" id="drop_members_button" data-dismiss="modal">
                            <i class="fa fa-user-times" aria-hidden="true"></i> Tagok eltávolítása
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-default fade" id="add_member_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Felhasználó hozzáadása a csoporthoz</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <h4 class="text-center">Biztosan hozzáadja a felhasználót(<span id="add_member_uname"></span>) a(z) <?php echo isset($group_data) ? "[ " .$group_data->name . " ]" : ""; ?> csoporthoz?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-primary" id="add_member_button" data-dismiss="modal"><i class="fa fa-user-plus" aria-hidden="true"></i> Hozzáadás</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-default fade" id="drop_member_modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Bezár">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Felhasználó(k) tagságának törlése</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <h4 class="text-center">Biztosan kizárja a felhasználót(<span id="drop_member_uname"></span>) a(z) <?php echo isset($group_data) ? "[ " .$group_data->name . " ]" : ""; ?> csoportból?</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse</button>
                        <button type="button" class="btn btn-danger" id="drop_member_button" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Kizárás</button>
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
