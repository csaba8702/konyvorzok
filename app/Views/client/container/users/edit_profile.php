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
            <div class="panel panel-info" style="margin-bottom: 100px;">
                <div class="panel-heading">
                    <a href="<?php echo base_url(strtolower('felhasznalok/profil/'.$_SESSION['id'].'/'.$_SESSION['username'])); ?>" class="btn btn-primary pull-right">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse
                    </a>
                    <h2 class="panel-title" style="font-size: 30px;">Profil szerkesztése [ <?php echo $_SESSION['username'] ?> ]</h2>
                </div>
                <div class="panel-body">
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
                    <div id="kv-avatar-errors-2" class="center-block" style="display:none"></div>

                    <form class="form form-vertical" id="profile_edit_form" action="<?php echo base_url('felhasznalok/profil/szerkesztes') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-center">
                                <div class="kv-avatar">
                                    <div class="file-loading">
                                        <input id="update_avatar" name="update_avatar" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-xs-12 col-sm-6 col-md-8 col-lg-9">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="update_email">Email cím<span class="kv-reqd">*</span></label>
                                            <input
                                                    type="text"
                                                    placeholder="gipszjakab@valami.xyz"
                                                    class="form-control"
                                                    id="update_email"
                                                    name="update_email"
                                                    value="<?php echo (strlen($user_data->email) == 0 ) ? "" : $user_data->email ; ?>"
                                                    required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label for="update_birthdate" class="control-label">Születési idő<span class="kv-reqd">*</span></label>
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    id="update_birthdate"
                                                    data-provide="datepicker"
                                                    name="update_birthdate"
                                                    value="<?php echo (strlen($user_data->birth_date) == 0 ) ? "Nincs megadva" : $user_data->birth_date ; ?>"
                                                    required>
                                            <i class="form-control-feedback glyphicon glyphicon-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="update_passwd" class="control-label">Jelszó<span class="kv-reqd">*</span></label>
                                            <input type="password" class="form-control" id="update_passwd" name="update_passwd" minlength="5" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="update_passwd_confirm">Jelszó újra<span class="kv-reqd">*</span></label>
                                            <input type="password" class="form-control" id="update_passwd_confirm" minlength="5" name="update_passwd_confirm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="update_phone" class="control-label">
                                                Telefonszám<br/>
                                                <small class="alert-info">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Belföldi előhívó (06) nélkül!
                                                </small>
                                            </label>
                                            <input
                                                    type="tel"
                                                    class="form-control"
                                                    id="update_phone"
                                                    name="update_phone"
                                                    value="<?php echo (isset($user_data->phone_number) == 0 ) ? "" : $user_data->phone_number ; ?>">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']; ?>">
                                <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">

                                <div class="form-group">
                                    <hr>
                                    <div class="text-right">
                                        <?php //echo $captcha->render(); ?>
                                        <input type="submit" class="btn btn-primary" value="Mentés"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

