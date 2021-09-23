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
            <div class="col-xs-3 col-md-1" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/forum/temak'); ?>" class="btn btn-primary"><i class="fa fa-arrow-circle-left" aria-hidden="true" style="margin-right: 5px"></i> Mégse</a>
                </div>
            </div>
            <div class="col-xs-9 col-md-11">
                <h1>
                    Téma moderálása
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
        <div class="row row-eq-height">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                <div class="box box-primary" style="height:100%;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Téma törzse</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" action="javascript:void(0);">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="mod_post_content" class="control-label">Téma szövege</label>
                                    <textarea class="form-control" id="mod_post_content" title="Téma törzse"><?php echo $post->content; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="mod_moderation_msg" class="control-label">Moderálás oka</label>
                                    <textarea class="form-control" id="mod_moderation_msg" title="Moderálás megjegyzés"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                <div class="box box-primary" style="height:100%;">
                    <div class="box-header with-border">
                        <h3 class="box-title">Téma meta adatok</h3>
                    </div>

                    <div class="box-body">
                        <form class="form-horizontal" action="javascript:void(0);">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="mod_post_author" class="col-sm-2 control-label">Szerző</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control disabled" id="mod_post_author" disabled value="<?php echo $post->author_name; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mod_post_category" class="col-sm-2 control-label">Kategória</label>
                                    <div class="col-sm-10">
                                        <select id="mod_post_category" name="mod_post_category"  class="form-control selectpicker" required>
                                            <?php
                                            $subgroup = array();
                                            ?>
                                            <optgroup label="Főkategóriák">
                                                <?php foreach ($categories as $category): ?>
                                                    <?php if($category->parent_id == null): ?>
                                                        <option value="<?php echo $category->id; ?>" <?php echo ($post->category_id == $category->id) ? "selected=\"selected\"" : ""; ?>><?php echo $category->title; ?></option>
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
                                                        <option value="<?php echo $child->id; ?>" <?php echo ($post->category_id == $category->id) ? "selected=\"selected\"" : ""; ?>><?php echo $child->title; ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Megtekintve</label>
                                    <div class="col-sm-10">
                                        <span class="pull-left-container"  style="height: 20px !important;font-size:12pt;position:relative;top:0.5em;">
                                            <small class="label pull-left bg-green" style="height: 20px !important;font-size:12pt;position:relative;top:0.5em;">
                                                <?php echo $post->view_count; ?>
                                            </small>&nbsp;alkalommal
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Létrehozva</label>
                                    <div class="col-sm-10">
                                        <span class="pull-left-container">
                                            <small class="label pull-left bg-blue" style="height: 20px !important;font-size:12pt;position:relative;top:0.5em;">
                                                <?php echo $post->created_time; ?>
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="mod_post_id" value="<?php echo $post->id; ?>">
                            <input type="hidden" id="mod_post_slug" value="<?php echo $post->slug; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <button class="btn btn-primary form-control" type="button" id="moderate_save_btn">Mentés</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Rendszerüzenet -->
        <div class="modal fade" id="message-modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert" id="modal-message-text">...</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
