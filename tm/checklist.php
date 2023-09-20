<?php
include "tm_header.php";

$op = $oms->select_operational();
$viewch = $oms->view_ch($_SESSION['audit_type']);
$rl = $oms->select_risk_level();
// $E_id = $oms->select_engagement_id();

if (isset($_POST['submit'])) {
    $savec = $oms->chk($_POST);
}
if (isset($_POST['edit'])) {
    $editch = $oms->edit_chk($_POST);
}
if (isset($_POST['delete'])) {

    $delch = $oms->del_chk();
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

            <h4 class="page-header">Checklist</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-   target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create Checklist</button> -->
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


                                <!-- <th>Engagement ID</th> -->
                                <th>#AOID</th>
                                <th>Area to Apply</th>
                                <th>Description</th>
                                <th>Objectives</th>
                                <th>Risks</th>
                                <th>Risk Level</th>
                                <th>Expected Control</th>
                                <th>Approval</th>
                                <!-- <th>Audit Approach</th>
                                <th>Detail</th> -->
                                <th>Operation</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $chValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $chValue['aoid']; ?></td>
                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                        <td><?php echo $chValue['description']; ?></td>
                                        <td><?php echo $chValue['objective']; ?></td>
                                        <td><?php echo $chValue['risk']; ?></td>
                                        <td><?php echo $chValue['risk_level']; ?></td>
                                        <td><?php echo $chValue['expected_control']; ?></td>
                                        <td><?php echo $chValue['Approval']; ?></td>
                                        
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>

                                        </td>
                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $chValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $chValue['id'] ?>">

                                                        <h4> Are You sure to delete this content!!</h4>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Checklist Value</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">

                                                            <div class="form-group">
                                                                <h3><?php echo $chValue['aoid'] ?></h3>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Audit Object ID</label>
                                                                <input type="text" name="aoid" id="aoid" class="form-control" value="<?php echo $chValue['aoid'] ?>">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Areas to Apply</label>
                                                                <input type="text" name="Operational_area" id="Operational_area" class="form-control" value="<?php echo $chValue['Operational_area'] ?>" placeholder="Enter checklist number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input type="text" name="description" id="description" class="form-control" value="<?php echo $chValue['description'] ?>" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Objectives</label>
                                                                <input type="text" name="objective" id="objective" class="form-control" value="<?php echo $chValue['objective'] ?>" placeholder="Enter Objectives">

                                                            </div>
                                                            <div class=" form-group">
                                                                <label>Risks</label>
                                                                <input type="text" name="risk" id="risk" class="form-control" value="<?php echo $chValue['risk'] ?>" placeholder="Enter risk">

                                                            </div>
                                                            <div class=" form-group">
                                                                <label>Risk Level</label>
                                                                <input type="text" name="risk_level" id="risk_level" class="form-control" value="<?php echo $chValue['risk_level'] ?>" placeholder="Enter risk level">

                                                            </div>

                                                            <div class=" form-group">
                                                                <label>Expected Control</label>
                                                                <input type="text" name="expected_control" id="expected_control" class="form-control" value="<?php echo $chValue['expected_control'] ?>" placeholder="Enter Enter Expected Control">

                                                            </div>

                                                            <!-- <div class="form-group">
                                                                <label>Audit Approach</label>
                                                                <input type="text" name="audit_approach" class="form-control" value="<?php echo $chValue['audit_approach'] ?>" placeholder="Enter Audit Approach">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Detail Audit Program</label>
                                                                <input type="text" name="detail" class="form-control" value="<?php echo $chValue['detail'] ?>" placeholder="Enter Detail">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Amend by:</label>
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
                    <h5 class="modal-title">Checklist</h5>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <label>Checklist Number</label>
                            <input type="number" name="checklist_number" class="form-control" placeholder="Enter checklist number">

                        </div>
                        <div class="form-group">
                            <label>Areas to Apply</label>
                            <select name="Operational_area" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($op)) {
                                    foreach ($op as $value) {
                                ?>
                                        <option value="<?php echo $value['Operational_area']; ?>"> <?php echo $value['Operational_area']; ?> </option>
                                <?php }
                                } ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <!-- <input type="text" name="description" class="form-control" placeholder="Description"> -->
                            <textarea name="description" type="text" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Objectives</label>
                            <!-- <input type="text" name="objective" class="form-control" placeholder="Objective"> -->
                            <textarea name="objective" type="text" class="form-control"></textarea>

                        </div>

                        <div class="form-group">
                            <label>Risks</label>
                            <input type="text" name="risk" class="form-control" placeholder="Risks">

                        </div>

                        <div class="form-group">
                            <label>Risk Level</label>
                            <select name="risk_level" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($rl)) {
                                    foreach ($rl as $value) {
                                ?>
                                        <option value="<?php echo $value['risk_level']; ?>"> <?php echo $value['risk_level']; ?> </option>
                                <?php }
                                } ?>
                            </select>

                        </div>
                        <!-- <div class="form-group">
                            <label>Expected Control</label>
                            <textarea name="expected_control" type="text" class="form-control" id="expected_control" placeholder="Enter expected control"></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Expected Control</label>
                            <textarea name="expected_control" type="text" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Audit Approach</label>
                            <textarea name="audit_approach" type="text" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Detail Audit Program</label>
                            <textarea name="detail" type="text" class="form-control" ></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label>Audit Approach</label>
                            <textarea name="audit_approach" type="text" class="form-control" id="audit_approach" placeholder="Enter audit approach"></textarea>
                        </div> -->
                        <!-- <div class="form-group">
                            <label>Detail Audit Program</label>
                            <textarea name="detail" type="text" class="form-control" id="detail"></textarea>
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