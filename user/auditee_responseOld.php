<?php
include "u_header.php";

$auditeeList = $oms->select_auditee();
// $auditee_resp = $oms->select_auditee_response();
$rectificationList = $oms->select_rectification();

if (isset($_POST['submit'])) {

    $savef = $oms->auditee_resp($_POST);
}

?>

<!-- /#page-wrapper -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header">Add Auditee Response and Feedback</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">

                <div class="form-group">
                    <label>Auditee</label>
                    <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

                </div>

                <div class="form-group">
                    <label>Acceptance Status</label>
                    <select name="Acceptance_Status" class="form-control">
                        <option value="">--- Select ---</option>
                        <?php
                        if (isset($rectificationList)) {
                            foreach ($rectificationList as $value) {
                        ?>
                                <option value="<?php echo $value['Rectification']; ?>"> <?php echo $value['Rectification']; ?> </option>
                        <?php }
                        } ?>
                    </select>
                    <?php
                    if (isset($savec['Acceptance_Status'])) {
                        echo $savec['Acceptance_Status'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Action</label>
                    <textarea name="action" type="text" class="form-control" id="editorA"></textarea>
                </div>
                <div class="form-group">
                    <label>Auditee Response/ Feedback</label>
                    <textarea name="Resp" type="text" class="form-control" id="editorar"></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block" value="submit" />
            </form>
        </div>
    </div>
    <!-- <div class="cliyerfix"></div> -->
    <!-- /.row -->
</div>


<?php
include "footer.php";
?>