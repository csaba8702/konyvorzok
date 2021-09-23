<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.03.24.
 * Time: 18:59
 */
    $hide_prepared = true;
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
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title text-center" style="font-weight: bolder; font-size: 36px;">Fórum</h1>
        </div>
    </div>
    <div class="row pinboard">
        <?php if(count($category_tree) < 1): ?>
        <div class="panel panel-info">
            <div class="panel-body">
                <h4 class="text-center">Nincs megjeleníthető tartalom</h4>
            </div>
        </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-lg-2">
                    <button class="btn btn-primary btn-block pull-right add_new_post" style="margin: 20px 0;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Új téma</button>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-5 col-lg-offset-2">
                    <div class="text-center">
                        <?php if (isset($links)): ?>
                            <?php echo $links ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>



        <?php if(isset($category_tree)): ?>
            <?php foreach ($category_tree as $category): ?>
                <div class="item">
                    <div class="well">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="<?php echo base_url('forum/kategoria/'.$category->id) ?>">
                                        <?php echo $category->title; ?>
                                    </a>
                                    <span class="clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="statistics">
                                    <h4><span class="label label-primary">Összes téma<span class="badge badge-inverse"><?php echo $category->statisics['all_post_num']; ?></span></span></h4>
                                    <h4><span class="label label-info">Megválaszolatlan téma<span class="badge badge-inverse"><?php echo $category->statisics['unanswered_post_num']; ?></span></span></h4>
                                    <?php if(!$hide_prepared): ?><h4><span class="label label-danger">Lezárt téma<span class="badge badge-inverse"><?php echo $category->statisics['closed_post_num']; ?></span></span></h4><?php endif; ?>
                                    <h4><span class="label label-warning">Moderált téma<span class="badge badge-inverse"><?php echo $category->statisics['moderated_post_num']; ?></span></span></h4>
                                </div>

                                <?php if(!is_null($category->children)): ?>
                                    <?php foreach ($category->children as $child): ?>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="<?php echo base_url('forum/kategoria/'.$child->id) ?>">
                                                        <?php echo $child->title; ?>
                                                    </a>
                                                    <span class="clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="statistics">
                                                    <h4><span class="label label-primary">Összes téma<span class="badge badge-inverse"><?php echo $child->statisics['all_post_num']; ?></span></span></h4>
                                                    <h4><span class="label label-info">Megválaszolatlan téma<span class="badge badge-inverse"><?php echo $child->statisics['unanswered_post_num']; ?></span></span></h4>
                                                    <?php if(!$hide_prepared): ?><h4><span class="label label-danger">Lezárt téma<span class="badge badge-inverse"><?php echo $child->statisics['closed_post_num']; ?></span></span></h4><?php endif; ?>
                                                    <h4><span class="label label-warning">Moderált téma<span class="badge badge-inverse"><?php echo $child->statisics['moderated_post_num']; ?></span></span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-lg-2">
                    <button class="btn btn-primary btn-block pull-right add_new_post" style="margin: 20px 0;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Új téma</button>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-5 col-lg-offset-2">
                    <div class="text-center">
                        <?php if (isset($links)): ?>
                            <?php echo $links ?>
                        <?php endif; ?>
                    </div>
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
                    <div class="alert text-center" id="modal-message-text">...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary form-control" data-dismiss="modal" onclick="location.reload()">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
