<?php
include "aud_header.php";

$viewM = $oms->view_Detail($_SESSION['audit_type']);

?>


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header">View Finding With Detail</h5>
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleFR">
                        <thead>
                            <tr>
                                <td>#EID</td>
                                <!-- <td>Audit type</td> -->
                                <td>Auditee</td>
                                <td>Operational Area</td>
                                <!-- <td>Finding Number</td> -->
                                <td>Facts</td>
                                <td>Description</td>
                                <td>Citeria</td>
                                <td>Cause</td>
                                <td>Effect</td>
                                <td>Internal Control</td>
                                <td>Recommendation</td>
                                <td>Irregularity Description</td>
                                <td>Loss Amount</td>
                                <!-- <td>Acceptance_Status</td> -->
                                <!-- <td>Auditor Justification/ Conclusion</td> -->
                                <td>Done by</td>
                                <!-- <td>Attachment</td> -->
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
                                        <td><?php echo $RegValue['Irregularity_description']; ?></td>
                                        <td><?php echo $RegValue['Loss_amount']; ?></td>
                                        <td><?php echo $RegValue['name']; ?></td>
                                        <!-- <td><?php echo $RegValue['Location']; ?></td> -->
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