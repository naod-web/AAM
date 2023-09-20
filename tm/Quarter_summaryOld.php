<?php
include "tm_header.php";


$ity = $oms->select_ity();
$auditee = $oms->select_auditee();
if (isset($_POST['submit'])) {


    $saveTeam = $oms->quarter_summary($_POST);
}

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveTeam['su'])) {
                echo $saveTeam['su'];
            }
            ?>
            <h4 class="page-header">Quarter Executive Summary</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">

                <div class="form-group">
                            <label for="">Auditee</label>
                            <select name="auditee" class="form-control multiple-select" multiple="multiple">
                                <option value="">--- Select ---</option>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "oms");
                                $query = "SELECT * FROM auditee";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $rowaud) {

                                ?>
                                        <option value="<?php echo $rowaud['auditee']; ?>"><?php echo $rowaud['auditee']; ?></option>
                                <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>

                            </select>

                        </div>

                <div class="form-group">
                    <label>Irregularity type</label>
                    <select name="Irregularity_type" class="form-control">
                        <option value="">--- Select ---</option>
                        <?php
                        if (isset($ity)) {
                            foreach ($ity as $value) {
                        ?>
                                <option value="<?php echo $value['Irregularity_type']; ?>"> <?php echo $value['Irregularity_type']; ?> </option>
                        <?php }
                        } ?>
                    </select>
                    <?php
                    if (isset($saveTeam['Irregularity_type'])) {
                        echo $saveTeam['Irregularity_type'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="amt" class="form-control">
                    <?php
                    if (isset($saveTeam['amt'])) {
                        echo $saveTeam['amt'];
                    }
                    ?>
                </div>



                <input type="submit" name="submit" class="btn btn-info" value="Save" />
                <button type="button" class="btn btn-info" onclick="NewQTab()"><i class="fa fa-reply-all"></i>&nbsp;Generate Quarter Summary</button>
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