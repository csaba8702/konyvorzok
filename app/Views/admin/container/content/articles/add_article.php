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
            <div class="col-sm-4">
                <h1>
                    Új cikk létrehozása
                </h1>
            </div>
            <div class="col-sm-6" style="margin-top: 1.75em;">
                <div class="pull-left">
                    <a href="<?php echo base_url('admin/tartalom/cikkek'); ?>" class="btn btn-primary">
                        <i class="fa fa-arrow-circle-left" style="margin-right: 5px !important;"></i> Mégse
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="#" id="add_article_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="article_title" class="control-label">Cím</label>
                        <input type="text" id="article_title" name="article_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="article_text" class="control-label">Cikk szövege</label>
                        <textarea id="article_text" name="article_text" class="form-control"></textarea>
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
