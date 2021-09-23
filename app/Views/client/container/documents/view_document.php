<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.04.02.
 * Time: 16:35
 */
?>
<div class="container-fluid">
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
            <?php if( !isset($docu_file) ): ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-info">
                                <h1 class="text-center">A dokumentum nem található</h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif (is_file(FCPATH. $docu_file['path'])): ?>
                <object data="<?php echo base_url($docu_file['path']); ?>" type="application/pdf" class="col-xs-12" style="margin: 10px; min-height: 900px;">
                    alt : <a href="<?php echo base_url($docu_file['path']); ?>"><?php echo $file_title; ?></a>
                </object>
            <?php endif; ?>
        </div>
    </div>
</div>

