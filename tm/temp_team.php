<?php

include "tm_header.php";
$aud_name = $oms->select_auditor_name();
$E_id = $oms->select_engagement_id();
$aud_t = $oms->select_auditType();
$audty = $oms->select_auditee();
$aud_name = $oms->select_auditor_name();
$con_p_name = $oms->select_contac_p();
// $viewch = $oms->view_temp_teamA($_SESSION['audit_type']);
$viewch = $oms->view_temp_teamA($_SESSION['audit_type']);
$audit_activities = $oms->select_audit_activities();
// $Team = $oms->select_team();
// $Audit_type   = $oms->select_auditType();

if (isset($_POST['create'])) {
    $save_team = $oms->add_temp_team($_POST);
}

if (isset($_POST['submit'])) {

    $viewAnnual = $oms->update_temp_team($_POST);
}
if (isset($_POST['delete'])) {

    $viewAnnual = $oms->del_temp_team($_POST);
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
            <h4 class="page-header">Temp Team</h4>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div>

    </div>
    <div>
        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create Temp Team</button> -->
        <!-- <a href="audit_type.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Audit Type</a> &nbsp; &nbsp; -->
        
        <!-- <a href="auditee.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditee</a> &nbsp; &nbsp; -->
        <!-- <a href="contac_p.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Contact Person/Supervisor</a> &nbsp; &nbsp;
        <a href="aud_name.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditors</a> &nbsp; &nbsp; -->
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
                    <!-- <input type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')" /> -->
                    <!-- <button type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-trash"> Delete</span></button> -->
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>

                                <!-- <th><input type="checkbox" id="checkBoxAll" /></th> -->
                                <th>E_id</th>
                                <!-- <th>Team ID</th> -->
                                <th>Auditee</th>
                                <!-- <th>Audit Type</th> -->
                                <!-- <th>Team Foundation Date</th> -->
                                <th>Team Member</th>
                                <th>Assigned by:</th>
                                
                                <!-- <th>HO/Sub-process/Branches</th> -->
                                <!-- <th>Sub-process</th>
                                <th>Description</th> -->
                                <!-- <th>name</th>
                                <th>Approval</th>
                                <th>Assignment date</th> -->

                                <!-- <th>Status</th> -->
                                <!-- <th>Status Tracking</th> -->
                                <th>Action</th>
                                


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $DeValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $DeValue['E_id']; ?></td>
                                        <td><?php echo $DeValue['auditee']; ?></td>
                                        <td><?php echo $DeValue['Team_member']; ?></td>
                                        <td><?php echo $DeValue['Auditor_in_charge']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal<?php echo $DeValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $DeValue['id'] ?>"><span class="glyphicon glyphicon-trash">Delete</span></button>
                                        </td>

                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $DeValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $DeValue['id'] ?>">

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
                                    <!-- ------Edit Modal------ -->
                                    <div class="modal fade" id="editModal<?php echo $DeValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Team</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $DeValue['id'] ?>">

                                                        <!-- <div class="form-group">
                                                            <label>Team</label>
                                                            <input type="text" name="Team" id="Team" value="<?php echo $DeValue['Team'] ?>" class="form-control" placeholder="Enter team">

                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Audit Type</label>
                                                            <input type="text" name="Audit_type" id="Audit_type" value="<?php echo $DeValue['Audit_type'] ?>" class="form-control" placeholder="Enter Audit Type">

                                                        </div> -->

                                                        <!-- <div class="form-group">
                                                            <label>Team Foundation Date</label>
                                                            <input type="date" name="team_foun_date" id="team_foun_date" value="<?php echo $DeValue['team_foun_date'] ?>" class="form-control" placeholder="mm-dd-yyyy">

                                                        </div> -->
                                                        <div class="form-group">
                                                            <label>Auditee</label>
                                                            <input type="text" name="auditee" id="auditee" value="<?php echo $DeValue['auditee'] ?>" class="form-control" placeholder="Enter auditee">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Team member</label>
                                                            <input type="text" name="Team_member" id="Team_member" value="<?php echo $DeValue['Team_member'] ?>" class="form-control" placeholder="Enter Team member">


                                                        </div>
                                                        <div class="form-group">
                                                            <label>Auditor-in-charge/Contact Person</label>
                                                            <input type="text" name="Auditor_in_charge" id="Auditor_in_charge" value="<?php echo $DeValue['Auditor_in_charge'] ?>" class="form-control" placeholder="Enter detail of Auditor in charge of">

                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label>Sub-process</label>
                                                            <input type="text" name="sub" id="sub" value="" class="form-control" placeholder="Enter sub process">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Auditor Responsibility/Description</label>
                                                            <input type="text" name="Description" id="Description" value="" class="form-control" placeholder="Enter detail auditor responsibility">
                                                        </div> -->
                                                        

                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <h5 class="modal-title">Temporary Team Creation</h5>
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
                            <label>Auditee:</label>
                                <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $value['auditee'] ?>">
                                <?php
                                if (isset($savec['auditee'])) {
                                echo $savec['auditee'];
                                }
                                ?>
                        </div>
                        <div class="form-group">
                            <label for="">Team Members</label>
                            <select name="Team_member[]" class="form-control mul" multiple="multiple">
                                <option value="">--- Select ---</option>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "oms");
                                $query = "SELECT * FROM auditor_name";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $rowaud) {

                                ?>;
                                        <option value="<?php echo $rowaud['auditor_name']; ?>"><?php echo $rowaud['auditor_name']; ?></option>
                                <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>

                            </select>

                        </div>
                        <div class="form-group">
                            <label>Auditor-in-charge/Contact person</label>
                            <select name="Auditor_in_charge" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($con_p_name)) {
                                    foreach ($con_p_name as $value) {
                                ?>
                                        <option value="<?php echo $value['name']; ?>"> <?php echo $value['name']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['Auditor_in_charge'])) {
                                echo $savec['Auditor_in_charge'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Audit Type</label>
                            <select name="audit_type" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($aud_t)) {
                                    foreach ($aud_t as $value) {
                                ?>
                                        <option value="<?php echo $value['audit_type']; ?>"> <?php echo $value['audit_type']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['audit_type'])) {
                                echo $savec['audit_type'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Auditee</label>
                            <select name="audit_object" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($audty)) {
                                    foreach ($audty as $value) {
                                ?>
                                        <option value="<?php echo $value['auditee']; ?>"> <?php echo $value['auditee']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['auditee'])) {
                                echo $savec['auditee'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Sub-process</label>
                            <input name="sub" type="text" class="form-control">
                            <!-- <textarea name="sub" type="text" class="form-control"></textarea> -->
                        </div>
                        <div class="form-group">
                            <label>Auditor Responsibility/Description</label>
                            <textarea name="Description" type="text" class="form-control"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>Previous Audit Status</label>
                            <textarea name="Status" type="text" class="form-control" id="edPA" required></textarea>

                        </div> -->

                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="create" class="btn btn-info" value="create"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>






<!-- /#page-wrapper -->



<?php
include "footer.php";
?>