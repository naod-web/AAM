<?php

include 'header.php';

$viewQuarter = $oms->view_monthly();

if (isset($_POST['submit'])) {

    $edQuarter = $oms->edit_monthly($_POST);
}
if (isset($_POST['delete'])) {

    $delAnnual = $oms->del_monthly($_POST);
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
            <h4 class="page-header">Approve for Monthly Plan</h4>
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

                                <th>ID</th>
                                <th>Quarter Plan ID</th>
                                <!-- <th>Audit Type</th> -->
                                <!-- <th>Auditee</th> -->
                                <!-- <th>Quantity</th>
                                <th>Quarter Number</th> -->
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewQuarter) {
                                foreach ($viewQuarter as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['q_id']; ?></td>
                                        <td><?php echo $RegValue['Start_date']; ?></td>
                                        <td><?php echo $RegValue['End_date']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span> </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                    </tr>

                                    <!-- -----------------------Delete Modal----------------------------- -->

                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $RegValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $RegValue['id'] ?>">
                                                        <?php
                                                        if (isset($saveReg['id'])) {
                                                            echo $saveReg['id'];
                                                        }
                                                        ?>
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


                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit and Approve Monthly Plan</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">



                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="text" name="Start_date" id="Start_date" value="<?php echo $RegValue['Start_date'] ?>" class="form-control" data-date-format="mm-dd-yyyy">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="text" name="End_date" id="End_date" value="<?php echo $RegValue['End_date'] ?>" class="form-control" data-date-format="mm-dd-yyyy">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Approval</label>
                                                            <input type="text" name="Approval" id="Approval" value="<?php echo $RegValue['Approval'] ?>" class="form-control">

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