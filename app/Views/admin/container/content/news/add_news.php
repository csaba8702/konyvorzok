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
            <div class="col-sm-2">
                <h1>
                    Új hír
                </h1>
            </div>
            <div class="col-sm-10" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/tartalom/hirek'); ?>" class="btn btn-primary">
                        <i class="fa fa-arrow-circle-left" style="margin-right: 5px !important;"></i> Mégse
                    </a>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['system_error_msg'])): ?>
            <div class="alert alert-danger text-center">
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
            <div class="alert alert-success text-center">
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
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div id="kv-avatar-errors-2" class="center-block" style="display:none"></div>
                <form action="<?php echo base_url('admin/tartalom/hirek/uj') ?>" id="add_news_form" method="post" enctype="multipart/form-data">
                    <div class="form-group required">
                        <label for="news_title" class="control-label">Cím</label>
                        <input
                                type="text"
                                id="news_title"
                                name="news_title"
                                class="form-control"
                                value="<?php echo form_error('news_title') == "" ? set_value('news_title') : ''; ?>"
                                required
                        >
                    </div>

                    <div class="form-group required">
                        <label for="news_category" class="control-label">Kategória</label>
                        <select id="news_category" name="news_category"  class="form-control selectpicker" required>
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
                        <label for="news_text" class="control-label">Hír szövege</label>
                        <textarea id="news_text" name="news_text" class="form-control" required        ><?php echo form_error('news_text') == "" ? set_value('news_text') : ''; ?></textarea>
                    </div>

                    <div class="form-group required">
                        <label for="news_publish" class="control-label">Publikus</label>
                        <input type="checkbox" id="news_publish" name="news_publish" value="1" <?php echo set_checkbox('news_publish','1',set_value('news_publish') == '1'); ?>>
                    </div>

                    <div class="form-group kv-avatar">
                        <label for="update_cover" class="control-label">Borítókép

                            <input id="update_cover" name="update_cover" type="file" required>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary col-xs-12 text-center">
                        <i class="fa fa-floppy-o" aria-hidden="true" style="margin-right: 5px !important;"></i>
                        Mentés
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
