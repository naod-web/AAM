<?php
include "tm_header.php";
if (isset($_POST['create'])) {
    $save_team = $oms->add_plan_year($_POST);
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
            <h5 class="page-header">Plan year</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create Active Plan year</button>
    <div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h5 class="modal-title">Plan Year Creation</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                            <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control">
                            <?php
                            if (isset($saveImp['year'])) {
                                echo $saveImp['year'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="create" class="btn btn-info" value="create"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>