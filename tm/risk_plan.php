<?php
include "tm_header.php";

$viewM = $oms->select_plan_risk();

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header"><a href="view_annualplan.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;View Risk Item with plan &nbsp </h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
                                <th>ID</th>
                                <th>Plan ID</th>
                                <th>Risk Item</th>
                                <th>likely</th>
                                <th>impact</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['plan_id']; ?></td>
                                        <td><?php echo $RegValue['risk_item']; ?></td>
                                        <td><?php echo $RegValue['likely']; ?></td>
                                        <td><?php echo $RegValue['impact']; ?></td>
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
<?php
include "footer.php";
?>