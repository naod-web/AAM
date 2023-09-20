<?php
include "tm_header.php";

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
            <h4 class="page-header">Annual Plan List</h4>
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
                                <th>Auditee</th>
                                <th>Risk Level</th>
                                <th>Year</th>
                                <th>Audit Object</th>
                                <th>Auditable Area</th>
                                <th>Quarter Number</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['risk_level']; ?></td>
                                        <td><?php echo $RegValue['Year']; ?></td>
                                        <td><?php echo $RegValue['audit_object']; ?></td>
                                        <td><?php echo $RegValue['Operational_area']; ?></td>
                                        <td><?php echo $RegValue['Quarter_number']; ?></td>
                                        <td><?php echo $RegValue['s_id']; ?></td>
                                        <td><?php echo $RegValue['e_id']; ?></td>
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