<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.03.04.
 * Time: 21:41
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
                    <div id="message_details">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form id="message_details_nosubmit" action="javascript:void(0);">
                                    <?php if(is_null($message_data->sender_user_data) && !is_null($message_data->receiver_user_data)): ?>
                                        <div class="form-group">
                                            <label for="receiver" class="control-label">Címzett</label>
                                            <input type="text" id="receiver" value="<?php echo $message_data->receiver_user_data->username; ?>" disabled="disabled" class="form-control">
                                        </div>
                                    <?php elseif(!is_null($message_data->sender_user_data) && is_null($message_data->receiver_user_data)): ?>
                                        <div class="form-group">
                                            <label for="sender" class="control-label">Feladó</label>
                                            <input type="text" id="sender" value="<?php echo $message_data->sender_user_data->username; ?>" disabled="disabled" class="form-control">
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label for="subject" class="control-label">Tárgy</label>
                                        <input type="text" id="subject" value="<?php echo $message_data->title; ?>" disabled="disabled" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="send_time" class="control-label">Feladás ideje</label>
                                        <input type="text" id="send_time" value="<?php echo $message_data->date_sent; ?>" disabled="disabled" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="control-label">Üzenet</label>
                                        <textarea id="message" class="form-control" contenteditable="false"><?php echo $message_data->message; ?></textarea>
                                    </div>
                                </form>
                            </div>

                            <div class="panel-footer">
                                <div class="btn-group">
                                    <?php
                                    // "én" vagyok a címzett
                                    if(is_object($message_data->sender_user_data) && !is_object($message_data->receiver_user_data)): ?>
                                        <button class="btn btn-primary reply_message" data-message_id="<?php echo $message_data->id ?>" data-user_id="<?php echo $message_data->sender_user_data->user_id; ?>" data-username="<?php echo $message_data->sender_user_data->username ?>">
                                            <i class="fa fa-reply" aria-hidden="true" style="margin-right: 5px;"></i> Válasz
                                        </button>

                                    <?php endif; ?>

                                    <?php if(!$hide_prepared): ?>
                                    <?php if($message_data->sender_id !== $_SESSION['id']): ?>
                                    <button class="btn btn-warning sender_mark_spammer">
                                        <i class="fa fa-ban" aria-hidden="true" style="margin-right: 5px;"></i> Spam
                                    </button>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <button type="button" class="btn btn-danger delete_message">
                                        <i class="fa fa-trash" aria-hidden="true" style="margin-right: 5px;"></i> Törlés
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Válasz -->
    <div class="modal fade" id="reply_to_message" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Válasz küldése</h4>
                </div>

                <div class="modal-body">
                    <form action="javascript:void(0);" method="post" enctype="multipart/form-data" id="reply_form">
                        <div class="form-group">
                            <label for="reply_subject" class="control-label">Tárgy</label>
                            <input type="text" id="reply_subject" name="reply_subject" value="RE: <?php echo $message_data->title; ?>" disabled="disabled" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reply_text" class="control-label">Válasz</label>
                            <textarea id="reply_text" name="reply_text" class="form-control"></textarea>
                        </div>
                        <input type="hidden" id="message_id" name="message_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-primary" id="send_reply_now" data-dismiss="modal">Válasz küldése</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Spam -->
    <div class="modal fade" id="mark_as_spam" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Megjelölés kéretlenként</h4>
                </div>

                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h3>Biztos benne hogy nem kíván több üzenetet kapni ettől a feladótól?</h3>
                    </div>
                    <input type="hidden" id="sender_id" value="<?php echo $message_data->sender_id ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Nem</button>
                    <button type="button" class="btn btn-primary" id="sender_is_spammer" data-dismiss="modal">Igen</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Törlés -->
    <div class="modal fade" id="delete_message_modal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Üzenet törlése</h4>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger">
                        <h3>
                            Biztos benne hogy törli ezt az üzenetet?<br/>
                            A művelet <strong>nem visszavonható!</strong>
                        </h3>
                    </div>
                    <input type="hidden" id="delete_message_id" value="<?php echo $message_data->id; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Nem</button>
                    <button type="button" class="btn btn-primary" id="delete_this_message" data-dismiss="modal">Igen</button>
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
                    <button type="button" class="btn btn-primary form-control" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
