<?php

include 'header.php';


$viewES = $oms->view_report_summary();

if (isset($_POST['submit'])) {


    $saveTeam = $oms->save_report_summary($_POST);
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
            <h4 class="page-header">Report Summary</h4>
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



                                <th>Intro</th>
                                <th>Audit Objective</th>
                                <th>Methodology</th>
                                <th>Audit Scope</th>
                                <th>Sampling Technique</th>
                                <th>Rating</th>
                                <th>Summary</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewES) {
                                foreach ($viewES as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['intro']; ?></td>
                                        <td><?php echo $RegValue['objective']; ?></td>
                                        <td><?php echo $RegValue['methodology']; ?></td>
                                        <td><?php echo $RegValue['scope']; ?></td>
                                        <td><?php echo $RegValue['technique']; ?></td>
                                        <td><?php echo $RegValue['rating']; ?></td>
                                        <td><?php echo $RegValue['summary']; ?></td>

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