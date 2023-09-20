<?php
include "aud_header.php";



if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->operational($_POST);
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
            <h4 class="page-header">Add Operational Area</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">

                <div class="form-group">
                    <a href="find_registration.php" class="badge badge-info"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>
                    <label>Operational Areas</label>

                    <input type="text" name="Operational_area" class="form-control" required>
                    <?php
                    if (isset($saveReg['Operational_area'])) {
                        echo $saveReg['Operational_area'];
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