<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container-fluid" style="margin-bottom: 60px;">
    <div class="row">
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

        <div class="col-lg-8 col-lg-offset-3 col-md-8 col-md-offset-3 col-sm-12 col-sm-offset-5 col-xs-12 col-xs-offset-5">
            <?php if (isset($links)): ?>
                <?php echo $links ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <?php if (!isset($results)): ?>
                <div class="alert alert-info">
                    <h4 class="text-center">
                        Nincs megjeleníthető hír.
                    </h4>
                </div>
            <?php endif; ?>
            <?php if (isset($results)): ?>
                <?php foreach ($results as $data): ?>
                    <article>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <figure>
                                    <img class="img-responsive" src="<?php echo base_url( is_file(FCPATH.$data->cover_thumb_path) ? $data->cover_thumb_path : $data->cover_image_path ); ?>"/>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4><?php echo $data->title; ?></h4>
                                <div class="news_intro_text">
                                    <?php echo substr($data->content_body,0,strlen($data->content_body) > 150 ? 150 : strlen($data->content_body)); ?>
                                </div>
                                <section>

                                    <span class="hidden-xs">
                                        <i class="glyphicon glyphicon-folder-open"></i><?php echo $data->category_title; ?>
                                    </span>
                                    <span>
                                        <i class="glyphicon glyphicon-user"></i><?php echo $data->author_username; ?>
                                    </span>
                                    <span>
                                        <i class="glyphicon glyphicon-eye-open"></i><?php echo $data->view_count; ?>
                                    </span>
                                    <span>
                                        <i class="glyphicon glyphicon-calendar"></i><?php echo $data->mod_time; ?>
                                    </span>

                                    <a href="<?php echo base_url('hirek/'.$data->id.'/'.$data->slug); ?>" class="btn btn-primary btn-sm pull-right">
                                        Tovább <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    </a>
                                </section>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>




        </div>
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="text-center panel-title">Fórum - Legfrissebb témák</h2>
                </div>
                <div class="panel-body">
                    <ol class="fresh-posts">
                        <?php if(isset($top10_new_topic)): ?>
                            <?php foreach ($top10_new_topic as $item): ?>
                                <li>
                                    <a href="<?php echo base_url('forum/tema/'.$item->id.'/'.$item->slug); ?>">
                                        <div class="post-data">
                                            <span class="post-title"><?php echo $item->title; ?></span>
                                            <span class="post-meta">
                                                    <small class="pull-left">
                                                        Szerző: <?php echo $item->author_username; ?>
                                                    </small>
                                                    <small class="pull-right">
                                                        <?php echo $item->created_time; ?>
                                                    </small>
                                                </span>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
