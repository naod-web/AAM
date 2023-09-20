<?php
include 'tl_header.php';


$viewch = $oms->view_af();
$auditeeList = $oms->select_auditee();


if (isset($_POST['edit'])) {
    $editch = $oms->edit_approve_finding();
}
if (isset($_POST['delete'])) {

    $delch = $oms->del_af();
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

            <h4 class="page-header">Approve Audit Finding Registration</h4>
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
                                <th>Criteria</th>
                                <th>Cause</th>
                                <th>Effect</th>
                                <th>Internal Control</th>
                                <th>Recommendation</th>

                                <th>Auditors Conclusion</th>
                                <th>Acceptance Status</th>
                                <th>Auditor Name</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Approval</th>

                                <th>Operation</th>


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
                                        <td><?php echo $chValue['Approval']; ?></td>

                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span> </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash">Delete</span></button>

                                        </td>
                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $chValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $chValue['id'] ?>">

                                                        <h4> Are You sure to delete this content!!</h4>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Checklist Value</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">


                                                            <div class=" form-group">
                                                                <label>Engagement ID</label>
                                                                <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $chValue['E_id'] ?>" placeholder="Enter Engagement ID">

                                                            </div>
                                                            <div class=" form-group">
                                                                <label>Auditee</label>
                                                                <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" placeholder="Enter Auditee">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Operational Area</label>
                                                                <input type="text" name="Operational_area" id="Operational_area" class="form-control" value="<?php echo $chValue['Operational_area'] ?>" placeholder="Operational Area">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Finding Number</label>
                                                                <input type="text" name="Finding_number" id="Finding_number" value="<?php echo $chValue['Finding_number'] ?>" class="form-control" placeholder="Enter Finding Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Facts</label>
                                                                <input type="text" name="Facts" id="Facts" value="<?php echo $chValue['Facts'] ?>" class="form-control" placeholder="Facts">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input type="text" name="Description" id="Description" value="<?php echo $chValue['Description'] ?>" class="form-control" placeholder="Update Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Criteria</label>
                                                                <input type="text" name="Criteria" id="Criteria" value="<?php echo $chValue['Criteria'] ?>" class="form-control" placeholder="Criteria">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Cause</label>
                                                                <input type="text" name="Cause" id="Cause" value="<?php echo $chValue['Cause'] ?>" class="form-control" placeholder="Cause">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Effect</label>
                                                                <input type="text" name="Effect" id="Effect" value="<?php echo $chValue['Effect'] ?>" class="form-control" placeholder="Effect">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Internal Control</label>
                                                                <input type="text" name="Internal_control" id="Internal_control" value="<?php echo $chValue['Internal_control'] ?>" class="form-control" placeholder="Internal Control">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Recommendation</label>
                                                                <input type="text" name="Recommendation" id="Recommendation" value="<?php echo $chValue['Recommendation'] ?>" class="form-control" placeholder="Recommendation">
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Response</label>
                                                                <input type="text" name="Resp" id="Resp" value="<?php echo $chValue['Resp'] ?>" class="form-control" placeholder="Internal Control">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Auditors Conclusion</label>
                                                                <input type="text" name="Auditor_conclusion" id="Auditor_conclusion" value="<?php echo $chValue['Auditor_conclusion'] ?>" class="form-control" placeholder="Auditors Conclusion">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Acceptance Status</label>
                                                                <input type="text" name="Acceptance_Status" id="Acceptance_Status" value="<?php echo $chValue['Acceptance_Status'] ?>" class="form-control" placeholder="Auditors Conclusion">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditors Name</label>
                                                                <input type="text" name="auditor_name" id="auditor_name" value="<?php echo $chValue['auditor_name'] ?>" class="form-control" placeholder="auditor Name">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <input type="date" name="Date" id="Date" value="<?php echo $chValue['Date'] ?>" class="form-control" placeholder="Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Action</label>
                                                                <input type="text" name="Action" id="Action" value="<?php echo $chValue['Action'] ?>" class="form-control" placeholder="Action">

                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Annexes</label>
                                                                <input type="text" name="Annexes" id="Annexes" value="<?php echo $chValue['Annexes'] ?>" class="form-control" placeholder="Annexes">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Approval</label>
                                                                <input type="text" name="Approval" id="Approval" value="<?php echo $chValue['Approval'] ?>" class="form-control" placeholder="Approval">

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
                    <h3 class="modal-title">Checklist</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Checklist Number</label>
                            <input type="number" name="checklist_number" class="form-control" placeholder="Enter checklist number">

                        </div>
                        <div class="form-group">
                            <label>Areas to Apply</label>
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

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description">

                        </div>
                        <div class="form-group">
                            <label>Objectives</label>
                            <input type="text" name="objective" class="form-control" placeholder="Objective">

                        </div>
                        <div class="form-group">
                            <label>Risks</label>
                            <input type="text" name="risk" class="form-control" placeholder="Risks">

                        </div>
                        <div class="form-group">
                            <label>Risk Level</label>
                            <input type="text" name="risk_level" class="form-control" placeholder="Enter risk level">

                        </div>
                        <div class="form-group">
                            <label>Expected Control</label>
                            <input type="text" name="expected_control" class="form-control" placeholder="Enter expected control">

                        </div>
                        <div class="form-group">
                            <label>Audit Approach</label>
                            <input type="text" name="audit_approach" class="form-control" placeholder="Enter Audit Approach">

                        </div>
                        <div class="form-group">
                            <label>Detail Audit Program</label>
                            <input type="text" name="detail" class="form-control" placeholder="Enter detail of audit program">

                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info" value="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>