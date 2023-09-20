<?php

include 'tm_header.php';


$viewES = $oms->view_quarter_summary();




?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header">Approve Quarter Executive Report Summary</h4>
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

                                <th>SN</th>
                                <th>Auditee</th>
                                <th>Irregularity Type</th>
                                <th>Amount</th>
                                <th>Total</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewES) {
                                foreach ($viewES as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['serial']; ?></td>

                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Irregularity_type']; ?></td>
                                        <td><?php echo $RegValue['amt']; ?></td>
                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td><?php echo $RegValue['approve']; ?></td>

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