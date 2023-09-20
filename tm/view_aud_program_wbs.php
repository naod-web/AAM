<?php
include "tm_header.php";

$viewAuditwork = $oms->view_audit_program_wbsM($_SESSION['audit_type']);
$ap = $oms->select_ap();




// if (isset($_POST['aod'])) {
//     $saveReg = $oms->aod_audit_wbs($_POST);
// }

?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            <h5 class="page-header">Approved Audit Program List</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleV">
                        <thead>
                            <tr>
                                <th>Engagement ID</th>
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>
                                <th>Previous Audit</th>
                                <th>Total Working Date</th>
                                <!-- <th>Task Name</th> -->
                                <!-- <th>Start Date</th>
                                <th>End Date</th> -->
                                <th>AP-Status</th>
                                <th>View WBD Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditwork) {
                                foreach ($viewAuditwork as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['Objective']; ?></td>
                                        <td><?php echo $RegValue['Scope']; ?></td>
                                        <td><?php echo $RegValue['Status']; ?></td>
                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td><?php echo $RegValue['Approval']; ?></td>
                                        <?php
                                        Session::init();
                                        // Session::set("login", true);
                                        Session::set("Approval", $RegValue['Approval']);
                                        ?>
                                        <td>
                                        <form method="post" action="auth_wbd_detail.php">
                                            <input type="hidden" name="E_id" id="E_id" value="<?php echo $RegValue['E_id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn"><i class="fa fa-solid fa-binoculars"></i>View WBS</span></button>
                                        </form>
                                        </td>
                                    </tr>

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