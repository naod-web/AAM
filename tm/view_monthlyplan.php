<?php
include "tm_header.php";



$viewM = $oms->view_monthly();
$qpid = $oms->select_quarter_plan();
$stid = $oms->select_month_year();
// $q_id = $oms->select_quarter_plan();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveM = $oms->monthly_tm_plan($_POST);
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
            <h4 class="page-header">Monthly Plan</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create New Plan</button>
    <!-- <a href="audit_activities.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Audit Type</a> &nbsp; &nbsp;
    <a href="auditee.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditee</a> -->
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
                                <th>Quarter Plan ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['q_id']; ?></td>
                                        <td><?php echo $RegValue['s_id']; ?></td>
                                        <td><?php echo $RegValue['e_id']; ?></td>
                                        <td>
                                            <!-- <button type="button" data-id="1" class="btn btn-default btn-view" data-toggle="modal" data-target="#myModal">View</button> -->
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-eye-open"></span>View </button>
                                        </td>
                                    </tr>
                                <!-- View record detail -->
                                <div class="modal fade" id="editModal2<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2"><i class="glyphicon glyphicon-file"></i>View Record Detail</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            
                                                            

                                                            <div class="form-group">
                                                                <label>Audit Object:</label><?php echo $RegValue['q_id'] ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Risk Item:</label><?php echo $RegValue['s_id'] ?>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <!-- <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button> -->
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                    <h5 class="modal-title">Add New Monthly Plan</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Quarter Plan ID</label>
                            <select name="q_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($qpid)) {
                                    foreach ($qpid as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['id']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['q_id'])) {
                                echo $saveM['q_id'];
                            }
                            ?>
                        </div>

                        <!-- <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="Start_date" class="form-control" placeholder="mm-dd-yyyy">
                        </div> -->
                        <div class="form-group">
                            <label>Start Day/month of the year</label>
                            <select name="s_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($stid)) {
                                    foreach ($stid as $value) {
                                ?>
                                        <option value="<?php echo $value['s_id']; ?>"> <?php echo $value['m_name']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['s_id'])) {
                                echo $saveM['s_id'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>End Day/month of the year</label>
                            <select name="e_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($stid)) {
                                    foreach ($stid as $value) {
                                ?>
                                        <option value="<?php echo $value['s_id']; ?>"> <?php echo $value['m_name']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['e_id'])) {
                                echo $saveM['e_id'];
                            }
                            ?>
                        </div>

                        <!-- <div class="form-group">
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