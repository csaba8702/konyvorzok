<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
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
    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 40px">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    if(isset($post)):
                        $logged_in = $aauth->is_loggedin();
                        $my_post = null;
                        if($logged_in) {
                            $my_post = ($post->author_id == $_SESSION['id']);

                            $is_admin = $aauth->is_member("Admin",$_SESSION['id']);
                            $is_moderator = $aauth->is_member("Moderator",$_SESSION['id']);
                        }

                        $solution_exists = isset($solution);


                        if($post->moderated == true): ?>
                            <div class="alert alert-danger text-center">
                                <h4><strong>MODERÁLVA!</strong></h4>
                                <p><?php echo $post->moderation_msg; ?></p>
                            </div>
                        <?php
                        endif; ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php echo $post->title ?>
                                <small class="pull-right hidden-xs">
                                    <a href="<?php echo base_url('felhasznalok/profil/'.$post->author_id.'/'.$post->author_name ); ?>"><?php echo $post->author_name ?></a> / <?php echo $post->created_time ?>
                                </small>
                            </h4>
                        </div>
                        <div class="panel-body post_text">
                            <?php echo $post->content ?>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary pull-left send_answer_btn" data-answer_topic_id="<?php echo $post->id ?>" data-topic_slug="<?php echo $post->slug ?>" <?php echo isset($_SESSION['username']) ? "" : "disabled"; ?>>
                                <i class="fa fa-reply" aria-hidden="true"></i> Válasz
                            </button>
                            <div class="btn-group pull-right">
                                <?php if($my_post): ?>
                                    <button class="btn btn-5x btn-danger delete_my_topic_modal" data-post_id="<?php echo $post->id; ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Törlés
                                    </button>
                                <?php endif; ?>
								<button class="btn btn-5x btn-warning subscribe-post" data-post_id="<?php echo $post->id; ?>" <?php echo isset($_SESSION['username']) ? "" : "disabled"; ?>>
									<i class="fa fa-trash" aria-hidden="true"></i>
									<?php if($subscribe){ ?>
									<span class="subscribe-post-btn">Leiratkozás</span>
									<?php }else{ ?>
									<span class="subscribe-post-btn">Feliratkozás</span>
									<?php } ?>
								</button>
                                <?php if(!$hide_prepared): ?>
                                <button class="btn btn-danger show-topic-report-modal" data-topic_id="<?php echo $post->id ?>" data-topic_slug="<?php echo $post->slug ?>">
                                    <i class="report-item"></i> Jelentés
                                </button>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php endif;
                    ?>
                </div>

                <div class="panel-footer">
                    <div class="panel panel-success">
                        <div class="panel-heading accept-answer-heading">
                            <h4 class="text-center">Megoldás</h4>
                        </div>
                        <div class="panel-body">
                            <?php
                            if(isset($solution)): ?>
                                <div class="panel panel-success answer-panel">
                                    <div class="panel-heading answer-heading">
                                        <span><?php echo "#" . $solution->order_num . " " . $solution->username . " " . $solution->comment_send_time; ?></span>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $solution->comment_text; ?>
                                    </div>
                                    <div class="panel-footer">
                                        <?php if($my_post && $solution_exists): ?>
                                        <button class="btn btn-warning pull-left" id="not_the_solution" data-comment_id="<?php echo $solution->id ?>" data-topic_id="<?php echo $post->id; ?>" data-topic_slug="<?php echo $post->slug; ?>">
                                            <i class="closed-question"></i> Mégsem ez a megoldás
                                        </button>
                                        <?php endif; ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <?php
                            else:
                            ?>
                                <h4 class="text-center"><small>Még nincs elfogadott megoldás.</small></h4>
                            <?php
                            endif;
                            ?>

                        </div>
                    </div>
					
					<!--PAGINATION-->
					
					<ul class="pagination">
						<?php for ($i = 0; $i <= $pages; $i++) { $j = $i; $j++; if($i == $page){?>
						<li class="page-item active">
							<a class="page-link" href="<?php echo base_url('forum/tema/'.$post->id.'/'.$post->slug.'/'.$j); ?>"><?php echo $i+1 ?></a>
						</li>
						<?php }else{ ?>
						<li class="page-item">
							<a class="page-link" href="<?php echo base_url('forum/tema/'.$post->id.'/'.$post->slug.'/'.$j); ?>"><?php echo $i+1 ?></a>
						</li>
						<?php }} ?>
					</ul>
					
                    <?php

                    if(isset($comments)):
                    foreach ($comments as $comment): ?>
                        <div class="panel panel-info answer-panel">
                            <div class="panel-heading answer-heading">
                                <span id="<?php echo $comment->id; ?>"><?php echo "#" . $comment->order_num . " " . $comment->username . " " . $comment->created_time; ?></span>
                            </div>
                            <div class="panel-body">
                                <?php echo $comment->comment_text; ?>
                            </div>
                            <div class="panel-footer">
                                <?php
                                $logged_in = $aauth->is_loggedin();
                                $my_comment = null;
                                if($logged_in){
                                    $my_comment = ($comment->author_id == $_SESSION['id']);
                                }

                                $solution_exists = isset($solution);
                                $is_solution = null;
                                if($solution_exists){
                                    /* ha a megoldás ($solution) comment_id attribútuma megegyezik a hozzászólás ($comment) azonosítójával,
                                    * akkor az aktuális hozzászólás a megoldás
                                    *  */
                                    $is_solution = ( $solution->comment_id == $comment->id );
                                }


                                /* Törölt hozzászólás illetve saját hozzászólás esetén, továbbá nem saját téma esetén
                                * az "Elfogadás megoldásként" gomb nem látható!
                                *  */
                                $save_solution_btn_hide = (
                                   (bool)$comment->deleted || !$my_post || $my_comment
                                );

                                /*
                                 * A "Törlés" gomb csak bejelentkezve, saját, nem törölt hozzászólások esetén látható
                                 * */
                                $delete_comment_btn_hide = !$logged_in || !$my_comment || (bool)$comment->deleted;


                                $report_comment_btn_hide = (
                                        !$logged_in || $my_comment || $comment->deleted
                                );


                                //echo "<pre>" . var_dump(!$logged_in || !$my_comment || (bool)$comment->deleted) . "</pre>";
                                //echo "<pre>" . var_dump($save_solution_btn_hide) . "</pre>";


                                if($is_solution ): ?>
                                    <button class="btn btn-success pull-left disabled" disabled>
                                        <i class="answered-question"></i> Elfogadva megoldásként
                                    </button>
                                <?php endif; ?>

                                <?php if( !$save_solution_btn_hide && !$is_solution ): ?>
                                    <button
                                            class="btn btn-success pull-left accept_as_solution <?php echo $solution_exists ? "disabled" : ""; ?>"
                                            data-comment_id="<?php echo $comment->id; ?>"
                                            data-topic_id="<?php echo $post->id; ?>"
                                            data-topic_slug="<?php echo $post->slug; ?>"
                                            <?php echo $solution_exists ? "disabled=ˇ\"disabled\"" : ""; ?>
                                    >
                                        <i class="answered-question"></i> Elfogadás megoldásként
                                    </button>
                                <?php endif;
                                ?>
                                <div class="btn-group pull-right">
                                    <?php if(!$delete_comment_btn_hide): ?>
                                    <button class="btn btn-5x btn-danger delete_comment" <?php echo $delete_comment_btn_hide ? " style\:visibility\:hidden\;" : ""; ?> data-comment_id="<?php echo $comment->id; ?>" data-topic-id="<?php echo $post->id; ?>" data-topic_slug="<?php echo $post->slug; ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Törlés
                                    </button>
                                    <?php endif; ?>

                                    <?php if(!$report_comment_btn_hide && !$hide_prepared): ?>
                                        <button class="btn btn-danger show-answer-report-modal" data-topic_id="<?php echo $post->id; ?>" data-comment_id="<?php echo $comment->id; ?>">
                                            <i class="report-item"></i> Jelentés
                                        </button>
                                    <?php endif; ?>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    <?php
                    endforeach;
                    endif;
                    ?>
                </div>
            </div>

            <!-- Modal - Téma jelentése -->
            <div class="modal fade" id="report-topic-modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Téma jelentése</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger">
                                <h4>Biztosan jelenteni szeretné ezt a bejegyzést?</h4>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-danger" id="report-topic-now" data-dismiss="modal">Jelentés</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal - Hozzászólás jelentése -->
            <div class="modal fade" id="report-answer-modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Válasz jelentése</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger text-center">
                                Biztosan jelenteni szeretné ezt a hozzászólást?
                            </div>
                            <input type="hidden" id="topic_id" title="" value="<?php echo $post->id ?>">
                            <input type="hidden" id="comment_num" title="" value="154">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-danger" id="report-comment-now" data-dismiss="modal">Jelentés</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal - Hozzászólás beküldés -->
            <div class="modal fade" id="send_answer_modal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Válasz beküldése</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('forum/valasz-mentese'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <label for="answer-body">Válasz</label>
                                <textarea id="answer-body" rows="10" cols="150" class="form-control"></textarea>
                                <input type="hidden" id="answer_topic_id" value="<?php echo $post->id; ?>">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Mégse</button>
                            <button type="button" class="btn btn-primary" id="save_answer_btn" data-dismiss="modal">Küldés</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal - Rendszer üzenet -->
            <div class="modal fade" id="message-modal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="alert text-center" id="modal-message-text">...</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary form-control" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
