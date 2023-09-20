<?php
include "tm_header.php";

$viewEn = $oms->select_audit_object();
$op = $oms->select_operational();
$viewch = $oms->view_ch($_SESSION['audit_type']);
$rl = $oms->select_risk_level();


if (isset($_POST['save'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->add_junction_table($_POST);
}
if (isset($_POST['op_area'])) {

    $saveReg = $oms->operational($_POST);
}
if (isset($_POST['submit'])) {
    $saveReg = $oms->audit_object($_POST);
}
if (isset($_POST['aod'])) {
    $saveReg = $oms->edit_audit_object($_POST);
}
if (isset($_POST['chk'])) {
    $savec = $oms->chk($_POST);
}
if (isset($_POST['delete'])) {
    $savec = $oms->del_audit_object($_POST);
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
            <h5 class="page-header">Audit Object</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">
                <div class="form-group">
                    <a href="audit_objectOld.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                    <label>Add Audit Object</label>
                    <input type="text" name="audit_object" class="form-control" required>
                    <?php
                    if (isset($saveReg['audit_object'])) {
                        echo $saveReg['audit_object'];
                    }
                    ?>
                </div>
                <input type="submit" name="submit" class="btn btn-info" value="submit" />
            </form>
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
                                <th>#</th>
                                <th>Audit Object</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Checklist</th>
                                <th>Auditable/Operational Area</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewEn) {
                                foreach ($viewEn as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['id']; ?></td>
                                        <td><?php echo $chValue['audit_object']; ?></td>
                                        <td><?php echo $chValue['Approval']; ?></td>
                                        
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-plus">Checklist</span></button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#editModal3<?php echo $chValue['id'] ?>">AuditableAreas</button>
                                            <a href="view_operational.php" class="btn btn-outline-success">View AuditableArea</a>&nbsp;
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

                                    <!-- Checklist Creation -->
                                    <div class="modal fade" id="editModal2<?php echo $chValue['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form method="post" action="#">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Checklist</h5>
                                            </div>

                                            <div class="modal-body">
                                            <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                <div class="form-group">
                                                            <label>AOID:</label><?php echo $chValue['id'] ?><br />
                                                            <label>AO Name:</label><?php echo $chValue['audit_object'] ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Audit Object ID:</label>
                                                                <input type="text" name="aoid" id="id" class="form-control" value="<?php echo $chValue['id'] ?>">
                                                                <?php
                                                            if (isset($saveReg['aoid'])) {
                                                                echo $saveReg['aoid'];
                                                            }
                                                            ?>
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
                                                        <textarea name="description" type="text" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Objectives</label>
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
                                                    <!-- <div class="form-group">
                                                        <label>Audit Approach</label>
                                                        <textarea name="audit_approach" type="text" class="form-control" id="editor1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Detail Audit Program</label>
                                                        <textarea name="detail" type="text" class="form-control" id="editor2"></textarea>
                                                    </div> -->

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
                                                <button type="submit" name="chk" class="btn btn-info" value="chk"><span class="glyphicon glyphicon-save"></span> Save</button>
                                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                            </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                <!-- Auditable/ Operational Area -->
                                <div class="modal fade" id="editModal3<?php echo $chValue['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form method="post" action="#">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Auditable/Operational Area</h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Audit Object ID:</label>
                                                                <input type="text" name="aoid" id="id" class="form-control" value="<?php echo $chValue['id'] ?>">
                                                                <?php
                                                            if (isset($saveReg['aoid'])) {
                                                                echo $saveReg['aoid'];
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Audit Object Name:</label>
                                                                <input type="text" name="audit_object" id="audit_object" class="form-control" value="<?php echo $chValue['audit_object'] ?>">
                                                                <?php
                                                            if (isset($saveReg['audit_object'])) {
                                                                echo $saveReg['audit_object'];
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Operational Areas</label>

                                                            <input type="text" name="Operational_area" class="form-control" required>
                                                            <?php
                                                            if (isset($saveReg['Operational_area'])) {
                                                                echo $saveReg['Operational_area'];
                                                            }
                                                            ?>
                                                        </div>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                            <div class="modal-footer">
                                                <button type="submit" name="op_area" class="btn btn-info" value="op_area"><span class="glyphicon glyphicon-save"></span> Save</button>
                                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                            </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                <!-- Edit Audit Object -->
                                <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Audit Objecct</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">

                                                        <div>
                                                            <h4><?php echo $chValue['id'] ?></h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Edit Audit Object</label>
                                                            <input type="text" name="audit_object" id="audit_object" class="form-control" value="<?php echo $chValue['audit_object'] ?>" placeholder="Edit Audit Object">

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="aod" class="btn btn-info" value="aod">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Operational Area</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">

                                                        <div>
                                                            <h4><?php echo $chValue['id'] ?></h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Edit Audit Object</label>
                                                            <input type="text" name="audit_object" id="audit_object" class="form-control" value="<?php echo $chValue['audit_object'] ?>" placeholder="Edit Audit Object">

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="aod" class="btn btn-info" value="aod">Update</button>
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