<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Date: 2018.02.17.
 * Time: 9:18
 */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <button class="btn btn-primary pull-left" id="add_new_post"><i class="fa fa-plus-circle" aria-hidden="true"></i> Új téma</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Panel 1</h4>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive topics">
                        <thead>
                            <tr>
                                <th>Állapot</th>
                                <th>Cím</th>
                                <th class="hidden-xs">Témaindító</th>
                                <th>Hozzászólások</th>
                                <th class="hidden-xs">Utolsó hozzászólás</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="closed-question"></i></td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td class="hidden-xs">TestUser</td>
                                <td>7</td>
                                <td class="hidden-xs">2018.02.17 - 11:27</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h5 class="panel-title">Sub-Panel 1</h5>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-responsive topics">
                                <thead>
                                <tr>
                                    <th>Állapot</th>
                                    <th>Cím</th>
                                    <th class="hidden-xs">Témaindító</th>
                                    <th>Hozzászólások</th>
                                    <th class="hidden-xs">Utolsó hozzászólás</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><i class="closed-question"></i></td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td class="hidden-xs">TestUser</td>
                                    <td>7</td>
                                    <td class="hidden-xs">2018.02.17 - 11:27</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Panel 1</h4>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive topics">
                        <thead>
                        <tr>
                            <th>Állapot</th>
                            <th>Cím</th>
                            <th class="hidden-xs">Témaindító</th>
                            <th>Hozzászólások</th>
                            <th class="hidden-xs">Utolsó hozzászólás</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><i class="open-question"></i></td>
                            <td>
                                <a href="<?php echo base_url('forum/tema/1/lorem-ipsum-dolor'); ?>">
                                    Lorem ipsum dolor sit amet 1
                                </a>
                            </td>
                            <td class="hidden-xs">TestUser</td>
                            <td>7</td>
                            <td class="hidden-xs">2018.02.17 - 11:27</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Panel 1</h4>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive topics">
                        <thead>
                        <tr>
                            <th>Állapot</th>
                            <th>Cím</th>
                            <th class="hidden-xs">Témaindító</th>
                            <th>Hozzászólások</th>
                            <th class="hidden-xs">Utolsó hozzászólás</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><i class="answered-question"></i></td>
                            <td>Lorem ipsum dolor sit amet</td>
                            <td class="hidden-xs">TestUser</td>
                            <td>7</td>
                            <td class="hidden-xs">2018.02.17 - 11:27</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 50px">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">TOP 3 Aktív téma</h4>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive topics">
                        <thead>
                            <tr>
                                <th>Állapot</th>
                                <th>Cím</th>
                                <th>Témaindító</th>
                                <th>Hozzászólások</th>
                                <th class="hidden-xs">Utolsó hozzászólás</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="answered-question"></i></td>
                                <td>Lorem ipsum dolor sit amet 1</td>
                                <td>TestUser</td>
                                <td>7</td>
                                <td class="hidden-xs">2018.02.17 - 11:27</td>
                            </tr>
                            <tr>
                                <td><i class="answered-question"></i></td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td>TestUser</td>
                                <td>7</td>
                                <td class="hidden-xs">2018.02.17 - 11:27</td>
                            </tr>
                            <tr>
                                <td><i class="answered-question"></i></td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td>TestUser</td>
                                <td>7</td>
                                <td class="hidden-xs">2018.02.17 - 11:27</td>
                            </tr>
                        </tbody>
                    </table>
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
                    <div class="alert" id="modal-message-text">...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary form-control" data-dismiss="modal" onclick="location.reload()">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
