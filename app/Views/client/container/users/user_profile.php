<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */

/*
* Később kidolgozásra kerülő elemek elrejtése */
$hide_prepared = true;
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 100px">
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
            <div class="panel panel-info">
                <div class="panel-heading">
                    <?php if($user_data->user_id == $_SESSION['id']): ?>
                    <a href="<?php echo base_url('felhasznalok/profil/szerkesztes'); ?>" class="btn btn-primary pull-right">
                        <i class="fa fa-edit" aria-hidden="true"></i> Adatok módosítása
                    </a>
                    <?php endif; ?>
                    <h2 class="panel-title" style="font-size: 30px;"><?php echo $user_data->username; ?></h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3" align="center">
                                <?php if(isset($user_data->profile_image_path)): ?>
                                    <img alt="Profilkép" src="<?php echo base_url($user_data->profile_image_path) ?>" class="img-responsive"/>
                                <?php else: ?>
                                    <img alt="Nincs profilkép" src="<?php echo base_url('uploads/users/profiles/no_avatar.png'); ?>" class="img-responsive"/>
                                <?php endif; ?>
                        </div>

                        <div class=" col-md-9 col-lg-9">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Felhasználónév:</td>
                                    <td><?php echo $user_data->username; ?></td>
                                </tr>
                                <tr>
                                    <td>Születési dátum</td>
                                    <td><?php echo (strlen($user_data->birth_date) == 0 ) ? "Nincs megadva" : $user_data->birth_date ; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class=" col-md-9 col-lg-9">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Statisztika</h4>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Saját témái (összes / nyitott / megválaszolt )</td>
                                            <td><?php echo $user_statistics['all_posts']; ?> / <?php echo $user_statistics['open_posts']; ?> / <?php echo $user_statistics['answered_posts']; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Válaszai (adott / elfogadott)</td>
                                            <td><?php echo $user_all_comments; ?> / <?php echo $user_all_solutions; ?> </td>
                                        </tr>
                                        <?php if(!$hide_prepared): ?>
                                        <tr>
                                            <td>Jelentett témák (adott / kapott)</td>
                                            <td>9 / 4 </td>
                                        </tr>
                                        <tr>
                                            <td>Jelentett hozzászólások (adott / kapott)</td>
                                            <td>38 / 17 </td>
                                        </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!$hide_prepared): ?>
                <div class="panel-footer">
                    <?php if($_SESSION['id'] == $user_data->user_id): ?>
                        <a class="btn btn-primary" href="<?php echo base_url('felhasznalok/profil/uzenetek'); ?>" title="Érkezett üzenetek megtekintése"><i class="fa fa-envelope" aria-hidden="true"></i> Üzeneteim</a>
                    <?php else: ?>
                        <button class="btn btn-primary send_private_message" data-user_id="<?php echo $user_data->user_id; ?>" data-username="<?php echo $user_data->username; ?>" title="Privát üzenet küldése"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                    <?php endif; ?>

                    <span class="pull-right">
                        <button class="btn btn-danger add_my_blocking_list" data-user_id="<?php echo $user_data->user_id; ?>" data-username="<?php echo $user_data->username; ?>" title="Felhasználó letiltása"><i class="fa fa-ban" aria-hidden="true"></i></button>
                        <button class="btn btn-warning report_this_user" data-user_id="<?php echo $user_data->user_id; ?>" data-username="<?php echo $user_data->username; ?>" title="Felhasználó jelentése"><i class="fa fa-flag-checkered" aria-hidden="true"></i></button>
                    </span>
                </div>
                <?php endif; ?>
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
                            <form action="" id="user_message_form" method="post" enctype="multipart/form-data">
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
                                <label for="reason_for_blocking" class="control-label">Letiltás oka (nem kötelező)</label>
                                <textarea id="reason_for_blocking" name="reason_for_blocking" rows="10" cols="150" class="form-control"></textarea>

                                <input type="hidden" name="target_user_id" id="target_user_id" value="<?php echo $user_data->user_id ?>">
                                <input type="hidden" name="target_user_username" id="target_user_username" value="<?php echo $user_data->username ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-danger" id="block_user_now" data-dismiss="modal">Letiltás</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal jelentés -->
            <div class="modal fade" id="report_user_by_user" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Felhasználó jelentése</h4>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('ffelhasznalok/jelentes'); ?>" id="report_user_form" method="post" enctype="multipart/form-data">
                                <div class="form-group required">
                                    <label for="reason_for_report" class="control-label">Jelentés oka</label>
                                    <textarea id="reason_for_report" required="required" name="reason_for_report" rows="10" cols="150" class="form-control"></textarea>
                                </div>

                                <input type="hidden" name="user_id" id="target_user_id">
                                <input type="hidden" name="username" id="target_user_username">
                                <input type="hidden" id="base_url" title="" value="<?php echo base_url(); ?>">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-danger" id="report_user_now" data-dismiss="modal">Jelentés</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal rendszer-üzenet-->
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

        </div>
    </div>
</div>
