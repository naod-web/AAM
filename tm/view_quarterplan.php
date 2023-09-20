<?php
include "tm_header.php";


//$listAudit_select = $oms->select_auditList();
$auditee = $oms->select_auditee();
$Quarter_number = $oms->select_quarter_number();
$audit_type = $oms->select_auditTypeq();
$a_id = $oms->select_annual_pid();
//$Team = $oms->select_team();
$viewQ = $oms->view_quarter();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveQ = $oms->quarter_tm_plan($_POST);
}

if (isset($_POST['edit'])) {
    $editch = $oms->edit_quarter_plan($_POST);
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
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Quarter Plan</button>
    <a href="audit_typeq.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Audit Type</a> &nbsp; &nbsp;
    <!-- <a href="auditee.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditee</a> -->
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
                                <th>Audit Type</th>
                                <!-- <th>Auditee</th> -->
                                <th>Quarter Number</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewQ) {
                                foreach ($viewQ as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['audit_type']; ?></td>
                                        <td><?php echo $RegValue['Quarter_number']; ?></td>
                                        <td>
                                            <!-- <button type="button" data-id="1" class="btn btn-default btn-view" data-toggle="modal" data-target="#myModal">View</button> -->

                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-eye-open">View</span></button>
                                            <button type="submit" class="btn btn-primary editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                        </td>


                                    </tr>

                                       <!-- View Modal for each Record -->
                                       <div class="modal fade" id="editModal2<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-file"></i>View record detail</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Audit type:</label><?php echo $RegValue['audit_type'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Quarter Number:</label><?php echo $RegValue['Quarter_number'] ?>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Update the records</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">

                                                            <div class="form-group">
                                                                <label>Quarter Number</label>
                                                                <input type="text" name="Quarter_number" id="Quarter_number" class="form-control" value="<?php echo $RegValue['Quarter_number'] ?>" placeholder="Edit Quarter number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Updated by:</label>
                                                                <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
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

                    <!-- Modal -->
					<!-- <div class="modal fade" id="qModal" tabindex="-1" role="dialog" aria-labelledby="qModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="qModalLabel">View Detail</h4>
								</div>
								<div id="qDetails" class="modal-body">
							
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div> -->

                    



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
                    <h5 class="modal-title">Quarter Plan</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
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