<?php
include "header.php";

$viewAuditwork = $oms->view_audit_programTT($_SESSION['audit_type']);


?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <!-- <th>Audit program ID</th> -->
                                <th>EID</th>
                                <th>Auditee</th>
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>

                                <th>Previous Audit</th>

                                <th>Total Working Days</th>
                                <th>Status</th>
                                <!-- <th>Comment</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditwork) {
                                foreach ($viewAuditwork as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Objective']; ?></td>

                                        <td><?php echo $RegValue['Scope']; ?></td>

                                        <td><?php echo $RegValue['Status']; ?></td>

                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td><?php echo $RegValue['Approval']; ?></td>

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