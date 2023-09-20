<?php
include "header.php";

//$op = $oms->select_operational();
$viewintrL = $oms->view_findingDetail();


if (isset($_POST['submit'])) {
    $saveL = $oms->add_finding_detail($_POST);
}
if (isset($_POST['edit'])) {
    $editintrL = $oms->edit_findDetail($_POST);
}
if (isset($_POST['delete'])) {

    $delintrL = $oms->del_findDetail();
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

            <h4 class="page-header">Finding Detail</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
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
                                <th>Finding Number</th>
                                <th>Irregularity Description</th>
                                <th>Loss Amount</th>
                                <th>Operation</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewintrL) {
                                foreach ($viewintrL as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['E_id']; ?></td>
                                        <td><?php echo $chValue['Finding_number']; ?></td>
                                        <td><?php echo $chValue['Irregularity_description']; ?></td>
                                        <td><?php echo $chValue['Loss_amount']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>

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
                                                    <h5 class="modal-title" id="exampleModalLabel">Update for finding detail</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">


                                                            <div class="form-group">
                                                                <label>Finding number</label>
                                                                <input type="number" name="Finding_number" id="Finding_number" class="form-control" value="<?php echo $chValue['Finding_number'] ?>" placeholder="Enter finding number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Irregularity Description</label>
                                                                <input type="text" name="Irregularity_description" id="Irregularity_description" class="form-control" value="<?php echo $chValue['Irregularity_description'] ?>" placeholder="Enter Irregularity description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Loss Amount</label>
                                                                <input type="text" name="Loss_amount" id="Loss_amount" class="form-control" value="<?php echo $chValue['Loss_amount'] ?>" placeholder="Enter Loss Amount">

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
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h4 class="modal-title">Add Finding Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Finding Number</label>
                            <input type="number" name="Finding_number" class="form-control" placeholder="Enter Finding Number">

                        </div>
                        <div class="form-group">
                            <label>Irregularity Description</label>
                            <input type="text" name="Irregularity_description" class="form-control" placeholder="Enter Irregularity Description">

                        </div>
                        <div class="form-group">
                            <label>Loss Amount</label>
                            <input type="text" name="Loss_amount" class="form-control" placeholder=" Enter Loss amount">

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


<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->


<?php
include "footer.php";
?>