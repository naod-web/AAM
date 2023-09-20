<?php
include "aud_header.php";

$aud_name = $oms->select_auditor_name();
$viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();
$E_id = $oms->select_engagement_id();
$rectificationList = $oms->select_rectification();


if (isset($_POST['submit'])) {

    $savef = $oms->Finding_Registration($_POST);
}
if (isset($_POST['edit'])) {
    $editch = $oms->edit_findingR($_POST);
}

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h4 class="page-header">Finding Registration </h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Finding Registration</button>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
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
                                <th>Criteria</th>
                                <th>Cause</th>
                                <th>Effect</th>
                                <th>Existing Control</th>
                                <th>Recommendation</th>
                                <!-- <th>Auditee Response</th> -->
                                <th>Auditor Conclusion</th>
                                <th>Acceptance Status</th>
                                <th>Auditor Name</th>
                                <th>Date</th>
                                <th>Action</th>

                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewfr) {
                                foreach ($viewfr as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['E_id']; ?></td>
                                        <td><?php echo $chValue['auditee']; ?></td>
                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                        <td><?php echo $chValue['Finding_number']; ?></td>
                                        <td><?php echo $chValue['Facts']; ?></td>
                                        <td><?php echo $chValue['Description']; ?></td>
                                        <td><?php echo $chValue['Criteria']; ?></td>
                                        <td><?php echo $chValue['Cause']; ?></td>
                                        <td><?php echo $chValue['Effect']; ?></td>
                                        <td><?php echo $chValue['Internal_control']; ?></td>
                                        <td><?php echo $chValue['Recommendation']; ?></td>

                                        <td><?php echo $chValue['Auditor_conclusion']; ?></td>
                                        <td><?php echo $chValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $chValue['auditor_name']; ?></td>
                                        <td><?php echo $chValue['Date']; ?></td>
                                        <td><?php echo $chValue['Action']; ?></td>

                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Finding Registration</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">


                                                            <div class="form-group">
                                                                <label>Engagement ID</label>
                                                                <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $chValue['E_id'] ?>" placeholder="Enter Engagement ID">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditee</label>
                                                                <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" placeholder="Enter auditee name">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Areas to Apply</label>
                                                                <input type="text" name="Operational_area" id="Operational_area" class="form-control" value="<?php echo $chValue['Operational_area'] ?>" placeholder="Enter checklist number">

                                                            </div>
                                                            <div class="form-group">

                                                                <label>Finding Number</label>
                                                                <input type="text" name="Finding_number" id="Finding_number" class="form-control" value="<?php echo $chValue['Finding_number'] ?>" placeholder="Enter Finding Number">

                                                            </div>
                                                            <div class="form-group">

                                                                <label>Facts</label>
                                                                <input type="text" name="Facts" id="Facts" class="form-control" value="<?php echo $chValue['Facts'] ?>" placeholder="Enter Facts">

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input type="text" name="Description" id="Description" class="form-control" value="<?php echo $chValue['Description'] ?>" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Criteria</label>
                                                                <input type="text" name="Criteria" id="Criteria" class="form-control" value="<?php echo $chValue['Criteria'] ?>" placeholder="Enter Criteria">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Cause</label>
                                                                <input type="text" name="Cause" id="Cause" class="form-control" value="<?php echo $chValue['Cause'] ?>" placeholder="Enter Cause">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Effect</label>
                                                                <input type="text" name="Effect" id="Effect" class="form-control" value="<?php echo $chValue['Effect'] ?>" placeholder="Enter Effect">

                                                            </div>
                                                            <div class=" form-group">
                                                                <label>Internal Control</label>
                                                                <input type="text" name="Internal_control" id="Internal_control" class="form-control" value="<?php echo $chValue['Internal_control'] ?>" placeholder="Enter Internal Control">

                                                            </div>
                                                            <div class=" form-group">
                                                                <label>Recommendation</label>
                                                                <input type="text" name="Recommendation" id="Recommendation" class="form-control" value="<?php echo $chValue['Recommendation'] ?>" placeholder="Enter Recommendation">

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Auditee Response</label>
                                                                <input type="text" name="Resp" id="Resp" class="form-control" value="<?php echo $chValue['Resp'] ?>" placeholder="Enter Auditee Response">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Auditor Conclusion</label>
                                                                <input type="text" name="Auditor_conclusion" id="Auditor_conclusion" class="form-control" value="<?php echo $chValue['Auditor_conclusion'] ?>" placeholder="Enter Auditor Conclusion">

                                                            </div>

                                                            <div class="form-group">
                                                                <label>Acceptance Status</label>
                                                                <input type="text" name="Acceptance_Status" id="Acceptance_Status" class="form-control" value="<?php echo $chValue['Acceptance_Status'] ?>" placeholder="Enter Acceptance Status">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditor Name</label>
                                                                <input type="text" name="auditor_name" id="Auditor_name" class="form-control" value="<?php echo $chValue['Auditor_name'] ?>" placeholder="Enter Auditor name">

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Auditor Name</label>
                                                                <input type="text" name="Auditor_name" id="Auditor_name" class="form-control" value="<?php echo $chValue['Auditor_name'] ?>" placeholder="Enter Auditor name">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <input type="date" name="Date" id="Date" class="form-control" value="<?php echo $chValue['Date'] ?>" placeholder="Enter Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Action plan</label>
                                                                <input type="text" name="Action" id="Action" class="form-control" value="<?php echo $chValue['Action'] ?>" placeholder="Enter Action plan">

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


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



<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h4 class="modal-title">Register Finding</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Engagement ID</label>
                            <select name="E_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($E_id)) {
                                    foreach ($E_id as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['id']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['E_id'])) {
                                echo $saveM['E_id'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Auditee</label>
                            <select name="auditee" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($auditeeList)) {
                                    foreach ($auditeeList as $value) {
                                ?>
                                        <option value="<?php echo $value['auditee']; ?>"> <?php echo $value['auditee']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['auditee'])) {
                                echo $saveM['auditee'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Operational_area</label>
                            <select name="Operational_area" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($op)) {
                                    foreach ($op as $value) {
                                ?>
                                        <option value="<?php echo $value['Operational_area']; ?>"> <?php echo $value['Operational_area']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Operational_area'])) {
                                echo $saveM['Operational_area'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Finding Number</label>
                            <input type="number" name="Finding_number" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Facts</label>
                            <input type="text" name="Facts" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="Description" type="text" class="form-control" id="editor"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Criteria</label>
                            <textarea name="Criteria" type="text" class="form-control" id="editor1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Cause</label>
                            <textarea name="Cause" type="text" class="form-control" id="editor2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Effect</label>
                            <textarea name="Effect" type="text" class="form-control" id="editor3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Existing Internal Control</label>
                            <textarea name="Internal_control" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Recommendation</label>
                            <textarea name="Recommendation" type="text" class="form-control" id="editor4"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>Auditee Response</label>
                            <textarea name="Resp" class="form-control" rows="3"></textarea>

                        </div> -->
                        <div class="form-group">
                            <label>Auditor Conclusion</label>
                            <textarea name="Auditor_conclusion" type="text" class="form-control" id="editor5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Acceptance Status</label>
                            <select name="Acceptance_Status" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($rectificationList)) {
                                    foreach ($rectificationList as $value) {
                                ?>
                                        <option value="<?php echo $value['Rectification']; ?>"> <?php echo $value['Rectification']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Acceptance_Status'])) {
                                echo $saveM['Acceptance_Status'];
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">
                            <label>Auditor name</label>
                            <input type="text" name="Auditor_name" class="form-control">


                        </div> -->

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="Date" class="form-control">


                        </div>
                        <div class="form-group">
                            <label>Action</label>
                            <input type="text" name="Action" class="form-control">

                        </div>
                        <!-- <div class="form-group">
                            <label>Annexes</label>
                            <input type="text" name="Annexes" class="form-control">

                        </div> -->
                        <!-- <div class="form-group">
                            <label for='upload'>Upload Files</label>
                            <input class="btn btn-default" id='upload' name="upload[]" type="file" multiple="multiple" aria-describedby="filesHelp" />
                            <small id="filesHelp" class="form-text text-muted">Choose files to upload</small>
                        </div> -->

                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info" value="submit"><span class="glyphicon glyphicon-save"></span> Register</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>