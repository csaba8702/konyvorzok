<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.04.02.
 * Time: 8:03
 */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-4">
                <h1>
                    <?php echo $user_data->username; ?> profilja
                    <a href="<?php echo base_url('admin/felhasznalok') ?>" class="btn btn-primary">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <?php if( is_null($user_data->profile_image_path) ): ?>
                                <img class="profile-user-img img-responsive" src="<?php echo base_url('uploads/users/profiles/no_avatar.png'); ?>" alt="Nincs profilkép">
                            <?php else: ?>
                                <img class="profile-user-img img-responsive" src="<?php echo base_url($user_data->profile_image_path); ?>" alt="<?php echo $user_data->username; ?> profilképe">
                            <?php endif; ?>

                            <h3 class="profile-username text-center"><?php echo !is_null($user_data->username) ? $user_data->username : ""; ?></h3>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label>Email</label><p class="pull-right"><?php echo !is_null($user_data->email) ? $user_data->email : ""; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <label>Regisztráció ideje</label><p class="pull-right"><?php echo !is_null($user_data->date_created) ? $user_data->date_created : "0000-00-00 00:00"; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <label>IP cím</label><p class="pull-right"><?php echo !is_null($user_data->ip_address) ? $user_data->ip_address : "ismeretlen"; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <label>Telefonszám</label><p class="pull-right"><?php echo !is_null($user_data->phone_number) ? $user_data->phone_number : "Nincs megadva"; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <label>Születési idő</label><p class="pull-right"><?php echo !is_null($user_data->birth_date) ? $user_data->birth_date : "Nincs megadva"; ?></p>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-block show_send_message_modal" title="Üzenet" data-user_id="<?php echo $user_data->user_id; ?>" data-username="<?php echo $user_data->username; ?>" <?php echo ($user_data->user_id == $_SESSION['id']) ? "disabled=\"disabled\"" : '';  ?>>
                                <i class="fa fa-envelope" aria-hidden="true"></i><b> Üzenet</b>
                            </button>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title text-center">Statisztika</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <td>Összes témája:</td>
                                        <td><?php echo !is_null($user_statistics['all_posts']) ? $user_statistics['all_posts'] : ""; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nyitott témái:</td>
                                        <td><?php echo !is_null($user_statistics['open_posts']) ? $user_statistics['open_posts'] : ""; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Megválaszolt témái:</td>
                                        <td><?php echo !is_null($user_statistics['answered_posts']) ? $user_statistics['answered_posts'] : ""; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="background-color: rgba(0,0,0,0.48);"></td>
                                    </tr>
                                    <tr>
                                        <td>Hozzászólások száma:</td>
                                        <td><?php echo !is_null($user_all_comments) ? $user_all_comments : ""; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Elfogadott válaszainak száma:</td>
                                        <td><?php echo !is_null($user_all_solutions) ? $user_all_solutions : ""; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

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
<!-- /.content-wrapper -->
