<?php
include "tl_header.php";
$E_id = $oms->select_engagement_id();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->reg_audit_prog_engage($_POST);
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
            <h4 class="page-header"><i class="fa fa-home"></i>&nbsp;Audit Program&nbsp;<i class="fa fa-chevron-right"></i></h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">

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
                     <label>Done by:</label>
                        <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

                </div>
                <div class="form-group">
                    <label>Objective of Audit</label>
                    <textarea name="Objective" type="text" class="form-control"  required></textarea>
                </div>
                <div class="form-group">
                    <label>Scope of Audit</label>

                    <textarea name="Scope" type="text" class="form-control"  required></textarea>
                </div>

                <div class="form-group">
                    <label>Previous Audit Status</label>
                    <textarea name="Status" type="text" class="form-control"  required></textarea>
                </div>
                <div class="form-group">
                    <label>Total Working Days </label>
                    <input type="number" name="total" class="form-control">
                    <?php
                    if (isset($saveReg['total'])) {
                        echo $saveReg['total'];
                    }
                    ?>
                </div>

                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block" value="submit" />
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