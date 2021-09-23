<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
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
            <div class="box" style="margin-bottom: 65px !important;">
                <div content="box-title">
                    <h4>Letiltott felhasználók</h4>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="list_blocked" class="table table-bordered dataTable" role="grid" aria-describedby="list_blocked_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_blocked" aria-sort="ascending" rowspan="1" colspan="1">Felhasználó</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_blocked" aria-sort="ascending" rowspan="1" colspan="1">Letiltva ekkor</th>
                                            <th rowspan="1" colspan="1">Műveletek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /*echo "<pre>";
                                        print_r($blocked_users);
                                        echo "</pre>";
                                        exit(1);*/

                                        if(isset($blocked_users)):
                                            foreach ($blocked_users as $user):
                                        ?>
                                                <tr role="row" class="text-center">
                                                    <td>
                                                        <?php
                                                        $avatar_path = (strlen($user['profile_image_path']) > 1) ? $user['profile_image_path'] : "uploads/users/profiles/no_avatar.png";
                                                        ?>
                                                        <img src="<?php echo base_url( $avatar_path ) ?>" style="width: 50px; height: auto;" alt="avatar image">
                                                        <?php echo $user['username']; ?>
                                                    </td>
                                                    <td><?php echo $user['time_of_blocking']; ?></td>
                                                    <td>
                                                        <button data-user_id="<?php echo $user['blocked_user_id']; ?>" data-username="<?php echo $user['username']; ?>" class="btn btn-success unblock_user" title="Tiltás feloldása"><i class="fa fa-sm fa-unlock" aria-hidden="true"></i> Feloldás</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                            endif;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_blocked" aria-sort="ascending" rowspan="1" colspan="1">Felhasználó</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_blocked" aria-sort="ascending" rowspan="1" colspan="1">Letiltva ekkor</th>
                                            <th rowspan="1" colspan="1">Műveletek</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Feloldás -->
            <div class="modal fade" id="unblock_modal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tiltás feloldása</h4>
                        </div>

                        <div class="modal-body">
                            <div class="alert alert-info">
                                Biztos benne, hogy fel akarja oldani a felhasználó <span id="modal_username"></span> tiltását?<br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-success" id="unblock_this_user" data-dismiss="modal">Feloldás</button>
                        </div>
                    </div>
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
                            <button type="button" class="btn btn-primary form-control" data-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

