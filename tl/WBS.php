<?php
include "tl_header.php";
$E_id = $oms->select_engagement_id();
// $t_id = $oms->select_task_id();
if (isset($_POST['Submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->wbs($_POST);
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
            <h4 class="page-header">WBS</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">

        <div class="col-sm-10">
            <form role="form" method="post">
                <section class="col-sm-6">
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
                </section>

                <section class="col-sm-6">
                    <div class="form-group">
                        <label>Task Name</label>
                        <input type="text" name="Task_name" class="form-control">
                        <?php
                        if (isset($saveReg['Task_name'])) {
                            echo $saveReg['Task_name'];
                        }
                        ?>
                    </div>
                </section>
                <section class="col-sm-6">
                    <div class="form-group">
                        <label>Task Start time</label>
                        <input type="time" name="S_date" class="form-control">
                        <?php
                        if (isset($saveReg['S_date'])) {
                            echo $saveReg['S_date'];
                        }
                        ?>
                    </div>
                </section>
                <section class="col-sm-6">
                    <div class="form-group">
                        <label>End time</label>
                        <input type="time" name="E_date" class="form-control">
                        <?php
                        if (isset($saveReg['E_date'])) {
                            echo $saveReg['E_date'];
                        }
                        ?>
                    </div>
                </section>
                <!-- <div class="form-group">
                    <label>Duration</label>
                    <input type="text" name="Duration" class="form-control">
                    
                </div> -->


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