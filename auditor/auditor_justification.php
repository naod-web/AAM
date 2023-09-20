<?php
include "aud_header.php";



if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->auditor_justification($_POST);
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
            <h4 class="page-header">Add Auditor Justification</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">
                <div class="form-group">
                    <label>Auditor Justifiction</label>
                    <textarea name="auditor_justification" type="text" class="form-control" id="editorCause"></textarea>
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