<?php
include "aud_header.php";

// $auditeeList = $oms->select_auditee();
//$quarter_plan = $oms->select_quarter_plan();
$viewEn = $oms->view_engagement($_SESSION['audit_type']);
$chk_num = $oms->select_chk();
$aud_name = $oms->select_auditor_name();
$con_p_name = $oms->select_contac_p();
// $tm = $oms->select_team();
// $qpid = $oms->select_quarter_plan();
// $mpid = $oms->select_monthly_plan();
$p_id = $oms->select_planid();



// if (isset($_POST['edit'])) {
//     $editch = $oms->edit_audit_program_engagement($_POST);
// }
if (isset($_POST['delete'])) {

    $delch = $oms->del_audit_program_engagement();
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

            <h5 class="page-header">Audit Work/ Engagement</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modalE"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</button> -->
    <div class="row">
        <div class="col-auto float-right ml-auto">
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

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                            <thead>
                                <tr>
                                    <!-- <th>Engagement ID</th> -->
                                    <!-- <th>Plan ID</th> -->
                                    <th>Auditee</th>
                                    <th>Audit type</th>
                                    <th>Engagement Description</th>
                                    <th>Assignment Date</th>
                                    <th>Expected Start Date</th>
                                    <th>Expected End Date</th>
                                    <!-- <th>Name</th> -->
                                    <!-- <th>Additional Checklist</th> -->
                                    <th>Action</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($viewEn) {
                                    foreach ($viewEn as $chValue) {
                                ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $chValue['auditee']; ?></td>
                                            <td><?php echo $chValue['audit_type']; ?></td>
                                            <td><?php echo $chValue['Description']; ?></td>
                                            <td><?php echo $chValue['Assignment_date']; ?></td>
                                            <td><?php echo $chValue['S_date']; ?></td>
                                            <td><?php echo $chValue['E_date']; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                                <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Engagement Creation</h5>
                                                        <div class="row">

                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        </div>
                                                        <form role="form" method="POST" action="#">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">
                                                                <!-- <div class="form-group">
                                                                <label>Engagement ID</label>
                                                                <input type="text" name="p_id" id="id" class="form-control" placeholder="Enter Monthly Plan ID">

                                                            </div> -->
                                                                <div class="form-group">
                                                                    <label>Auditee</label>
                                                                    <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" placeholder="Enter auditee">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Audit type</label>
                                                                    <input type="text" name="audit_type" id="audit_type" class="form-control" value="<?php echo $chValue['audit_type'] ?>" placeholder="Enter audit type">

                                                                </div>


                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input type="text" name="Description" id="Description" class="form-control" value="<?php echo $chValue['Description'] ?>" placeholder="Enter Description">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Assignment Date</label>
                                                                    <input type="date" name="Assignment_date" id="Assignment_date" class="form-control" value="<?php echo $chValue['Assignment_date'] ?>" placeholder="Enter Assignment Date">

                                                                </div>
                                                                <div class=" form-group">
                                                                    <label>Expected Start Date</label>
                                                                    <input type="date" name="S_date" id="S_date" class="form-control" value="<?php echo $chValue['S_date'] ?>" placeholder="Enter Start Date">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Expected End Date</label>
                                                                    <input type="date" name="E_date" id="E_date" class="form-control" value="<?php echo $chValue['E_date'] ?>" placeholder="Enter Expected End Date">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Amend by:</label>
                                                                    <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

<?php
include "footer.php";
?>