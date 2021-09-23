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
                    Csoportok
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
                                <table id="admin_all_group" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="admin_all_group_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_group" rowspan="1" colspan="1" aria-sort="ascending"># ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_group" rowspan="1" colspan="1" aria-sort="ascending">Csoportnév</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_group" rowspan="1" colspan="1" aria-sort="ascending">Leírás</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="admin_all_group" rowspan="1" colspan="1" aria-sort="ascending">Műveletek</th>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
