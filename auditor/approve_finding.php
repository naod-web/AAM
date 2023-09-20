<?php
include 'aud_header.php';

$viewch = $oms->view_af();

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h4 class="page-header">Approved Audit Finding Registration</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create Checklist</button> -->
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>



                                <th>Engagement ID</th>
                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <th>Finding Number</th>
                                <th>Facts</th>
                                <th>Description</th>
                                <!-- <th>Criteria</th>
                                <th>Cause</th>
                                <th>Effect</th> -->
                                <th>Internal Control</th>
                                <th>Recommendation</th>

                                <th>Auditors Conclusion</th>
                                <th>Acceptance Status</th>
                                <th>Auditor Name</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Approval</th>

                                <!-- <th>Operation</th> -->


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $chValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $chValue['E_id']; ?></td>
                                        <td><?php echo $chValue['auditee']; ?></td>
                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                        <td><?php echo $chValue['Finding_number']; ?></td>
                                        <td><?php echo $chValue['Facts']; ?></td>
                                        <td><?php echo $chValue['Description']; ?></td>

                                        <td><?php echo $chValue['Internal_control']; ?></td>
                                        <td><?php echo $chValue['recommendation']; ?></td>

                                        <td><?php echo $chValue['auditor_justification']; ?></td>
                                        <td><?php echo $chValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $chValue['name']; ?></td>
                                        <td><?php echo $chValue['Date']; ?></td>
                                        <td><?php echo $chValue['Action']; ?></td>
                                        <td><?php echo $chValue['Approval']; ?></td>


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
    </div>
    <!-- /.row -->
</div>





<?php
include "footer.php";
?>