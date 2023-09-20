<?php
include "tm_header.php";


//$listAudit_select = $oms->select_auditList();
$auditee = $oms->select_auditee();
$Quarter_number = $oms->select_quarter_number();
$audit_typeq = $oms->select_auditTypeq();
$a_id = $oms->select_annual_pid();
//$Team = $oms->select_team();
$viewQ = $oms->view_quarter();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveQ = $oms->quarter_tm_plan($_POST);
}
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header">Quarter Plan</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create New Plan</button>
    <a href="audit_typeq.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Audit Type</a> &nbsp; &nbsp;
    <a href="auditee.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditee</a>
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Annual Plan Id</th>
                                <th>Audit Type</th>
                                <th>Auditee</th>
                                <th>Quarter Number</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewQ) {
                                foreach ($viewQ as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['a_id']; ?></td>
                                        <td><?php echo $RegValue['audit_type']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Quarter_number']; ?></td>


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
                    <h3 class="modal-title">Add New Quarter Plan</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Annual Plan ID</label>
                            <select name="a_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($a_id)) {
                                    foreach ($a_id as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['id']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['a_id'])) {
                                echo $saveM['a_id'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Audit Type</label>
                            <select name="audit_type" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($audit_type)) {
                                    foreach ($audit_type as $value) {
                                ?>
                                        <option value="<?php echo $value['audit_type']; ?>"> <?php echo $value['audit_type']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['audit_type'])) {
                                echo $saveM['audit_type'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Auditee</label>
                            <select name="auditee" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($auditee)) {
                                    foreach ($auditee as $value) {
                                ?>
                                        <option value="<?php echo $value['auditee']; ?>"> <?php echo $value['auditee']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['auditee'])) {
                                echo $saveM['auditee'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Quarter Number</label>
                            <select name="Quarter_number" class="form-control">
                                <option value="">--- Enter Quarter Number ---</option>
                                <?php
                                if (isset($Quarter_number)) {
                                    foreach ($Quarter_number as $value) {
                                ?>
                                        <option value="<?php echo $value['Quarter_number']; ?>"> <?php echo $value['Quarter_number']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Quarter_number'])) {
                                echo $saveM['Quarter_number'];
                            }
                            ?>
                        </div>

                        <!-- <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="Start_date" class="form-control" placeholder="mm-dd-yyyy">
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" name="End_date" class="form-control" placeholder="mm-dd-yyyy">
                        </div> -->
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