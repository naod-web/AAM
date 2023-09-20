<?php
include "aud_header.php";
$viewintrL = $oms->view_findingDetail();
$E_id = $oms->select_engagement_id();
$F_id = $oms->select_Finding_number();
if (isset($_POST['submit'])) {

    $savef = $oms->add_finding_detail($_POST);
}
if (isset($_POST['edit'])) {
    $editintrL = $oms->edit_findingDetail($_POST);
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

            <h5 class="page-header">Finding Detail</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Finding Details</button>


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
                                <th>E_id</th>
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
                                            <!-- <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button> -->

                                        </td>

                                    </tr>
                                    <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Finding Details</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">


                                                            <div class="modal-body">
                                                                <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">


                                                                <div class="form-group">
                                                                    <label>E_id</label>
                                                                    <input type="text" name="E_id" id="E_d" class="form-control" value="<?php echo $chValue['E_id'] ?>" placeholder="Enter Engagement ID">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Finding number</label>
                                                                    <input type="text" name="Finding_number" id="Finding_number" class="form-control" value="<?php echo $chValue['Finding_number'] ?>" placeholder="Enter finding number">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Irregularity Description</label>
                                                                    <input type="text" name="Irregularity_description" id="Irregularity_description" class="form-control" value="<?php echo $chValue['Irregularity_description'] ?>" placeholder="Enter Irregularity description">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Loss Amount</label>
                                                                    <input type="text" name="Loss_amount" id="Loss_amount" class="form-control" value="<?php echo $chValue['Loss_amount'] ?>" placeholder="Enter Loss Amount">

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

<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h5 class="modal-title">Add Finding Detail</h5>
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
                            <label>Finding Number</label>
                            <select name="Finding_number" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($F_id)) {
                                    foreach ($F_id as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['Finding_number']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Finding_number'])) {
                                echo $saveM['Finding_number'];
                            }
                            ?>
                        </div>


                        <div class="form-group">
                            <label>Irregularity Description</label>
                            <textarea name="Irregularity_description" type="text" class="form-control" id="editor"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Loss Amount</label>
                            <input type="number" name="Loss_amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Amend by:</label>
                                <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>
                        </div>

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