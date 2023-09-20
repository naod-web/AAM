<?php
include "header.php";

// $co = $oms->cont_list();


$viewp = $oms->view_pp();
if (isset($_POST['submit'])) {

    $saveRisk = $oms->reg_pp($_POST);
}
if (isset($_POST['edit'])) {

    $viewp = $oms->modify_reg_pp($_POST);
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
            <h4 class="page-header">Policy Procedures</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Policy Procedures</button>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <a href="upLoad.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Uploaded Document</a>

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



                                <th>Document Name</th>
                                <th>Application Area /Department</th>
                                <!-- <th>Main Number</th>
                                <th>Sub Number</th> -->
                                <th>Description</th>
                                <th>Operation</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewp) {
                                foreach ($viewp as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['document_name']; ?></td>
                                        <td><?php echo $RegValue['application_area']; ?></td>

                                        <td><?php echo $RegValue['description']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"> <span class="glyphicon glyphicon-edit"></span>Edit</button>
                                        </td>

                                    </tr>
                                    <!-- ---------------- -->
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Registered Risk</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">


                                                        <div class="form-group">
                                                            <label>Document Name</label>
                                                            <input type="text" name="document_name" id="document_name" class="form-control" value="<?php echo $RegValue['document_name'] ?>" placeholder="Enter Document Name">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Application Area /Department</label>
                                                            <input type="text" name="application_area" id="application_area" class="form-control" value="<?php echo $RegValue['application_area'] ?>" placeholder="Enter Application Area">

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input type="text" name="description" id="description" value="<?php echo $RegValue['description'] ?>" class="form-control" placeholder="Enter Description">

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <h4 class="modal-title">Policy Procedures</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" name="document_name" class="form-control" required>
                            <?php
                            if (isset($saveRisk['document_name'])) {
                                echo $saveRisk['document_name'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Application Area/ Department</label>
                            <input type="text" name="application_area" class="form-control" required>
                            <?php
                            if (isset($saveRisk['application_area'])) {
                                echo $saveRisk['application_area'];
                            }
                            ?>
                        </div>


                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveRisk['description'])) {
                                echo $saveRisk['description'];
                            }
                            ?>
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