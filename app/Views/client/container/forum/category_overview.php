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
                    <h1 class="text-center"><?php echo $category->title; ?></h1>
                </div>
                <div class="panel-body">
                    <button onclick="window.history.back();" class="btn btn-primary pull-left">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"> Vissza</i>
                    </button>
					<?php if( $this->aauth->is_loggedin() ): ?>
                    <button class="btn btn-primary pull-right" id="add_new_post">
						<i class="fa fa-plus-circle" aria-hidden="true"> Új téma</i>
					</button>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 50px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title"><?php echo $category->title; ?></h4>
                    <!--<span class="pull-right"><i class="glyphicon glyphicon-chevron-up"></i></span>-->
                </div>
                <div class="panel-body">

                    <?php if(isset($sub_categories)): ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Alkategóriák</h4>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <?php if(count($sub_categories) > 0): ?>
                                <?php foreach ($sub_categories as $sub_category): ?>
                                <a class="btn btn-success" href="<?php echo base_url('forum/kategoria/'.$sub_category->id) ?>" style="margin-bottom: 5px;">
                                    <?php echo $sub_category->title ?>
                                </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-info text-center">Nem található alkategória.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <table class="table table-bordered table-responsive topics">
                        <thead>
                            <tr>
                                <th>Állapot</th>
                                <th>Cím</th>
                                <th>Témaindító</th>
                                <th>Hozzászólások</th>
                                <th>Utolsó hozzászólás</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden_info">
        <input type="hidden" id="category_id" value="<?php echo $category->id; ?>">
    </div>

    <!-- Modal -->
	<!-- Modal - téma beküldés -->
	<div class="modal fade" id="send_post_modal" role="dialog">
		<div class="modal-dialog modal-lg">

		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Válasz beküldése</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('forum/valasz-mentese'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group required">
                            <label for="new_post_title" class="control-label">Téma címe</label>
                            <input type="text" class="form-control" name="new_post_title" id="new_post_title" maxlength="150" required>
                        </div>
					
					
						<div class="form-group required">
							<label for="new_post_content">Téma kifejtése</label>
							<textarea id="new_post_content" rows="10" cols="150" class="form-control"></textarea>
							<input type="hidden" id="post_to_category_id" value="<?php echo $category->id; ?>">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
					<button type="button" class="btn btn-primary" id="save_new_post" data-dismiss="modal">Küldés</button>
				</div>
			</div>
		</div>
	</div>
	
    <div class="modal fade" id="message-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert" id="modal-message-text">...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary form-control" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
