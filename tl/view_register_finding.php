<?php
include "tl_header.php";


$viewfR = $oms->view_findR();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->reg_finding($_POST);
}

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h3 class="page-header">Findings</h3>
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



                                <th>Condition</th>
                                <th>Control</th>
                                <th>Cause</th>
                                <th>Effect</th>
                                <th>Recommendation</th>
                                <th>Rectification</th>




                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewfR) {
                                foreach ($viewfR as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['Condtion']; ?></td>
                                        <td><?php echo $chValue['Control']; ?></td>
                                        <td><?php echo $chValue['Cause']; ?></td>
                                        <td><?php echo $chValue['Effect']; ?></td>
                                        <td><?php echo $chValue['Recommendation']; ?></td>
                                        <td><?php echo $chValue['Rect']; ?></td>
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