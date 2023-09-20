<?php
include "aud_header.php";
$viewAuditee_resp = $oms->view_auditee_response($_POST);
if (isset($_POST['edit'])) {
    $editch = $oms->edit_ar($_POST);
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
            <h4 class="page-header">Auditee Response</h4>
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
                                <th>ID</th>
                                <th>Auditee</th>
                                <th>Acceptance Status</th>
                                <th>Action</th>
                                <th>Response</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditee_resp) {
                                foreach ($viewAuditee_resp as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $RegValue['action']; ?></td>
                                        <td><?php echo $RegValue['Resp']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><i class="fa fa-solid fa-plus"></i>&nbsp; More</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Justification Against Auditee Response</h4>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">

                                                            <div class="form-group">
                                                                <label>Justification</label>
                                                                <input type="text" name="just" id="just" class="form-control" value="<?php echo $RegValue['just'] ?>" placeholder="Enter justification">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditor Name</label>
                                                                <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                            <button type="submit" name="edit" class="btn btn-info" value="edit">Ok</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                                        </div>
                                                    </form>
                                                </div>
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