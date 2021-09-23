<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
$hide_prepared = true;
?>
<div class="container-fluid">
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
        <?php if(!$hide_prepared): ?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <article class="main-article">
                <div class="row">
                    <div class="hidden-xs col-sm-3">
                        <img class="img-responsive" src="<?php echo base_url('uploads/articles/1/pexels-photo-546819.jpeg'); ?>" title="IT People">
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="article-intro">
                            <h3 class="main-article-title">Lorem ipsum dolor sit amet</h3>
                            <p class="caption-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mauris metus, accumsan id varius a,
                                tristique sed ex. Suspendisse potenti. Nullam nulla quam, consequat quis accumsan a, fringilla vitae sem...
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="#" class="pull-right article_read_more">Megnyitás <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </article>
            <article class="main-article">
                <div class="row">
                    <div class="hidden-xs col-sm-3">
                        <img class="img-responsive" src="<?php echo base_url('uploads/articles/1/pexels-photo-546819.jpeg'); ?>" title="IT People">
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="article-intro">
                            <h3 class="main-article-title">Lorem ipsum dolor sit amet</h3>
                            <p class="caption-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mauris metus, accumsan id varius a,
                                tristique sed ex. Suspendisse potenti. Nullam nulla quam, consequat quis accumsan a, fringilla vitae sem...
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="#" class="pull-right article_read_more">Megnyitás <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </article>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#" class="btn btn-link form-control text-center">További cikkek <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <aside class="last-news">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Legfrissebb hírek</h5>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <ol class="fresh-news">
                                <?php if(isset($top10_fresh_news) && count($top10_fresh_news) > 0): ?>
                                    <?php
                                    $max_num = null;
                                    if(count($top10_fresh_news) < 5) {
                                        $max_num = count($top10_fresh_news);
                                    }
                                    else{
                                        $max_num = 5;
                                    }
                                    for($i=0; $i<$max_num; $i++):
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url('hirek/'.$top10_fresh_news[$i]->id.'/'.$top10_fresh_news[$i]->slug); ?>">
                                                <div class="post-data">
                                                    <span class="post-title"><?php echo (strlen($top10_fresh_news[$i]->title) > 45) ? substr($top10_fresh_news[$i]->title,0,45)."..." : $top10_fresh_news[$i]->title ?></span>
                                                    <span class="post-meta">
                                                        <small class="pull-left hidden-xs">
                                                            Szerző: <?php echo $top10_fresh_news[$i]->author_username ?>
                                                        </small>
                                                        <small class="pull-right">
                                                            <?php echo $top10_fresh_news[$i]->created_time ?>
                                                        </small>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </ol>
                        </div>

                        <?php if(isset($top10_fresh_news) && count($top10_fresh_news) > 5): ?>
                            <div class="hidden-xs hidden-sm col-md-6 col-lg-6">
                                <ol class="fresh-news">

                                    <?php
                                    $start = 5;
                                    $max_num = null;

                                    if( (count($top10_fresh_news) > 5) && (count($top10_fresh_news) < 10) ) {
                                        $max_num = count($top10_fresh_news);
                                    }
                                    else{
                                        $max_num = 10;
                                    }
                                    for($i=$start; $i<$max_num; $i++):
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url('hirek/'.$top10_fresh_news[$i]->id.'/'.$top10_fresh_news[$i]->slug); ?>">
                                                <div class="post-data">
                                                    <span class="post-title"><?php echo (strlen($top10_fresh_news[$i]->title) > 45) ? substr($top10_fresh_news[$i]->title,0,45)."..." : $top10_fresh_news[$i]->title ?></span>
                                                    <span class="post-meta">
                                                        <small class="pull-left hidden-xs">
                                                            Szerző: <?php echo $top10_fresh_news[$i]->author_username ?>
                                                        </small>
                                                        <small class="pull-right">
                                                            <?php echo $top10_fresh_news[$i]->created_time ?>
                                                        </small>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ol>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="panel-footer text-center">
                        <a href="<?php echo base_url('hirek'); ?>" class="btn btn-primary btn-block">További hírek <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <div class="row" style="margin-bottom: 40px">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <aside class="last-posts">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5>Legújabb témák</h5>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <ol class="fresh-posts">
                                <?php if(isset($new_posts) && count($new_posts) > 0): ?>
                                    <?php
                                    $max_num = null;
                                    if(count($new_posts) < 5) {
                                        $max_num = count($new_posts);
                                    }
                                    else{
                                        $max_num = 5;
                                    }
                                    for($i=0; $i<$max_num; $i++):
                                    ?>
                                        <li>
                                            <a href="<?php echo base_url('forum/tema/'.$new_posts[$i]->id.'/'.$new_posts[$i]->slug); ?>">
                                                <div class="post-data">
                                                    <span class="post-title"><?php echo $new_posts[$i]->title ?></span>
                                                    <span class="post-meta">
                                                        <small class="pull-left hidden-xs">
                                                            Szerző: <?php echo $new_posts[$i]->author_name ?>
                                                        </small>
                                                        <small class="pull-right">
                                                            <?php echo $new_posts[$i]->created_time ?>
                                                        </small>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </ol>
                        </div>

                        <?php if(isset($new_posts) && count($new_posts) > 5): ?>
                            <div class="hidden-xs hidden-sm col-md-6 col-lg-6">
                                <ol class="fresh-posts">

                                    <?php
                                    $start = 5;
                                    $max_num = null;

                                    if( (count($new_posts) > 5) && (count($new_posts) < 10) ) {
                                        $max_num = count($new_posts);
                                    }
                                    else{
                                        $max_num = 10;
                                    }
                                    for($i=$start; $i<$max_num; $i++):
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url('forum/tema/'.$new_posts[$i]->id.'/'.$new_posts[$i]->slug); ?>">
                                                <div class="post-data">
                                                    <span class="post-title"><?php echo $new_posts[$i]->title ?></span>
                                                    <span class="post-meta">
                                                        <small class="pull-left hidden-xs">
                                                            Szerző: <?php echo $new_posts[$i]->author_name ?>
                                                        </small>
                                                        <small class="pull-right">
                                                            <?php echo $new_posts[$i]->created_time ?>
                                                        </small>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ol>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="panel-footer">
                        <a href="<?php echo base_url('forum'); ?>" class="btn btn-info btn-block">További témák <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
