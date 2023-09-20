<?php
include "aud_header.php";

$auditee = $oms->select_auditee();
$Quarter_number = $oms->select_quarter_number();
$stid = $oms->select_month_year();
$yr = $oms->select_plan_year();
$audit_type = $oms->select_auditTypeq();
// $Team = $oms->select_team();
// $listAudit_select = $oms->select_auditee();
$viewM = $oms->view_annual($_SESSION['audit_type']);
$risk_lvl = $oms->select_risk_level();
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
            <h4 class="page-header">List Finding</h4>
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
                                <th>Engagement ID</th>
                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <th>Fact</th>
                                <th>Description</th>
                                <th>Criteria</th>
                                <th>cause</th>
                                <th>effect</th>
                                <th>Internal_control</th>
                                <th>Recommendation</th>
                                <th>Auditor Justification/ Conclusion</th>
                                <!-- <td>Auditee Response</td> -->
                                <!-- <th>Attachment</th> -->
                                <th>Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                    <td><?php echo $RegValue['E_id']; ?></td>
                                    <td><?php echo $RegValue['auditee']; ?></td>
                                    <td><?php echo $RegValue['Operational_area']; ?></td>
                                    <td><?php echo $RegValue['Facts']; ?></td>
                                    <td><?php echo $RegValue['Description']; ?></td>
                                    <td><?php echo $RegValue['criteria']; ?></td>
                                    <td><?php echo $RegValue['cause']; ?></td>
                                    <td><?php echo $RegValue['effect']; ?></td>
                                    <td><?php echo $RegValue['Internal_control']; ?></td>
                                    <td><?php echo $RegValue['recommendation']; ?></td>
                                    <td><?php echo $RegValue['auditor_justification']; ?></td>
                                    <td><?php echo $RegValue['Resp']; ?></td>
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