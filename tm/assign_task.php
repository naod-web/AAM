<?php
include "tm_header.php";


$viewch = $oms->view_tt();
$Team = $oms->select_team();
$Audit_type = $oms->select_auditType();

if (isset($_POST['save-ts'])) {
    $saveTask = $oms->save_ts($_POST);
}
if (isset($_POST['delete'])) {

    $delch = $oms->del_tt();
}
?>

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h4 class="page-header">Assigned Task</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>New Task</button>
    <div class="row">
        <div class="col-sm-10">


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>



                                <th>Audit_type</th>
                                <th>Task Details</th>
                                <th>Assigned Team</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Operation</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['Audit_type']; ?></td>
                                        <td><?php echo $chValue['Team']; ?></td>
                                        <td><?php echo $chValue['task_details']; ?></td>

                                        <td><?php echo $chValue['start_date']; ?></td>
                                        <td><?php echo $chValue['end_date']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>">Delete &nbsp;<span class="glyphicon glyphicon-trash"></span></button>

                                        </td>
                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $chValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $chValue['id'] ?>">

                                                        <h4> Are You sure to delete this content!!</h4>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>



<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h3 class="modal-title">Assign Task</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Task Name/Audit type</label>
                            <select name="Audit_type" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($Audit_type)) {
                                    foreach ($Audit_type as $DeValue) {
                                ?>
                                        <option value="<?php echo $DeValue['Audit_type']; ?>"> <?php echo $DeValue['Audit_type']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Audit_type'])) {
                                echo $saveM['Audit_type'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Assigned Team</label>
                            <select name="Team" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($Team)) {
                                    foreach ($Team as $DeValue) {
                                ?>
                                        <option value="<?php echo $DeValue['Team']; ?>"> <?php echo $DeValue['Team']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Team'])) {
                                echo $saveM['Team'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Task Details</label>
                            <textarea name="task_details" class="form-control" rows="3"></textarea>
                        </div>
                        <section class="col-sm-6">
                            <div class="form-group">
                                <label>Start date</label>
                                <input type="Date" name="start_date" class="form-control">
                                <?php
                                if (isset($saveReg['start_date'])) {
                                    echo $saveReg['Start_date'];
                                }
                                ?>
                            </div>
                        </section>
                        <section class="col-sm-6">
                            <div class="form-group">
                                <label>End date</label>
                                <input type="Date" name="end_date" class="form-control">
                                <?php
                                if (isset($saveReg['end_date'])) {
                                    echo $saveReg['end_date'];
                                }
                                ?>
                            </div>
                        </section>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="save-ts" class="btn btn-info" value="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>