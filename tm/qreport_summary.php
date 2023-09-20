<?php
include "tm_header.php";

// $auditee = $oms->select_auditee();
// $Quarter_number = $oms->select_quarter_number();
// $stid = $oms->select_month_year();
// $yr = $oms->select_plan_year();
// $audit_type = $oms->select_auditTypeq();
// $Team = $oms->select_team();
// $listAudit_select = $oms->select_auditee();
$viewM = $oms->view_rep_summary();
// $risk_lvl = $oms->select_risk_level();
// $risk_itm = $oms->select_risk_item();


?>


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header"></h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-sm-10">


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleAPL">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>INTRODUCTION DATE</th>
                                <th>METHODOLOGY</th>
                                <th>SCOPE</th>
                                <th>TECHNIQUE</th>
                                
                                <th>RECOMMENDATION</th>
                                <th>AUDITOR JUSTIFICATION</th>
                                <th>ACCEPTANCE STATUS</th>
                                <th>NAME</th>
                                <th>UDATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['date']; ?></td>
                                        <td><?php echo $RegValue['intro']; ?></td>
                                        <td><?php echo $RegValue['methodology']; ?></td>
                                        <td><?php echo $RegValue['scope']; ?></td>
                                        <td><?php echo $RegValue['technique']; ?></td>
                                        <td><?php echo $RegValue['recommendation']; ?></td>
                                        <td><?php echo $RegValue['auditor_justification']; ?></td>
                                        <td><?php echo $chValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $RegValue['name']; ?></td>
                                        <td><?php echo $RegValue['Date']; ?></td>
                                    </tr>
                                        <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal -->


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>

<?php
include "footer.php";
?>