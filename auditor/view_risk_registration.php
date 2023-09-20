<?php

include 'aud_header.php';

$viewregR = $oms->view_rR();

if (isset($_POST['submit'])) {

    $edQuarter = $oms->edit_monthly($_POST);
}
if (isset($_POST['delete'])) {

    $delAnnual = $oms->del_monthly($_POST);
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
            <h4 class="page-header">Registered Risk</h4>
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
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
                                <!-- <th>Control List</th>
                                <th>Rectification</th> -->


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewregR) {
                                foreach ($viewregR as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['Business_objective']; ?></td>
                                        <td><?php echo $RegValue['Business_owner']; ?></td>
                                        <td><?php echo $RegValue['Risk_list']; ?></td>
                                        <td><?php echo $RegValue['Likely_hood']; ?></td>
                                        <td><?php echo $RegValue['Risk_level']; ?></td>
                                        <td><?php echo $RegValue['Impact_description']; ?></td>

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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>