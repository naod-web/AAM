<?php
include "tm_header.php";

$viewAuditwork = $oms->view_audit_program($_POST);

if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $viewAuditwork = $oms->approve_audit_program($_POST);
}
if (isset($_POST['delete'])) {

    $delch = $oms->del_audit_program();
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>



                                <th>Engagement ID</th>
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>
                                <th>Previous Audit</th>
                                <th>Total Working Days</th>
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
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['Objective']; ?></td>
                                        <td><?php echo $RegValue['Scope']; ?></td>
                                        <td><?php echo $RegValue['Status']; ?></td>
                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td><?php echo $RegValue['Approval']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"> Approve</button>

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
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ---------------edit----------- -->
                                    <div class="modal fade" id="editModal<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Approve Audit Program</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">
                        
                                                        <div class="form-group">
                                                            <label>Objective of Audit</label>
                                                            <input type="text" name="Objective" id="id" value="<?php echo $RegValue['Objective'] ?>" class="form-control" placeholder="Edit audit object">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Scope of Audit</label>
                                                            <input type="text" name="Scope" id="Scope" value="<?php echo $RegValue['Scope'] ?>" class="form-control" placeholder="Enter scope">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <input type="text" name="Status" id="Status" class="form-control" value="<?php echo $RegValue['Status'] ?>" placeholder="Enter Status">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Total working Days</label>
                                                            <input type="number" name="total" id="total" class="form-control" value="<?php echo $RegValue['total'] ?>" placeholder="Enter working days">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Approve</label>
                                                            <input type="text" name="Approval" id="Approval" value="<?php echo $RegValue['Approval'] ?>" class="form-control" placeholder="Enter Approval">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
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