<?php
include "u_header.php";


$viewM = $oms->view_rR();

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header">Registered Risk</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Register Risk</button> -->
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
                                <th>Business Objective</th>
                                <th>Business Owner</th>
                                <th>Risk List</th>
                                <th>Likely hood</th>
                                <th>Risk Level</th>
                                <th>Impact Description</th>
                                <th>Control List</th>
                                <th>Rectification</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['Business_objective']; ?></td>
                                        <td><?php echo $RegValue['Business_owner']; ?></td>
                                        <td><?php echo $RegValue['Risk_list']; ?></td>
                                        <td><?php echo $RegValue['Likely_hood']; ?></td>
                                        <td><?php echo $RegValue['Risk_level']; ?></td>
                                        <td><?php echo $RegValue['Impact_description']; ?></td>
                                        <td><?php echo $RegValue['Control_list']; ?></td>
                                        <td><?php echo $RegValue['Rect']; ?></td>

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