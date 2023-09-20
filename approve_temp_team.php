<?php

include "header.php";
$viewAssign = $oms->view_temp_team($_POST);
$ap = $oms->select_ap();

if (isset($_POST['submit'])) {

    $viewAnnual = $oms->edit_temp_team($_POST);
}
if (isset($_POST['delete'])) {

    $delAnnual = $oms->del_temp_team($_POST);
}

?>
<!-- .................Create Modal......................... -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- ...................................................... -->


<div id="page-wrapper" class="">
    &nbsp;

    <div class="row">
        <div class="col-sm-10">
            <br>
            <h5> Approve Temporary Team </h5>
            <br><br>
            <div class="panel panel-default">

                <div class="panel-heading">
                    Ad-hoc List
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover mx-auto" id="dataTables-example">
                        <thead>
                            <tr>


                                <!-- <th>Team ID</th> -->
                                <th>Engagement ID</th>
                                <th>Audit Engagement Date</th>
                                <th>Team Member</th>
                                <!-- <th>Auditor-in-Charge</th> -->
                                <!-- <th>Audit type</th> -->
                                <th>HO/Department/Branches</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if ($viewAssign) {
                                foreach ($viewAssign as $DeValue) {
                            ?>
                                    <tr class="odd gradeX">


                                        
                                        <td><?php echo $DeValue['E_id']; ?></td>
                                        <td><?php echo $DeValue['Team_member']; ?></td>
                                        <td><?php echo $DeValue['Auditor_in_charge']; ?></td>
                                        <td><?php echo $DeValue['auditee']; ?></td>
                                        <td><?php echo $DeValue['Approval']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal<?php echo $DeValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $DeValue['id'] ?>"><span class="glyphicon glyphicon-trash">Delete</span></button>
                                        </td>
                                    </tr>
                                    <!-- Add Modal -->



                                    <!-- Edit Modal -->
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
                                                        

                                                        <div class="form-group">
                                                            <label>Aduitee</label>
                                                            <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $DeValue['auditee'] ?>" placeholder="Enter Auditee">

                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Team Member</label>
                                                            <input type="text" name="Team_member" id="Team_member" class="form-control" value="<?php echo $DeValue['Team_member'] ?>" placeholder="Enter Team Member">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Auditor-in-charge</label>
                                                            <input type="text" name="Auditor_in_charge" id="Auditor_in_charge" class="form-control" value="<?php echo $DeValue['Auditor_in_charge'] ?>" placeholder="Enter Auditor in charge">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sub process</label>
                                                            <input type="text" name="sub" id="sub" value="<?php echo $DeValue['sub'] ?>" class="form-control" placeholder="sub process">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input type="text" name="Description" id="Description" value="<?php echo $DeValue['Description'] ?>" class="form-control" placeholder="Description">

                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <label>Approval</label>
                                                            <select name="Approval" class="form-control">
                                                                <option value="">--- Select ---</option>
                                                                <?php
                                                                if (isset($ap)) {
                                                                    foreach ($ap as $value) {
                                                                ?>
                                                                        <option value="<?php echo $value['Approval']; ?>"> <?php echo $value['Approval']; ?> </option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                            <?php
                                                            if (isset($saveM['Approval'])) {
                                                                echo $saveM['Approval'];
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ..........Delete Modal........................... -->
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
                                    <!-- -------------------------------end delete modal------------------------ -->

                            <?php
                                    $i++;
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php
include "footer.php";
?>