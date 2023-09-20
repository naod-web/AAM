<?php
include "u_header.php";
$viewAuditee_resp = $oms->view_auditee_response($_POST);
if (isset($_POST['edit'])) {
    $editch = $oms->edit_ar($_POST);
}
if (isset($_POST['submit'])) {

    $viewResp = $oms->edit_auditee_resp();
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
                                <!-- <th>Acceptance Status</th> -->
                                <th>Action</th>
                                <!-- <th>Auditee Response/Feedback</th> -->
                                <th>Attachment</th>
                                <!-- <th>Justify Against/ by:</th> -->
                                <!-- <th>Opinion Against Auditee Response</th> -->
                                
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
                                        
                                        <td><?php echo $RegValue['action']; ?></td>
                                        
                                        <td><?php echo $RegValue['name']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Justification</span></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $EmpValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button> -->
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Opition Against Auditee Response</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id']; ?>">
                                                        <?php
                                                        if (isset($saveAR['id'])) {
                                                            echo $saveAR['id'];
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label>Justification</label>
                                                            <input type="text" name="just" class="form-control" placeholder="Enter Justification">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Auditee</label>
                                                            <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>
                                                        </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        
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