<?php
include "aud_header.php";
// $viewReg = $oms->view_wbs_cr($_SESSION['Shared_EId']);
// $viewReg = $oms->view_wbs_crA($_SESSION['audit_type']);
// $listAudit_select = $oms->select_auditee();
$viewM = $oms->select_aud_prog_wbs();
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
            <h5 class="page-header">Audit Program Breakdown List</h5>
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-examplebwbs">
                        <thead>
                            <tr>
                            <th>EID</th>
                                <th>Operational Area</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>WBD Status</th>
                                <th>Approval Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                    
                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['Operational_area']; ?></td>
                                        <td><?php echo $RegValue['S_date']; ?></td>
                                        <td><?php echo $RegValue['E_date']; ?></td>
                                        <td>
                                        <?php echo $RegValue['w_status']; ?>
                                        </td>
                                        <td>
                                        <?php echo $RegValue['A_status']; ?>
                                        </td>
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