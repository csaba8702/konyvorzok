<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container-fluid" style="margin-bottom: 100px">
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
    <div class="row">
        <div class="col-lg-8">
            <section class="news_body">
                <header>
                    <h1 class="news_title"><?php echo $news_data->title; ?></h1>
                    <h4 class="news_meta">
                        <small>
                            <?php echo $news_data->mod_time; ?>
                            <span class="pull-right"><i class="fa fa-user" aria-hidden="true"></i> Szerző: <?php echo $news_data->author_username; ?></span>
                        </small>
                    </h4>

                    <figure>
                        <img class="img-responsive" src="<?php echo base_url($news_data->cover_image_path); ?>"/>
                    </figure>
                </header>
                <article class="content_body">
                    <?php echo $news_data->content_body; ?>
                </article>
                <footer></footer>
            </section>
        </div>
        <div class="col-lg-4" style="margin-top: 5px;">
            <aside>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Hírek - TOP 5 legolvasottabb</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php if(isset($top5_most_read)): ?>
                                <?php foreach ($top5_most_read as $item): ?>
                                    <li class="list-group-item">
                                        <a href="<?php echo base_url('hirek/'.$item->id.'/'.$item->slug); ?>"><?php echo $item->title; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

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
                                                <span class="post-title" title="<?php echo $item->title; ?>"><?php echo (strlen($item->title) > 50) ? substr($item->title,0,49)."..." : $item->title; ?></span>
                                                <span class="post-meta">
                                                    <small class="pull-left hidden-xs">
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
            </aside>
        </div>
    </div>
</div>
