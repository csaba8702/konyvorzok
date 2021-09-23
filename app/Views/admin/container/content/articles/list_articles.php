<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 12:19
 */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-2">
                <h1>
                    Cikkek
                </h1>
            </div>
            <div class="col-sm-10" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/tartalom/cikkek/uj'); ?>" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true" style="margin: 2px;"></i> Új cikk</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="admin_list_articles" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="admin_list_articles_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="admin_list_articles" rowspan="1" colspan="1" aria-sort="ascending">Cím</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="admin_list_articles" rowspan="1" colspan="1" aria-sort="ascending">Publikálva</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="admin_list_articles" rowspan="1" colspan="1" aria-sort="ascending">Szerző</th>
                                    <th rowspan="1" colspan="1">Műveletek</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach ($all_articles as $article): ?>
                                    <tr>
                                        <td><?php echo $article['title']; ?></td>
                                        <td><?php echo $article['publish_time']; ?></td>
                                        <td><?php echo $article['author']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('cikkek/'.$article['id'].'/'.$article['slug']); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true" style="margin-right: 3px"></i>Megnyitás</a>
                                                <a href="<?php echo base_url('admin/tartalom/cikkek/szerkesztes/'.$article['id']); ?>" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true" style="margin-right: 3px"></i>Szerkesztés</a>
                                                <button class="btn btn-danger delete-this-article" data-article-id="<?php echo $article['id'] ?>"><i class="fa fa-trash" aria-hidden="true" style="margin-right: 3px"></i>Törlés</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                                <tfoot>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Cím</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Publikálva</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="admin_list_news" rowspan="1" colspan="1" aria-sort="ascending">Szerző</th>
                                    <th rowspan="1" colspan="1">Műveletek</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-danger fade" id="modal-delete-article" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cikk törlése</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true" style="margin-right: 3px"></i>Mégse
                        </button>
                        <button type="button" class="btn btn-outline" id="delete_article" data-dismiss="modal">
                            <i class="fa fa-trash" aria-hidden="true"></i>Törlés
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- Modal -->
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
