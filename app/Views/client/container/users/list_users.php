<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
$hide_prepared = true;
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
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="list_users" class="table table-bordered dataTable" role="grid" aria-describedby="list_users_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_users" aria-sort="ascending" rowspan="1" colspan="1">Felhasználó</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_users" aria-sort="ascending" rowspan="1" colspan="1">Utolsó belépés</th>
                                            <th rowspan="1" colspan="1">Műveletek</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($users)):
                                            foreach ($users as $user):
                                        ?>
                                                <tr role="row" class="text-center">
                                                    <td>
                                                        <?php
                                                        $avatar_path = (strlen($user->profile_image_path) > 1) ? $user->profile_image_path : "uploads/users/profiles/no_avatar.png";
                                                        ?>
                                                        <img src="<?php echo base_url( $avatar_path ) ?>" style="width: 50px; height: auto;" alt="avatar image">
                                                        <?php echo $user->username; ?>
                                                    </td>
                                                    <td><?php echo $user->last_login; ?></td>
                                                    <td>
                                                        <button data-user_id="<?php echo $user->user_id; ?>" data-username="<?php echo $user->username; ?>" <?php echo ($user->user_id == $_SESSION['id']) ? "disabled=\"disabled\"" : '';  ?> class="btn btn-primary show-send-message-modal" title="Üzenet küldés"><i class="fa fa-sm fa-envelope" aria-hidden="true"></i></button>
                                                        <button data-user_id="<?php echo $user->user_id; ?>" data-username="<?php echo $user->username; ?>" class="btn btn-info show_user_profile" title="Profil megtekintése"><i class="fa fa-sm fa-user" aria-hidden="true"></i></button>
                                                        <?php if(!$hide_prepared): ?>
                                                        <button data-user_id="<?php echo $user->user_id; ?>" data-username="<?php echo $user->username; ?>" <?php echo ($user->user_id == $_SESSION['id']) ? 'disabled' : '';  ?> class="btn btn-danger add_my_blocking_list" title="Letiltás"><i class="fa fa-sm fa-ban" aria-hidden="true"></i></button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                            endif;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_users" aria-sort="ascending" rowspan="1" colspan="1">Felhasználó</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="list_users" aria-sort="ascending" rowspan="1" colspan="1">Utolsó belépés</th>
                                            <th rowspan="1" colspan="1">Műveletek</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Belső üzenet -->
            <div class="modal fade" id="user_message_modal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Belső üzenet küldés</h4>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('uzenetek/uzenet-kuldes'); ?>" id="user_message_form" method="post" enctype="multipart/form-data">
                                <div class="form-group required">
                                    <label for="user_msg_subject" class="control-label">Üzenet tárgya</label>
                                    <input type="text" name="user_msg_subject" required="required" id="user_msg_subject" title="Üzenet tárgya" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label for="user_msg_text" class="control-label">Üzenet szövege</label>
                                    <textarea id="user_msg_text" required="required" name="user_msg_text" rows="10" cols="150" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-primary" id="send_user_message" data-dismiss="modal">Küldés</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tiltás -->
            <div class="modal fade" id="ban_user_by_user" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Felhasználó letiltása</h4>
                        </div>

                        <div class="modal-body">
                            <div id="user_message_form">
                                <label for="reason_of_blocking" class="control-label">Letiltás oka (nem kötelező)</label>
                                <textarea id="reason_of_blocking" name="reason_of_blocking" rows="10" cols="150" class="form-control"></textarea>

                                <input type="hidden" name="user_id" id="target_user_id">
                                <input type="hidden" name="username" id="target_user_username">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-danger" id="block_user_now" data-dismiss="modal">Letiltás</button>
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

