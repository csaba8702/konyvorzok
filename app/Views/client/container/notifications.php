<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
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

    <div class="row">
        <div class="col-lg-8 col-lg-offset-3 col-md-8 col-md-offset-3 col-sm-12 col-sm-offset-5 col-xs-12 col-xs-offset-5">
            <?php if (isset($links)): ?>
                <?php echo $links ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="margin-bottom: 65px !important;">
                <div class="box-body">
                    <?php if(!isset($results)): ?>
                        <div class="alert alert-info">
                            <h4>Nincsenek értesítések.</h4>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($results)): ?>
						<input id="select_all_checkbox" type="checkbox" />
                        <?php foreach ($results as $data): ?>
                            <div class="row">
                                <div class="alert alert-<?php echo $data->msg_type ?>">
								
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 5px;">
									<input class="delete_notification_checkbox" type="checkbox" name="delete_notification_checkbox[]" value="<?php echo $data->id ; ?>" />
								</div>
								
                                    <span class="col-xs-1"><?php echo $data->id ?></span>
                                    <span class="col-xs-6">
                                        <a href="<?php echo base_url($data->msg_url) ?>"><?php echo $data->msg_text ?></a>
                                    </span>
                                    <span class="col-xs-2">
                                        <?php echo $data->created_time ?>
                                    </span>
                                    <button class="btn btn-danger col-xs-2 delete_notification" data-msg_id="<?php echo $data->id ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Törlés
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        <?php endforeach; ?>
						<button class="btn btn-danger col-xs-12 col-sm-12 col-md-3 col-lg-2 delete_all_notifications" data-msg_id="<?php echo $data->id ?>">
							<i class="fa fa-trash" aria-hidden="true"></i> Összes törlése
						</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Üzenet törlés -->
    <div class="modal fade" id="delete_notify_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Értesítés törlése</h4>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger">
                        <h5>Biztosan törli ezt az értesítést?<br/><strong>A művelet nem visszavonható!</strong></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-danger" id="notify_delete" data-dismiss="modal">Törlés</button>
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
