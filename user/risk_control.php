<?php
include "u_header.php";



if (isset($_POST['submit'])) {

    $saveRisk = $oms->risk_cont($_POST);
}

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveRisk['su'])) {
                echo $saveRisk['su'];
            }
            ?>
            <h1 class="page-header">Risk Control</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                <div class="form-group">
                    <label>Risk Code</label>
                    <input type="text" name="Risk_code" class="form-control">
                    <?php
                    if (isset($saveRisk['Risk_code'])) {
                        echo $saveRisk['Risk_code'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Control Name</label>
                    <input type="text" name="Risk_name" class="form-control">
                    <?php
                    if (isset($saveRisk['Risk_name'])) {
                        echo $saveRisk['Risk_name'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Control Description</label>
                    <input type="text" name="Control_description" class="form-control">
                    <?php
                    if (isset($saveRisk['Control_description'])) {
                        echo $saveRisk['Control_description'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Implementation Criteria</label>
                    <input type="text" name="Imp_criteria" class="form-control">
                    <?php
                    if (isset($saveRisk['Imp_criteria'])) {
                        echo $saveRisk['Imp_criteria'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Implementation Area</label>
                    <input type="text" name="Imp_area" class="form-control">
                    <?php
                    if (isset($saveRisk['Imp_area'])) {
                        echo $saveRisk['Imp_area'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Document</label>
                    <input type="file" name="Document" class="form-control">
                    <?php
                    if (isset($saveRisk['Document'])) {
                        echo $saveRisk['Document'];
                    }
                    ?>
                </div>

                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block " value="submit">
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>