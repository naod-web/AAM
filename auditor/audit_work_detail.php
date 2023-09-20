<?php
include "aud_header.php";

$viewau=null;
if (isset($_POST['E_id'])) {
    $E_id = $_POST['E_id'];
    $viewau= $oms->view_audit_programByE_id($E_id);

    $viewen= $oms->view_engagementByE_id($E_id);
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
            <div class="col-sm-10">
                <a href="engagemnt.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                <a href="#" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
                <h5 class="page-header"><strong>View Engagement Detail</strong></h5>
                <div class="form-group">
                <?php
                            if ($viewen) {
                                foreach ($viewen as $RegValue) {
                            ?>
                            <div>
                     <label>Engagement ID:</label>
                        <?php echo $RegValue['id'] ?>
                                </div>
                                <div>
                        <label>Auditee:</label>
                        <?php echo $RegValue['auditee'] ?>
                                </div>
                                <div>
                        <label>Description:</label>
                        <?php echo $RegValue['Description'] ?>
                                </div>
                                <div>
                        <label>Assignment Date:</label>
                        <?php echo $RegValue['Assignment_date'] ?>
                                </div>
                                <div>
                        <label>Start Date:</label>
                        <?php echo $RegValue['S_date'] ?>
                                </div>
                                <div>
                        <label>End Date:</label>
                        <?php echo $RegValue['E_date'] ?>
                                </div>

                        <?php
                                }
                            }
                            ?>

                </div>
                
            </div>

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

                <div>

                
        </div>
<div>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleAPP">
                        <thead>
                            <tr>
                                <th>Audit Program ID</th>
                                <!-- <th>Engagement ID</th> -->
                                <!-- <th>Auditee</th> -->
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>
                                <th>Previous Audit</th>
                                <th>Total Working Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewau) {
                                foreach ($viewau as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['Objective']; ?></td>
                                        <td><?php echo $RegValue['Scope']; ?></td>
                                        <td><?php echo $RegValue['Status']; ?></td>
                                        <td><?php echo $RegValue['total']; ?></td>
                                        
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
</div>

<?php
include "footer.php";
?>
