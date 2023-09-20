<?php
include "header.php";

$viewEn = $oms->select_auditee();
$ap = $oms->select_ap();

if (isset($_POST['aod'])) {
    $saveReg = $oms->edit_auditee($_POST);
}
if (isset($_POST['delete'])) {
    $savec = $oms->del_auditee($_POST);
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
            <h5 class="page-header">Auditee</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-10">
        <a href="#" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
        <a href="auditee.php" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-auditee">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Auditee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewEn) {
                                foreach ($viewEn as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['auditee']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><i class="fa fa-solid fa-check"></i>Approval </button>
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

                                    <!-- Checklist Creation -->
                                    
                                <!-- Auditable/ Operational Area -->
                                
                                <!-- Edit Audit Object -->
                                <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update and Approval Audit Object</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">

                                                        <div>
                                                            <h4><?php echo $chValue['id'] ?></h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Edit Auditee</label>
                                                            <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" placeholder="Edit Auditee">

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
                                                        <button type="submit" name="aod" class="btn btn-info" value="aod"><i class="fa fa-solid fa-check"></i>Approve</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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