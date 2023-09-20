<?php
include "tm_header.php";



if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->audit_typeq($_POST);
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

            <h5 class="page-header">New Audit type</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">
                <div class="form-group">
                    <a href="view_quarterplan.php" class="badge badge-info"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                    <label>Audit type</label>
                    <input type="text" name="audit_type" class="form-control" required>
                    <?php
                    if (isset($saveReg['audit_type'])) {
                        echo $saveReg['audit_type'];
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