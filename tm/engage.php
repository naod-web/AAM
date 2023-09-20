<?php
include "tm_header.php";



if (isset($_POST['Submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->reg_engage($_POST);
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
            <h4 class="page-header">Engagement/ Audit Work</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                <div class="form-group">
                    <label>Auditee Name</label>
                    <input type="text" name="Auditee_name" class="form-control" required>
                    <?php
                    if (isset($saveReg['Auditee_name'])) {
                        echo $saveReg['Auditee_name'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Assigned Team</label>
                    <input type="text" name="Assigned_team" class="form-control">
                    <?php
                    if (isset($saveReg['Assigned_team'])) {
                        echo $saveReg['Assigned_team'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Creation Date</label>
                    <input type="text" name="Creation_date" class="form-control">
                    <?php
                    if (isset($saveReg['Creation_date'])) {
                        echo $saveReg['Creation_date'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Assignment Date</label>
                    <input type="text" name="Assignment_date" class="form-control">
                    <?php
                    if (isset($saveReg['Assignment_date'])) {
                        echo $saveReg['Assignment_date'];
                    }
                    ?>

                </div>

                <div class="form-group">
                    <label>Expected Start Date</label>
                    <input type="text" name="S_date" class="form-control">
                    <?php
                    if (isset($saveReg['S_date'])) {
                        echo $saveReg['S_date'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Expected End Date</label>
                    <input type="text" name="E_date" class="form-control">
                    <?php
                    if (isset($saveReg['E_date'])) {
                        echo $saveReg['E_date'];
                    }
                    ?>
                </div>
                <input type="submit" name="Submit" class="btn btn-lg btn-info btn-block" value="engage" />
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