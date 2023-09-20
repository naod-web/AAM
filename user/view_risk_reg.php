<?php
include "u_header.php";

// $co = $oms->cont_list();
$rl = $oms->rs_list();
$risk_level = $oms->select_risk_level();
// $rectificationList = $oms->select_rectification();
$viewM = $oms->view_rR();
if (isset($_POST['submit'])) {

    $saveRisk = $oms->risk_reg($_POST);
}
if (isset($_POST['edit'])) {

    $viewM = $oms->modify_risk_reg($_POST);
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
            <h4 class="page-header">Risk Registration</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Register Risk</button>
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



                                <th>Business Objective</th>
                                <th>Business Owner</th>
                                <th>Risk List</th>
                                <th>Likely hood</th>
                                <th>Risk Level</th>
                                <th>Impact Description</th>
                                <!-- <th>Control List</th>
                                <th>Rectification</th> -->
                                <th>Operation</th>




                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['Business_objective']; ?></td>
                                        <td><?php echo $RegValue['Business_owner']; ?></td>
                                        <td><?php echo $RegValue['Risk_list']; ?></td>
                                        <td><?php echo $RegValue['Likely_hood']; ?></td>
                                        <td><?php echo $RegValue['Risk_level']; ?></td>
                                        <td><?php echo $RegValue['Impact_description']; ?></td>
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
                                                            <label>Business Objective</label>
                                                            <input type="text" name="Business_objective" id="Business_objective" class="form-control" value="<?php echo $RegValue['Business_objective'] ?>" placeholder="Enter Business Objective">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Business Owner</label>
                                                            <input type="text" name="Business_owner" id="Business_owner" class="form-control" value="<?php echo $RegValue['Business_owner'] ?>" placeholder="Enter Business owner">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Risk List</label>
                                                            <input type="text" name="Risk_list" id="Risk_list" value="<?php echo $RegValue['Risk_list'] ?>" class="form-control" placeholder="Enter Risk List">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Likely hood</label>
                                                            <input type="text" name="Likely_hood" id="Likely_hood" value="<?php echo $RegValue['Likely_hood'] ?>" class="form-control" placeholder="Enter Likely hood">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Risk Level</label>
                                                            <input type="text" name="Risk_level" id="Risk_level" value="<?php echo $RegValue['Risk_level'] ?>" class="form-control" placeholder="Enter Risk level">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Impact Description</label>
                                                            <input type="text" name="Impact_description" id="Impact_description" value="<?php echo $RegValue['Impact_description'] ?>" class="form-control" placeholder="Enter Impact description">

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
                    <h4 class="modal-title">Register Risk</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Business Objectives</label>
                            <input type="text" name="Business_objective" class="form-control" required>
                            <?php
                            if (isset($saveRisk['Business_objective'])) {
                                echo $saveRisk['Business_objective'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Business Owner</label>
                            <input type="text" name="Business_owner" class="form-control" required>
                            <?php
                            if (isset($saveRisk['Business_owner'])) {
                                echo $saveRisk['Business_owner'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Risk List</label>
                            <select name="Risk_list" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($rl)) {
                                    foreach ($rl as $value) {
                                ?>
                                        <option value="<?php echo $value['Risk_list']; ?>"> <?php echo $value['Risk_list']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($rl['Risk_list'])) {
                                echo $rl['Risk_list'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Likely hood</label>
                            <input type="text" name="Likely_hood" class="form-control">
                            <?php
                            if (isset($saveRisk['Likely_hood'])) {
                                echo $saveRisk['Likely_hood'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Risk Level</label>
                            <select name="Risk_level" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($risk_level)) {
                                    foreach ($risk_level as $value) {
                                ?>
                                        <option value="<?php echo $value['risk_level']; ?>"> <?php echo $value['risk_level']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($rl['Risk_level'])) {
                                echo $rl['Risk_level'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Impact Description</label>
                            <textarea name="Impact_description" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveRisk['Impact_description'])) {
                                echo $saveRisk['Impact_description'];
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