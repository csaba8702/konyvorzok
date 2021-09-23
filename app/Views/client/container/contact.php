<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 50px">
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title text-center">Kapcsolatfelvétel</h4>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url('kapcsolat') ?>" method="post" id="send_message" enctype="multipart/form-data">
                        <div class="form-group required">
                            <label for="msg_name" class="control-label">Név</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="msg_name"
                                    id="msg_name"
                                    title="Név"
                                    value="<?php echo !form_error('msg_name') ? set_value('msg_name') : ''; ?>"
                                    required
                            >
                        </div>

                        <div class="form-group required">
                            <label for="msg_email" class="control-label">E-mail cím</label>
                            <input
                                    type="email"
                                    class="form-control"
                                    name="msg_email"
                                    id="msg_email"
                                    title="E-mail cím"
                                    value="<?php echo !form_error('msg_email') ? set_value('msg_email') : '';?>"
                                    required
                            >
                        </div>

                        <div class="form-group required">
                            <label for="msg_subject" class="control-label">Tárgy</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    name="msg_subject"
                                    id="msg_subject"
                                    title="Üzenet tárgya"
                                    maxlength="150"
                                    value="<?php echo !form_error('msg_subject') ? set_value('msg_subject') : '';?>"
                                    required
                            >
                        </div>

                        <div class="form-group required">
                            <label for="msg_message" class="control-label">Üzenet</label>
                            <textarea id="msg_message" name="msg_message" class="form-control" required>
                                <?php
                                if(!form_error('msg_message')){
                                    echo set_value('msg_message');
                                }
                                ?>
                            </textarea>
                        </div>
                        <?php //echo $captcha->render(); ?>
                        <button type="submit" class="btn btn-primary form-control text-center">
                            <i class="fa fa-envelope" aria-hidden="true"></i> Küldés
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
