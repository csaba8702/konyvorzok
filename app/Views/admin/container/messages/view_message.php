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
                    Üzenet megtekintése
                </h1>
            </div>
            <div class="col-sm-6" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo $_SESSION['referred_from']; ?>" class="btn btn-primary">
                        <i class="fa fa-arrow-circle-left" style="margin-right: 5px !important;"></i> Vissza
                    </a>
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
                <div id="message_details">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form id="message_details_nosubmit" action="javascript:void(0);">
                                <div class="form-group">
                                    <label for="sender" class="control-label">Feladó</label>
                                    <input type="text" id="sender" value="<?php echo $message->sender_name ?>" disabled="disabled" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="control-label">Tárgy</label>
                                    <input type="text" id="subject" value="<?php echo $message->title ?>" disabled="disabled" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="send_time" class="control-label">Feladás ideje</label>
                                    <input type="text" id="send_time" value="<?php echo $message->date_sent ?>" disabled="disabled" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message" class="control-label">Üzenet</label>
                                    <textarea id="message" class="form-control" contenteditable="false"><?php echo $message->message ?></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="panel-footer">
                            <div class="btn-group">
                                <?php if($message->sender_id !== $_SESSION['id']): ?>
                                <button class="btn btn-primary reply_message" data-msg_id="<?php echo $message->id ?>">
                                    <i class="fa fa-reply" aria-hidden="true" style="margin-right: 5px;"></i> Válasz
                                </button>
                                <?php endif; ?>

                                <button class="btn btn-danger delete_message" data-msg_id="<?php echo $message->id ?>">
                                    <i class="fa fa-trash" aria-hidden="true" style="margin-right: 5px;"></i> Törlés
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->

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
                    <form action="#" method="post" enctype="multipart/form-data" id="reply_form">
                        <div class="form-group">
                            <label for="reply_subject" class="control-label">Tárgy</label>
                            <input type="text" id="reply_subject" name="reply_subject" value="RE:<?php echo $message->title ?>" disabled="disabled" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reply_text" class="control-label">Válasz</label>
                            <textarea id="reply_text" name="reply_text" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-primary" id="send_reply_now" data-dismiss="modal">Válasz küldése</button>
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
                        </h3>
                    </div>
                    <input type="hidden" id="http_referral" value="<?php echo $_SESSION['referred_from'] ?>">
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
<!-- /.content-wrapper -->
