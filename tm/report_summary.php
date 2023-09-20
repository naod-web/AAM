<?php

include 'tm_header.php';
// $viewfr = $oms->view_FindingRR($_SESSION['audit_type']);
$viewintrL = $oms->view_findingDetail($_POST);
$op_area = $oms->select_enga();
if (isset($_POST['save-report'])) {
    $saveReport = $oms->save_report_summary($_POST);
}

if (isset($_POST['filter'])) {
    echo "filter";
}

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReport['su'])) {
                echo $saveReport['su'];
            }
            ?>
            <h4 class="page-header"> Report Summary </h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                <div class="form-group">
                    <label>Introduction</label>
                    <textarea name="intro" type="text" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Audit Objective</label>
                    <textarea name="objective" type="text" class="form-control" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Audit Methodology</label>
                    <textarea name="methodology" type="text" class="form-control" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Scope of the Audit</label>
                    <textarea name="scope" class="form-control" rows="3"></textarea>
                </div>
                <section class="col-sm-6">
                    <div class="form-group">
                        <label>Sampling Technique</label>
                        <input type="text" name="technique" class="form-control">
                        <?php
                        if (isset($saveReg['technique'])) {
                            echo $saveReg['technique'];
                        }
                        ?>
                        <!-- <textarea name="technique" class="form-control" rows="3"></textarea> -->
                    </div>
                </section>
                <section class="col-sm-6">
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" name="rating" class="form-control">
                        <?php
                        if (isset($saveReg['rating'])) {
                            echo $saveReg['rating'];
                        }
                        ?>
                    </div>
                </section>
                <div class="form-group">
                    <label>Executive Summary</label>
                    <textarea name="summary" type="text" class="form-control"></textarea>
                </div>
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal">Finding Registration</button> -->

                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal2">Finding Detail</button> -->

                <!-- <button type="button" class="btn btn-info" onclick="NewTab()"><i class="fa fa-reply-all"></i>&nbsp; Generate Report Summary</button> -->

                <!-- Modal -->
                <div class="modal fade" id="form_modal" aria-hidden="true">
                    <div class="modal-dialog" role="dialog" style=" margin: auto; height: 450px; width:auto; overflow-x:scroll;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registered Finding</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body modal-xl">
                                <div class="panel-body" width="100%">
                                
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Engagement ID</th>
                                                <th>Auditee</th>
                                                <th>Operational Area</th>
                                                <th>Finding Number</th>
                                                <th>Facts</th>
                                                <th>Description</th>
                                                <th>Department</th>
                                                <th>Existing Control</th>
                                                <th>Recommendation</th>
                                                <th>Auditor Conclusion</th>
                                                <th>Acceptance Status</th>
                                                <th>Auditor Name</th>
                                                <th>Date</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                                <!-- <th>Annexes</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($viewfr) {
                                                foreach ($viewfr as $chValue) {
                                                    // if($chValue[]){
                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $chValue['E_id']; ?></td>
                                                        <td><?php echo $chValue['auditee']; ?></td>
                                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                                        <td><?php echo $chValue['Finding_number']; ?></td>
                                                        <td><?php echo $chValue['Facts']; ?></td>
                                                        <td><?php echo $chValue['Description']; ?></td>
                                                        <td><?php echo $chValue['dep_name']; ?></td>

                                                        <td><?php echo $chValue['Internal_control']; ?></td>
                                                        <td><?php echo $chValue['recommendation']; ?></td>

                                                        <td><?php echo $chValue['auditor_justification']; ?></td>
                                                        <td><?php echo $chValue['Acceptance_Status']; ?></td>
                                                        <td><?php echo $chValue['name']; ?></td>
                                                        <td><?php echo $chValue['Date']; ?></td>
                                                        <td><?php echo $chValue['S_date']; ?></td>
                                                        <td><?php echo $chValue['E_date']; ?></td>
                                                        <td><?php echo $chValue['Action']; ?></td>


                                                    </tr>


                                            <?php
                                                    // }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------------- -->
                <div class="modal fade" id="form_modal2" aria-hidden="true">
                    <div class="modal-dialog" role="dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Registered Finding Detail</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body modal-xl">
                                <div class="panel-body" width="100%">

                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg">
                                        <thead>
                                            <tr>
                                                <!-- <th>Select</th> -->
                                                <th>Engagement ID</th>
                                                <!-- <th>Finding Number</th> -->
                                                <th>Irregularity Description</th>
                                                <th>Loss Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($viewintrL) {
                                                foreach ($viewintrL as $chValue) {
                                            ?>
                                                    <tr class="odd gradeX">

                                                        <td><?php echo $chValue['E_id']; ?></td>
                                                        <td><?php echo $chValue['Irregularity_description']; ?></td>
                                                        <td><?php echo $chValue['Loss_amount']; ?></td>
                                                        

                                                    </tr>


                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <!-- <button type="button" href="" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" name="save-report" class="btn btn-info" value="Save Report">

            </form>
        </div>
    </div>
    <div class="cliyerfix"></div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>