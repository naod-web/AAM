<?php
include "u_header.php";


$viewM = $oms->view_rC();
if (isset($_POST['submit'])) {

    $saveRisk = $oms->risk_cont($_POST);
}
if (isset($_POST['edit'])) {
    $editch = $oms->edit_rC($_POST);
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
            <h4 class="page-header">Risk Control</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Risk Control</button>
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



                                <th>Risk Code</th>
                                <th>Control Name</th>
                                <th>Control Description</th>
                                <th>Control Objective</th>
                                <th>Implementation Criteria</th>
                                <th>Implementation Area</th>
                                <th>Document Name</th>
                                <th>Operation</th>




                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['Risk_code']; ?></td>
                                        <td><?php echo $RegValue['Control_name']; ?></td>
                                        <td><?php echo $RegValue['Control_description']; ?></td>
                                        <td><?php echo $RegValue['Control_objectives']; ?></td>
                                        <td><?php echo $RegValue['Imp_criteria']; ?></td>
                                        <td><?php echo $RegValue['Imp_area']; ?></td>
                                        <td><?php echo $RegValue['Document']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        </td>

                                    </tr>
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Finding Registration</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">


                                                            <div class="form-group">
                                                                <label>Risk code</label>
                                                                <input type="text" name="Risk_code" id="Risk_code" class="form-control" value="<?php echo $RegValue['Risk_code'] ?>" placeholder="Enter Risk Code">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Control Name</label>
                                                                <input type="text" name="Control_name" id="Control_name" class="form-control" value="<?php echo $RegValue['Control_name'] ?>" placeholder="Enter Control Name">

                                                            </div>
                                                            <div class="form-group">

                                                                <label>Control Description</label>
                                                                <input type="text" name="Control_description" id="Control_description" class="form-control" value="<?php echo $RegValue['Control_description'] ?>" placeholder="Enter Control description">

                                                            </div>
                                                            <div class="form-group">

                                                                <label>Control Objective</label>
                                                                <input type="text" name="Control_objectives" id="Control_objectives" class="form-control" value="<?php echo $RegValue['Control_objectives'] ?>" placeholder="Enter Control objectives">

                                                            </div>
                                                            <div class="form-group">

                                                                <label>Implementation Criteria</label>
                                                                <input type="text" name="Imp_criteria" id="Imp_criteria" class="form-control" value="<?php echo $RegValue['Imp_criteria'] ?>" placeholder="Enter Implementation Criteria">

                                                            </div>
                                                            <div class="form-group">

                                                                <label>Implementation Area</label>
                                                                <input type="text" name="Imp_area" id="Imp_area" class="form-control" value="<?php echo $RegValue['Imp_area'] ?>" placeholder="Enter Implementation Area">

                                                            </div>



                                                            <div class="form-group">
                                                                <label>Document Name</label>
                                                                <input type="text" name="Document" id="Document" class="form-control" value="<?php echo $RegValue['Document'] ?>" placeholder="Enter Document">

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
                    <h4 class="modal-title">Add Risk Control</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <label>Control Name</label>
                            <input type="text" name="Control_name" class="form-control">
                            <?php
                            if (isset($saveRisk['Control_name'])) {
                                echo $saveRisk['Control_name'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Control Description</label>
                            <input type="text" name="Control_description" class="form-control">
                            <?php
                            if (isset($saveRisk['Control_description'])) {
                                echo $saveRisk['Control_description'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Control Objectives</label>
                            <input type="text" name="Control_objectives" class="form-control">
                            <?php
                            if (isset($saveRisk['Control_objectives'])) {
                                echo $saveRisk['Control_objectives'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Implementation Criteria</label>
                            <input type="text" name="Imp_criteria" class="form-control">
                            <?php
                            if (isset($saveRisk['Imp_criteria'])) {
                                echo $saveRisk['Imp_criteria'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Implementation Area</label>
                            <input type="text" name="Imp_area" class="form-control">
                            <?php
                            if (isset($saveRisk['Imp_area'])) {
                                echo $saveRisk['Imp_area'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Detail</label>
                            <textarea name="Document" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveRisk['Document'])) {
                                echo $saveRisk['Document'];
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