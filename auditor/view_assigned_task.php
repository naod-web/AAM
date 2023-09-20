<?php
include "aud_header.php";


$viewch = $oms->view_tt();

if (isset($_POST['save-ts'])) {
    $saveTask = $oms->save_ts($_POST);
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>



                                <th>Audit Type</th>
                                <th>Task Details</th>
                                <th>Assigned Team</th>
                                <th>Start Date</th>
                                <th>End Date</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['Audit_type']; ?></td>
                                        <td><?php echo $chValue['task_details']; ?></td>
                                        <td><?php echo $chValue['Team']; ?></td>

                                        <td><?php echo $chValue['start_date']; ?></td>
                                        <td><?php echo $chValue['end_date']; ?></td>

                                    </tr>

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


<?php
include "footer.php";
?>