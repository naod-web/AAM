<?php
include "tm_header.php";
$risk_item = $oms->select_ris_item();
$im_id = $oms->select_imp();
$likely = $oms->select_likely();
$risk_level = $oms->select_risk_level();
$st_id = $oms->select_status();

$auditee = $oms->select_auditee();
$Quarter_number = $oms->select_quarter_number();
$stid = $oms->select_month_year();
$yr = $oms->select_plan_year();
$audit_type = $oms->select_auditTypeq();
// $Team = $oms->select_team();
// $listAudit_select = $oms->select_auditee();
$viewM = $oms->view_rsk_item();
$risk_lvl = $oms->select_risk_level();

// $im_id="";
// $likely="";
// $risk_score="";




?>



<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header"><a href="risk_item.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;&nbsp; </h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleA">
                        <thead>
                            <tr>
                                <th>Risk Item ID</th>
                                <!-- <th>Serial</th> -->
                                <th>Plan ID</th>
                                <th>Risk Item</th>
                                <!-- <th>Risk Item</th>
                                <th>Risk Score</th> -->
                                <th>Impact</th>
                                <th>Likely</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['p_id']; ?></td>
                                        <td><?php echo $RegValue['risk_item']; ?></td>
                                        <td><?php echo $RegValue['im_id']; ?></td>
                                        <td><?php echo $RegValue['likely']; ?></td>
                                        
                                    </tr>

                                        <!-- View Modal for each Record -->
                                    <!-- ========Delete Modal======== -->
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
                                    <!-- Edit Record -->
                                     <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal -->


                </div>
                <!-- /.panel-body -->
            </div>

            <div class="modal fade" id="form_modalE<?php echo $RegValue['id'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="#">
                            <div class="modal-header">
                                <h5 class="modal-title">Risk Item</h5>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <!-- <div class="form-group">
                                        <label>Quarter Plan</label>
                                        <input type='text' name="q_id" id='q_id' class='form-control' placeholder='Enter id' onkeyup="GetDetail(this.value)" value="">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Plan ID:</label>
                                            <input type="text" name="p_id" id="id" class="form-control" value="<?php echo $RegValue['id'] ?>" disabled>
                                            <?php
                                        if (isset($saveReg['p_id'])) {
                                            echo $saveReg['p_id'];
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Risk Item</label>
                                        <select name="risk_item" class="form-control">
                                            <option value="">--- Select ---</option>
                                            <?php
                                            if (isset($risk_item)) {
                                                foreach ($risk_item as $value) {
                                            ?>
                                                    <option value="<?php echo $value['id']; ?>"> <?php echo $value['risk_ite'] ?> </option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <?php
                                        if (isset($saveM['risk_item'])) {
                                            echo $saveM['risk_item'];
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Impact</label>
                                        <select name="im_id" class="form-control">
                                            <option value="im_id">--- Select ---</option>
                                            <?php
                                            if (isset($im_id)) {
                                                foreach ($im_id as $value) {
                                            ?>
                                                    <option value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?> </option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <?php
                                        if (isset($saveM['im_id'])) {
                                            echo $saveM['im_id'];
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Likelyhood</label>
                                        <select name="likely" class="form-control">
                                            <option value="likely">--- Select ---</option>
                                            <?php
                                            if (isset($im_id)) {
                                                foreach ($im_id as $value) {
                                            ?>
                                                    <option value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?> </option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <?php
                                        if (isset($saveM['likely'])) {
                                            echo $saveM['likely'];
                                        }
                                        ?>
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


            </div>
            <!-- /#page-wrapper -->

            </div>




<?php
include "footer.php";
?>