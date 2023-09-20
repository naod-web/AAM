<?php
include "aud_header.php";



if (isset($_POST['Submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->reg_finding($_POST);
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
            <h1 class="page-header">Register Finding</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                <div class="form-group">
                    <label>Condition</label>
                    <input type="text" name="Condtion" class="form-control" required>
                    <?php
                    if (isset($saveReg['Condtion'])) {
                        echo $saveReg['Condtion'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Control</label>
                    <input type="text" name="Control" class="form-control">
                    <?php
                    if (isset($saveReg['Control'])) {
                        echo $saveReg['Control'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Cause</label>
                    <!-- <input type="text" name="Cause" class="form-control" rows="3"> -->
                    <textarea name="Cause" class="form-control" rows="3"></textarea>
                    <?php
                    if (isset($saveReg['Cause'])) {
                        echo $saveReg['Cause'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Effect</label>
                    <!-- <input type="text" name="Effect" class="form-control" rows="3"> -->
                    <textarea name="Effect" class="form-control" rows="3"></textarea>
                    <?php
                    if (isset($saveReg['Effect'])) {
                        echo $saveReg['Effect'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Recommendation</label>
                    <!-- <input type="text" name="Recommendation" class="form-control" rows="3"> -->
                    <textarea name="Recommendation" class="form-control" rows="3"></textarea>
                    <?php
                    if (isset($saveReg['Recommendation'])) {
                        echo $saveReg['Recommendation'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Rectification</label>
                    <!-- <input type="text" name="Recommendation" class="form-control" rows="3"> -->
                    <textarea name="Rect" class="form-control"></textarea>
                    <?php
                    if (isset($saveReg['Rect'])) {
                        echo $saveReg['Rect'];
                    }
                    ?>
                </div>
                <input type="submit" name="Submit" class="btn btn-lg btn-info btn-block" value="submit" />
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