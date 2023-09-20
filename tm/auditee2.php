<?php
include "tm_header.php";



if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->auditee($_POST);
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
            <h4 class="page-header">New Auditee</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                <div class="form-group">
                    <a href="Quarter_summary.php" class="badge badge-info"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                    <label>Auditee</label>
                    <input type="text" name="auditee" class="form-control" required>
                    <?php
                    if (isset($saveReg['auditee'])) {
                        echo $saveReg['auditee'];
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