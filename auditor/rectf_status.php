<?php
include "aud_header.php";
$viewAuditee_resp = $oms->view_rectificationR($_SESSION['name']);
$ap = $oms->select_ap();
if (isset($_POST['submit'])) {
    $saveReg = $oms->approve_rect($_POST);
}

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAR['su'])) {
                echo $saveAR['su'];
            }
            ?>
            <h4 class="page-header">Rectification Status</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- <div>
                    <input type="text" id="filter" name="filter" autofocus="true" placeholder="Filter by keyword" />

                    <input type="submit" id="btnFilter" name="btnFilter" value="Go" />

                    <input type="submit" id="btnClear" name="btnClear" value="clearBtn" />
                </div> -->
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>

                                <th>EID</th>
                                <th>Auditee</th>
                                <th>Rectification Status</th>
                                <th>Action</th>
                                <th>Auditee Response/Feedback</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditee_resp) {
                                foreach ($viewAuditee_resp as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $RegValue['action']; ?></td>
                                        <td><?php echo $RegValue['rectification']; ?></td>
                                        <td>
                                            
                                        <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Approval</span></button>
                                        </td>
                                    </tr>
                                    
                                <!-- Approval Page -->
                                <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update|Approval Operational Area</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">

                                                        <div>
                                                            <h4><?php echo $RegValue['id'] ?></h4>
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
                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Approve</button>
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