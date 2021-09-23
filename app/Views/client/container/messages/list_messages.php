<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.03.04.
 * Time: 14:40
 */
$hide_prepared = true;
?>
<div class="container" style="margin-bottom:65px;">
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
    <div class="row">
        <div class="col-xs-2">
            <!-- tabs left -->
            <div class="tabbable tabs-left" id="messages_types">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#inbox" data-toggle="tab">Érkezett üzenetek</a></li>
                    <li><a href="#sent_msg" data-toggle="tab">Küldött üzenetek</a></li>
                    <?php if(!$hide_prepared): ?>
                    <li><a href="#spams" data-toggle="tab">Spam</a></li>
                    <li><a href="#trash" data-toggle="tab">Kuka</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="col-xs-10">
            <div class="tab-content">

                <div class="tab-pane active" id="inbox">
                    <?php if(isset($inbox_messages)): ?>
                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <table id="list_inbox_messages" class="table table-bordered table-responsive dataTable" role="grid" aria-describedby="list_inbox_messages_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_inbox_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladó</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_inbox_messages" aria-sort="ascending" rowspan="1" colspan="1">Tárgy</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_inbox_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladva</th>
                                    <th rowspan="1" colspan="1">Műveletek</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($inbox_messages as $inbox_item):
                                    ?>
                                    <tr role="row" class="text-center">
                                        <td>
                                            <?php
                                            $avatar_path = null;
                                            if(isset($inbox_item->sender_user_data->profile_image_path)){
                                                $avatar_path = $inbox_item->sender_user_data->profile_image_path;
                                            }
                                            else{
                                                $avatar_path = "uploads/users/profiles/no_avatar.png";
                                            }
                                            ?>
                                            <img src="<?php echo base_url($avatar_path) ?>" style="width: 50px; height: auto;" alt="avatar image">
                                            <?php echo $inbox_item->sender_user_data->username; ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?php echo $inbox_item->title; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $inbox_item->date_sent; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('uzenetek/uzenet-megtekintes/'.$inbox_item->id); ?>" class="btn btn-primary" title="Üzenet megnyitása"><i class="fa fa-sm fa-eye" aria-hidden="true"></i> Megnyitás</a>
                                            <button data-message_id="<?php echo $inbox_item->id; ?>"  class="btn btn-danger delete_inbox_message_btn" title="Üzenet törlése"><i class="fa fa-sm fa-trash" aria-hidden="true"></i> Törlés</button>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                </tbody>
                                <tfoot>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_inbox_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladó</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_inbox_messages" aria-sort="ascending" rowspan="1" colspan="1">Tárgy</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_inbox_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladva</th>
                                    <th rowspan="1" colspan="1">Műveletek</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>

                <div class="tab-pane" id="sent_msg">
                    <?php if(isset($sent_messages)): ?>
                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <table id="list_sent_messages" class="table table-bordered table-responsive dataTable" role="grid" aria-describedby="list_sent_messages_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_sent_messages" aria-sort="ascending" rowspan="1" colspan="1">Címzett</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_sent_messages" aria-sort="ascending" rowspan="1" colspan="1">Tárgy</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_sent_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladva</th>
                                    <th rowspan="1" colspan="1">Műveletek</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($sent_messages as $sent_msg_item):
                                    ?>
                                    <tr role="row" class="text-center">
                                        <td>
                                            <?php
                                            $avatar_path = null;
                                            if(isset($sent_msg_item->receiver_user_data->profile_image_path)){
                                                $avatar_path = $sent_msg_item->receiver_user_data->profile_image_path;
                                            }
                                            else{
                                                $avatar_path = "uploads/users/profiles/no_avatar.png";
                                            }
                                            ?>
                                            <img src="<?php echo base_url($avatar_path) ?>" style="width: 50px; height: auto;" alt="avatar image">
                                            <?php echo $sent_msg_item->receiver_user_data->username; ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?php echo $sent_msg_item->title; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $sent_msg_item->date_sent; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('uzenetek/uzenet-megtekintes/'.$sent_msg_item->id); ?>" class="btn btn-primary" title="Üzenet megnyitása"><i class="fa fa-sm fa-eye" aria-hidden="true"></i> Megnyitás</a>
                                            <button data-message_id="<?php echo $sent_msg_item->id; ?>"  class="btn btn-danger delete_sent_message_btn" title="Üzenet törlése"><i class="fa fa-sm fa-trash" aria-hidden="true"></i> Törlés</button>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                </tbody>
                                <tfoot>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_sent_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladó</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_sent_messages" aria-sort="ascending" rowspan="1" colspan="1">Tárgy</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="list_sent_messages" aria-sort="ascending" rowspan="1" colspan="1">Feladva</th>
                                    <th rowspan="1" colspan="1">Műveletek</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
                <div class="tab-pane" id="spams">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                    Quisque mauris augue, molestie tincidunt condimentum vitae. </div>
                <div class="tab-pane" id="trash">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                    Quisque mauris augue, molestie tincidunt condimentum vitae. </div>
            </div>
        </div>
        <!-- /tabs -->
    </div>

    <!-- Modal Üzenet törlés -->
    <div class="modal fade" id="delete_message_modal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Küldött üzenet törlése</h4>
                </div>

                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h5>Biztosan törli ezt az üzenetet?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-danger" id="message_to_trash" data-dismiss="modal">Törlés</button>
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