<?php
include "tm_header.php";
$risk_item = $oms->select_ris_item();
$im_id = $oms->select_imp();
$likely = $oms->select_likely();
$risk_level = $oms->select_risk_level();
$st_id = $oms->select_status();

// $im_id="";
// $likely="";
// $risk_score="";

if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);
    $saveReg = $oms->risk_item($_POST);
}

if (isset($_POST['create'])) {
    $save_team = $oms->add_plan_year($_POST);
}

?>
a

<div id="page-wrapper">
    
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header"><a href="view_annualplan.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;Add Risk Item &nbsp <a href="risk_item_list.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Add Risk Item List</a></h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-sm-10">
            <form role="form" method="post">
                <section class="col-sm-6">
                    <div class="form-group">
                        <label>Risk Item List</label>
                        <select name="risk_item" class="form-control">
                            <option value="">--- Select ---</option>
                            <?php
                            if (isset($risk_item)) {
                                foreach ($risk_item as $value) {
                            ?>
                                    <option value="<?php echo $value['id']; ?>"> <?php echo $value['risk_ite']; ?> </option>
                            <?php }
                            } ?>
                        </select>
                        <?php
                        if (isset($saveM['risk_item'])) {
                            echo $saveM['risk_item'];
                        }
                        ?>
                    </div>
                </section>
                <section class="col-sm-6">
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
                </section>
                <section class="col-sm-6">
                    <div class="form-group">
                        <label>Likelyhood</label>
                        <select name="likely" class="form-control">
                            <option value="likely">--- Select ---</option>
                            <?php
                            if (isset($likely)) {
                                foreach ($likely as $value) {
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
                </section>
                <section class="col-sm-6">
                <div class="form-group">
                            <label>Risk Score</label>
                            <input type="number" name="risk_score" class="form-control" placeholder="Enter Risk Score">
                            <?php
                            if (isset($saveM['risk_score'])) {
                                echo $saveM['risk_score'];
                            }
                            ?>
                        </div>
                    </section>
                    <section class="col-sm-6">
                    <div class="form-group">
                        <label>Risk level</label>
                        <select name="risk_level" class="form-control">
                            <option value="risk_level">--- Select ---</option>
                            <?php
                            if (isset($risk_level)) {
                                foreach ($risk_level as $value) {
                            ?>
                                    <option value="<?php echo $value['id']; ?>"> <?php echo $value['risk_level']; ?> </option>
                            <?php }
                            } ?>
                        </select>
                        <?php
                        if (isset($saveM['risk_level'])) {
                            echo $saveM['risk_level'];
                        }
                        ?>
                    </div>
                        </section>

                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block" value="submit" />
            </form>
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header"> Plan Year creation</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>

        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create Temp Team</button>
    </div>

</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h5 class="modal-title">Plan Year Creation</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                            <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control">
                            <?php
                            if (isset($saveImp['year'])) {
                                echo $saveImp['year'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($st_id)) {
                                    foreach ($st_id as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['status']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['status'])) {
                                echo $saveM['status'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="create" class="btn btn-info" value="create"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>



<?php
include "footer.php";
?>