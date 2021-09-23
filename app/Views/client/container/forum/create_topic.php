<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.03.07.
 * Time: 21:07
 */
?>
<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-xs-12">
            <form action="<?php base_url('forum/tema/uj') ?>" class="form form-vertical" id="create_topic_form" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <a href="<?php echo base_url('forum'); ?>" class="btn btn-primary pull-right">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Mégse
                        </a>
                        <h2 class="panel-title" style="font-size: 30px;">Új téma létrehozása</h2>
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

                        <div class="form-group required">
                            <label for="new_topic_title" class="control-label">Téma címe</label>
                            <input type="text" class="form-control" name="new_topic_title" id="new_topic_title" maxlength="150" required>
                        </div>

                        <div class="form-group required">
                            <label for="new_topic_category" class="control-label">Kategória</label>
                            <select id="new_topic_category" name="new_topic_category"  class="form-control selectpicker" required>
                                <option value="0" disabled>Nincs szülő</option>
                                <?php
                                $subgroup = array();
                                ?>
                                <optgroup label="Főkategóriák">
                                    <?php foreach ($categories as $category): ?>
                                        <?php if($category->parent_id == null): ?>
                                            <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                        <?php endif; ?>
                                        <?php if(!is_null($category->children)){
                                            array_push($subgroup,$category);
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </optgroup>

                                <?php foreach ($subgroup as $item): ?>
                                    <optgroup label="<?php echo $item->title; ?>">
                                        <?php foreach ($item->children as $child): ?>
                                            <option value="<?php echo $child->id; ?>"><?php echo $child->title; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label for="new_topic_content" class="control-label">Téma kifejtése</label>
                            <textarea id="new_topic_content" name="new_topic_content" required></textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary form-control" id="save_new_topic_btn"><i class="fa fa-save" aria-hidden="true"></i> Új téma mentése</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>