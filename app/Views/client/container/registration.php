<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container">
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
    <?php if($this->session->flashdata('system_msg_contact')):
        $system_msg = $this->session->flashdata('system_msg_contact');
        ?>
        <div class="alert alert-<?php echo $system_msg['type']; ?>"><?php echo $system_msg['result-message']; ?></div>
    <?php endif; ?>
    <div class="panel panel-primary form-panel col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="panel-heading">
            <div class="panel-title text-center">Regisztráció</div>
        </div>

        <div class="panel-body text-center">
            <form action="<?php echo base_url('regisztracio') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group required">
                    <label class="control-label" for="reg_lastname">Vezetéknév</label>
                    <input type="text" id="reg_lastname" name="reg_lastname" class="form-control text-center"
                           required="required" minlength="5" maxlength="30" value="<?php echo (!form_error('reg_lastname')) ? set_value('reg_lastname') : ''; ?>"/>
                </div>
				
                <div class="form-group required">
                    <label class="control-label" for="reg_firstname">Keresztnév</label>
                    <input type="text" id="reg_firstname" name="reg_firstname" class="form-control text-center"
                           required="required" minlength="5" maxlength="30" value="<?php echo (!form_error('reg_firstname')) ? set_value('reg_firstname') : ''; ?>"/>
                </div>
				
                <div class="form-group required">
                    <label class="control-label" for="reg_username">Felhasználónév</label>
                    <input type="text" id="reg_username" name="reg_username" class="form-control text-center"
                           required="required" minlength="5" maxlength="30" value="<?php echo (!form_error('reg_username')) ? set_value('reg_username') : ''; ?>"/>
                </div>

                <div class="form-group required">
                    <label class="control-label" for="reg_password">Jelszó</label>
                    <input type="password" id="reg_password" name="reg_password" class="form-control text-center" required="required" minlength="5"/>
                </div>

                <div class="form-group required">
                    <label class="control-label" for="reg_password_confirm">Jelszó megerősítés</label>
                    <input type="password" id="reg_password_confirm" name="reg_password_confirm" class="form-control text-center" required="required" minlength="5"/>
                </div>

                <div class="form-group required">
                    <label class="control-label" for="reg_email">E-mail cím</label>
                    <input type="email" id="reg_email" name="reg_email" class="form-control text-center"
                           required="required" value="<?php echo (!form_error('reg_email')) ? set_value('reg_email') : ''; ?>"/>
                </div>

                <input type="submit" class="btn btn-primary" value="Regisztráció">
            </form>
        </div>
    </div>
</div>