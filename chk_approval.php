<?php
include "header.php";
$viewEn = $oms->view_chk();
$ap = $oms->select_ap();

if (isset($_POST['edit_op'])) {
    $saveReg = $oms->edit_chks($_POST);
}
if (isset($_POST['delete'])) {
    $saveReg = $oms->del_chks($_POST);
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
            <h5 class="page-header">Checklist Approval</h5>
            <a href="#" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
        </div>
        <!-- /.col-lg-12 -->
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
                            <th>Checklist ID</th>
                                <th>Audit Object ID</th>
                                <!-- <th>Audit Object Name</th> -->
                                <th>Operational Area</th>
                                <th>Description</th>
                                <th>Objective</th>
                                <th>Risk</th>
                                <th>Risk level</th>
                                <th>Expected Control</th>
                                <!-- <th>Approval</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewEn) {
                                foreach ($viewEn as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        
                                        <td><?php echo $chValue['id']; ?></td>
                                        <td><?php echo $chValue['aoid']; ?></td>
                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                        <td><?php echo $chValue['description']; ?></td>
                                        <td><?php echo $chValue['objective']; ?></td>
                                        <td><?php echo $chValue['risk']; ?></td>
                                        <td><?php echo $chValue['risk_level']; ?></td>
                                        <td><?php echo $chValue['expected_control']; ?></td>
                                        <td>
                                            
                                            <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal4<?php echo $chValue['id'] ?>"><i class="fa fa-solid fa-check"></i>Approval </button>
                                            
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
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
                                    <!-- Edit Auditable  Areas -->
                                    <div class="modal fade" id="editModal4<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update|Approve Checklist</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">
                                                        <div class="form-group">
                                                            <label>Operational Area</label>
                                                            <input type="text" name="Operational_area" id="Operational_area" class="form-control" value="<?php echo $chValue['Operational_area'] ?>" placeholder="Edit Operational area">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input type="text" name="description" id="description" class="form-control" value="<?php echo $chValue['description'] ?>" placeholder="Edit description">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Objective</label>
                                                            <input type="text" name="objective" id="objective" class="form-control" value="<?php echo $chValue['objective'] ?>" placeholder="Edit objective">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Risk</label>
                                                            <input type="text" name="risk" id="risk" class="form-control" value="<?php echo $chValue['risk'] ?>" placeholder="Edit risk">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Risk Level</label>;
                                                            <input type="text" name="risk_level" id="risk_level" class="form-control" value="<?php echo $chValue['risk_level'] ?>" placeholder="Edit risk level">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Expected Controls</label>
                                                            <input type="text" name="expected_control" id="expected_control" class="form-control" value="<?php echo $chValue['expected_control'] ?>" placeholder="Edit Expected control">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Approve</label>
                                                            <select name="Approval" class="form-control">
                                                                <option value="">--- Select ---</option>
                                                                <?php
                                                                if (isset($ap)) {
                                                                    foreach ($ap as $value) {
                                                                ?>
                                                                        <option value="<?php echo $value['Approval']; ?>"> <?php echo $value['Approval']; ?> </option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                            <?php
                                                            if (isset($saveM['Approval'])) {
                                                                echo $saveM['Approval'];
                                                            }
                                                            ?>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit_op" class="btn btn-info" value="edit_op">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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


<?php
include "footer.php";
?>