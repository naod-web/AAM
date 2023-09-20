<?php

include 'tl_header.php';


// $viewReg = $oms->view_ts();
if (isset($_POST['edit'])) {
    // $editch = $oms->edit_ts($_POST);
}

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header">View for Assigned task</h4>
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>



                                <th>Task ID</th>
                                <th>Task Name</th>
                                <th>Task Details</th>
                                <th>Team</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <!-- <th>Operation</th> -->


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewReg) {
                                foreach ($viewReg as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['Audit_type']; ?></td>
                                        <td><?php echo $RegValue['task_details']; ?></td>
                                        <td><?php echo $RegValue['Team']; ?></td>
                                        <td><?php echo $RegValue['start_date']; ?></td>
                                        <td><?php echo $RegValue['end_date']; ?></td>
                                        <!-- <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"> Accept</button>
                                        </td> -->
                                    </tr>
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Audit Program</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">


                                                        <div class="form-group">
                                                            <label>Approval</label>
                                                            <input type="text" name="Approval" id="Approval" class="form-control" value="<?php echo $RegValue['Approval'] ?>" placeholder="Enter Approval">

                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-info" value="edit">OK</button>
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>