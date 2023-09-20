<?php
include "tm_header.php";



if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->risk_item_list($_POST);
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
            <h5 class="page-header">Add Risk Item</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">

                <div class="form-group">
                    <a href="risk_item.php" class="badge badge-info"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>
                    <label> Add Risk Item</label>

                    <input type="text" name="risk_ite" class="form-control" required>
                    <?php
                    if (isset($saveReg['risk_ite'])) {
                        echo $saveReg['risk_ite'];
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