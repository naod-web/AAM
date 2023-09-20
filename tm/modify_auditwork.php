<?php
include "tm_header.php";

$viewAuditwork = $oms->view_audit_programM();
$ap = $oms->select_ap();

if (isset($_POST['submit'])) {
    $viewAuditwork = $oms->edit_audit_prog_engage($_POST);
}
if (isset($_POST['approv'])) {
    $viewAuditwork = $oms->approve_audit_prog($_POST);
}
if (isset($_POST['delete'])) {

    $delch = $oms->del_audit_prog_engagement();
}
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            <h5 class="page-header">Approve Audit Program</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#EID</th>
                                <th>#APID</th>
                                <th>Auditee</th>
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>
                                <th>Previous Audit</th>
                                <th>Total Working Date</th>
                                <th>View WBD</th>
                                <th>Approval</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditwork) {
                                foreach ($viewAuditwork as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['E_id']; ?></td>

                                        <td><?php echo $RegValue['id']; ?></td>

                                        <td><?php echo $RegValue['auditee']; ?></td>

                                        <td><?php echo $RegValue['Objective']; ?></td>

                                        <td><?php echo $RegValue['Scope']; ?></td>

                                        <td><?php echo $RegValue['Status']; ?></td>

                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td>
                                        <form method="post" action="../auditor/wbd_detail.php">
                                            <input type="hidden" name="E_id" id="E_id" value="<?php echo $RegValue['E_id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn"><i class="fa fa-solid fa-binoculars"></i>View WBS</span></button>
                                        </form>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal2<?php echo $RegValue['id'] ?>"><i class="fa fa-solid fa-check"></i>Approval </button>
                                        </td>
                                        
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $RegValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $RegValue['id'] ?>">

                                                        <h4> Are You sure to delete this content!!</h4>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ---------------------edit modal-------------------- -->
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modify and Update Audit Program</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">

                                                        <div class="form-group">
                                                            <label>Engagement ID</label>
                                                            <input type="text" name="E_id" id="Objectives" class="form-control" value="<?php echo $RegValue['E_id'] ?>" placeholder="Enter Engagement Unique value" readonly="readonly">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Objective Audit</label>
                                                            <input type="text" name="Objective" id="Objective" class="form-control" value="<?php echo $RegValue['Objective'] ?>" placeholder="Enter Audit Objective">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Scope</label>
                                                            <input type="text" name="Scope" id="Scope" class="form-control" value="<?php echo $RegValue['Scope'] ?>" placeholder="Enter Audit Scope">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Previous Audit Status</label>
                                                            <input type="text" name="Status" id="Status" value="<?php echo $RegValue['Status'] ?>" class="form-control" placeholder="Enter Previous Audit Status">

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Total Working Days</label>
                                                            <input type="text" name="total" id="total" value="<?php echo $RegValue['total'] ?>" class="form-control" placeholder="Total Working Days">

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ---------------------Approve modal-------------------- -->
                                    <div class="modal fade" id="editModal2<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Approve Audit Program</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">
                                                        <input type="hidden" name="nm" id="nm" value="<?php echo $RegValue['nm'] ?>">
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

                                                        <button type="submit" name="approv" class="btn btn-info" value="approv"><i class="fa fa-solid fa-check"></i>Approve</button>
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>