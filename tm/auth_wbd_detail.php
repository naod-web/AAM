<?php
include "tm_header.php";

$viewau=null;
$E_id=null;
if (isset($_POST['E_id'])) {
    $E_id = $_POST['E_id'];
    $viewau= $oms->view_wbs_ByE_id($E_id);

    $viewen= $oms->view_engagementByE_id($E_id);


    // echo $viewen;

}
if (isset($_POST['update'])) {
 $st= $oms->updateWBDStatus($E_id);
}
if (isset($_POST['approval'])) {
    $st= $oms->ApprovalWBDStatus($E_id);
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
                <a href="view_aud_program_wbs.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                <a href="#" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
                <h5 class="page-header"><strong>View work Breakdown Detail</strong></h5>
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
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleAP">
                        <thead>
                            <tr>
                                <th>WBD ID</th>
                                <th>Operational Area</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <!-- <th>WBD Status</th> -->
                                <th>Approval Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewau) {
                                foreach ($viewau as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id'];?></td>
                                        <td><?php echo $RegValue['Operational_area']; ?></td>
                                        <td><?php echo $RegValue['S_date']; ?></td>
                                        <td><?php echo $RegValue['E_date']; ?></td>

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
                    
</div>

<?php
include "footer.php";
?>
