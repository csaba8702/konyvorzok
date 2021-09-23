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
                    Rendszer beállítások
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
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <form id="site_meta_settings_form">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Metaadatok</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <label for="meta_keywords_input" class="control-label">Kulcsszavak</label>
                                    <textarea id="meta_keywords_input" name="meta_keywords_input" class="form-control" maxlength="255"><?php echo (!is_null($meta_config) && (strlen($meta_config->keywords) > 1) ) ? trim($meta_config->keywords) : ""; ?></textarea>
                                </div>

                                <div class="form-group col-xs-12">
                                    <label for="meta_description_input" class="control-label">Leírás</label>
                                    <textarea id="meta_description_input" name="meta_description_input" class="form-control"><?php echo (!is_null($meta_config) && (strlen($meta_config->description) > 1) ) ? trim($meta_config->description) : ""; ?></textarea>
                                </div>

                                <div class="form-group col-xs-12">
                                    <label for="meta_robots_select" class="control-label">Robotok</label>
                                    <select id="meta_robots_select" name="meta_robots_select" class="selectpicker">
                                        <option value="index,follow" <?php echo ( !is_null($meta_config) && ($meta_config->robots == "index,follow") ) ? "selected" : ""; ?>>Van indexelés, van követés</option>
                                        <option value="noindex,follow" <?php echo ( !is_null($meta_config) && ($meta_config->robots == "noindex,follow") ) ? "selected" : ""; ?>>Nincs indexelés, van követés</option>
                                        <option value="index,nofollow" <?php echo ( !is_null($meta_config) && ($meta_config->robots == "index,nofollow") ) ? "selected" : ""; ?>>Van indexelés, nincs követés</option>
                                        <option value="noindex,nofollow" <?php echo ( !is_null($meta_config) && ($meta_config->robots == "noindex,nofollow") ) ? "selected" : ""; ?>>Nincs indexelés, nincs követés</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary form-control" type="button" id="save_meta_settings"><i class="fa fa-save" aria-hidden="true"></i> Mentés</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-6">
                <form id="smtp_settings_form" method="post" enctype="multipart/form-data">
                    <div class="panel panel-primary">

                        <div class="panel-heading">
                            <h4 class="panel-title">SMTP beállítások</h4>
                        </div>
                        <div class="panel-body">
                            <!-- SMTP form 1. sor -->
                            <div class="row">
                                <div class="form-group required col-xs-6">
                                    <label for="smtp_host_input" class="control-label">Kiszolgáló</label>
                                    <input
                                            type="text"
                                            name="smtp_host_input"
                                            id="smtp_host_input"
                                            placeholder="ssl://<smtp-server-domain / IP cím>"
                                            class="form-control"
                                            value="<?php echo (isset($smtp_config->host) && (strlen($smtp_config->host) > 1) ) ? $smtp_config->host : ""; ?>"
                                            required
                                    >
                                </div>

                                <div class="form-group required col-xs-6">
                                    <label for="smtp_password_input" class="control-label">Jelszó</label>
                                    <input
                                            type="password"
                                            name="smtp_password_input"
                                            id="smtp_password_input"
                                            class="form-control"
                                            placeholder="<?php echo ($smtp_config->password)?'SMTP jelszó *' : 'SMTP jelszó';  ?>"
                                            autocomplete="new-password"
                                            required
                                    >
                                </div>
                            </div>
                            <!-- SMTP form 1. sor VÉGE -->

                            <!-- SMTP form 2. sor -->
                            <div class="row">
                                <div class="form-group required col-xs-6">
                                    <label for="smtp_port_input" class="control-label">Port</label>
                                    <input
                                            type="number"
                                            name="smtp_port_input"
                                            id="smtp_port_input"
                                            max="65535"
                                            class="form-control"
                                            value="<?php echo (isset($smtp_config->port) && (strlen($smtp_config->port) > 1) ) ? $smtp_config->port : 465; ?>"
                                            required
                                    >
                                </div>

                                <div class="form-group required col-xs-6">
                                    <label for="smtp_password_confirm_input" class="control-label">Jelszó újra</label>
                                    <input
                                            type="password"
                                            name="smtp_password_confirm_input"
                                            id="smtp_password_confirm_input"
                                            class="form-control"
                                            placeholder="<?php echo ($smtp_config->password)?'SMTP jelszó *' : 'SMTP jelszó';  ?>"
                                            autocomplete="new-password"
                                            required
                                    >
                                </div>
                            </div>
                            <!-- SMTP form 2. sor VÉGE -->

                            <!-- SMTP form 3. sor -->
                            <div class="row">
                                <div class="form-group required col-xs-6">
                                    <label for="smtp_user_input" class="control-label">Felhasználó</label>
                                    <input
                                            type="text"
                                            name="smtp_user_input"
                                            id="smtp_user_input"
                                            class="form-control"
                                            placeholder="SMTP felhasználónév / email cím"
                                            value="<?php echo (isset($smtp_config->user) && (strlen($smtp_config->user) > 1) ) ? $smtp_config->user : ""; ?>"
                                            required
                                    >
                                </div>

                                <div class="form-group required col-xs-6">
                                    <label for="smtp_mailtype_input" class="control-label">Email típus</label>
                                    <select id="smtp_mailtype_input" name="smtp_mailtype_input" class="selectpicker form-control">
                                        <option value="html" <?php echo (isset($smtp_config->mailtype) && ($smtp_config->mailtype == "html")) ? "selected" : ""; ?>>HTML</option>
                                        <option value="text" <?php echo (isset($smtp_config->mailtype) && ($smtp_config->mailtype == "text")) ? "selected" : ""; ?>>Szöveges</option>
                                    </select>
                                </div>
                            </div>
                            <!-- SMTP form 3. sor -->
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary form-control" type="button" id="save_smtp_settings"><i class="fa fa-save" aria-hidden="true"></i> Mentés</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <form id="contact_settings_form" method="post" enctype="multipart/form-data">
                    <div class="panel panel-primary">

                        <div class="panel-heading">
                            <h4 class="panel-title">Kapcsolattartás</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group required col-xs-6">
                                    <label for="default_contact_user_id" class="control-label">Kapcsolattartó felhasználó</label>
                                    <select id="default_contact_user_id" name="default_contact_user_id" class="form-control selectpicker" required>
                                        <?php if(isset($groups)): ?>
                                            <?php foreach ($groups as $group): ?>
                                                <optgroup label="<?php echo $group->name; ?>">
                                                    <?php
                                                    $group_members = $aauth->list_users($group->name);
                                                    foreach ($group_members as $member):
                                                        ?>
                                                        <option value="<?php echo $member->id; ?>" <?php echo ( !is_null($contact_config) && ($member->id == $contact_config->contact_user_id)) ? "selected" : ""; ?> ><?php echo $member->username; ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            <?php  endforeach;?>
                                        <?php endif; ?>

                                    </select>
                                </div>

                                <div class="form-group col-xs-6">
                                    <label for="default_contact_group_id" class="control-label">Kapcsolattartó csoport</label>
                                    <select id="default_contact_group_id" name="default_contact_group_id" class="form-control selectpicker">
                                        <?php if(isset($groups)): ?>
                                            <?php foreach ($groups as $group): ?>
                                                <option value="<?php echo $group->id; ?>" <?php echo (!is_null($contact_config) && ($group->id == $contact_config->contact_group_id)) ? "selected" : ""; ?> ><?php echo $group->name; ?></option>
                                            <?php  endforeach;?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label for="contact_sender_name" class="control-label">Küldő neve</label>
                                <input
                                        type="text"
                                        id="contact_sender_name"
                                        name="contact_sender_name"
                                        class="form-control"
                                        value="<?php echo (!is_null($contact_config) && (strlen($contact_config->contact_sender_name) > 1) ) ? $contact_config->contact_sender_name : ""; ?>"
                                        required
                                >
                            </div>


                            <div class="form-group required">
                                <label for="contact_sender_email" class="control-label">Küldő email</label>
                                <input
                                        type="email"
                                        autocomplete="email"
                                        id="contact_sender_email"
                                        name="contact_sender_email"
                                        class="form-control"
                                        value="<?php echo (!is_null($contact_config) && (strlen($contact_config->contact_sender_email) > 1) ) ? $contact_config->contact_sender_email : ""; ?>"
                                        required
                                >
                            </div>

                            <div class="form-group">
                                <label for="contact_reply_email" class="control-label">Válasz email</label>
                                <input
                                        type="email"
                                        autocomplete="email"
                                        id="contact_reply_email"
                                        name="contact_reply_email"
                                        class="form-control"
                                        value="<?php echo (!is_null($contact_config) && (strlen($contact_config->contact_reply_email) > 1) ) ? $contact_config->contact_reply_email : ""; ?>"
                                >
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary form-control" type="button" id="save_contact_settings"><i class="fa fa-save" aria-hidden="true"></i> Mentés</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-6"></div>
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
                        <button type="button" class="btn btn-primary form-control" id="close_msg_modal" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
