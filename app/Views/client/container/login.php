<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container">
    <div class="panel panel-primary form-panel col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="panel-heading">
            <div class="panel-title text-center">Belépés</div>
        </div>

        <div class="panel-body text-center">
            <form action="<?php echo base_url('belepes') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label" for="login_email">Email</label>
                    <input type="email" id="login_email" name="login_email" class="form-control text-center"
                           value="<?php echo (!form_error('login_email')) ? set_value('login_email') : ''; ?>"/>
                </div>

                <div class="form-group">
                    <label class="control-label" for="login_password">Jelszó</label>
                    <input type="password" id="login_password" name="login_password" class="form-control text-center" minlength="5"/>
                </div>

                <div class="form-group">
                    <!--<input type="checkbox" id="login_remember" name="login_remember">-->
                    <?php echo form_checkbox('login_remember', 'value', set_checkbox('login_remember', 'value'));?>
                    <label class="control-label" for="login_remember">Jelszó megjegyzése</label>
                </div>
                <a href="<?php echo base_url('elfelejtett-jelszo') ?>">Elfelejtett jelszó</a>
                
                <input type="submit" class="btn btn-primary" value="Belépés">
            </form>
        </div>
    </div>
</div>