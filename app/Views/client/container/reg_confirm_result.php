<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.03.03.
 * Time: 13:36
 */
?>
<div class="container">
    <?php if(isset($_SESSION['system_error_msg'])): ?>
        <div class="alert alert-danger harakiri-alert text-center">
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
        <div class="alert alert-success harakiri-alert text-center">
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
        <div class="alert harakiri-alert alert-<?php echo $system_msg['type']; ?>"><?php echo $system_msg['result-message']; ?></div>
    <?php endif; ?>
    <div class="panel panel-primary form-panel col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="panel-heading">
            <div class="panel-title text-center">Regisztráció megerősítés</div>
        </div>

        <div class="panel-body text-center">
            <?php if($result['type'] == "success"): ?>
                <div class="alert alert-success text-center">
                    <h4>
                        <small>
                            Regisztrációja sikeresen aktiválva! Most már be tud lépni!
                        </small>
                    </h4>
                </div>
            <?php elseif ($result['type'] == "fail"):?>
                <div class="alert alert-danger text-center">
                    <h4>
                        <small>
                            Regisztráció aktiválása sikertelen!<br/>
                            Lehetséges, hogy az aktiválásra megadott időkeret letelt!<br/>
                        </small>
                    </h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
