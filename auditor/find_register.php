<?php
include "aud_header.php";


$viewfR = $oms->view_findR();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->reg_finding($_POST);
}

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h4 class="page-header">Finding Registration</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create Finding Registration</button>
    <div class="row">
        <div class="col-sm-10">


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>



                                <th>Condition</th>
                                <th>Existing Internal Control</th>
                                <th>Cause</th>
                                <th>Effect</th>
                                <th>Recommendation</th>
                                <th>Rectification</th>




                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewfR) {
                                foreach ($viewfR as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['Condtion']; ?></td>
                                        <td><?php echo $chValue['Control']; ?></td>
                                        <td><?php echo $chValue['Cause']; ?></td>
                                        <td><?php echo $chValue['Effect']; ?></td>
                                        <td><?php echo $chValue['Recommendation']; ?></td>
                                        <td><?php echo $chValue['Rect']; ?></td>
                                    </tr>



                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>



<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h3 class="modal-title">Register Finding</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Condition</label>
                            <input type="text" name="Condtion" class="form-control" required>
                            <?php
                            if (isset($saveReg['Condtion'])) {
                                echo $saveReg['Condtion'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Existing Internal Control</label>
                            <textarea name="Control" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveReg['Control'])) {
                                echo $saveReg['Control'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Cause</label>
                            <!-- <input type="text" name="Cause" class="form-control" rows="3"> -->
                            <textarea name="Cause" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveReg['Cause'])) {
                                echo $saveReg['Cause'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Effect</label>
                            <!-- <input type="text" name="Effect" class="form-control" rows="3"> -->
                            <textarea name="Effect" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveReg['Effect'])) {
                                echo $saveReg['Effect'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Recommendation</label>
                            <!-- <input type="text" name="Recommendation" class="form-control" rows="3"> -->
                            <textarea name="Recommendation" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveReg['Recommendation'])) {
                                echo $saveReg['Recommendation'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Rectification</label>
                            <!-- <input type="text" name="Recommendation" class="form-control" rows="3"> -->
                            <textarea name="Rect" class="form-control"></textarea>
                            <?php
                            if (isset($saveReg['Rect'])) {
                                echo $saveReg['Rect'];
                            }
                            ?>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-info" value="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>