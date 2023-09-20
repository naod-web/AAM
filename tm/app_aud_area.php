<?php
include "tm_header.php";



$viewEn = $oms->view_audit_area();





?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header">List of Approved auditable area</h5>
            <a href="app_aud_area.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
            <a href="app_aud_area.php" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Audit Object ID</th>
                                <th>Audit Object Name</th>
                                <th>Operational Area</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewEn) {
                                foreach ($viewEn as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['id']; ?></td>
                                        <td><?php echo $chValue['aoid']; ?></td>
                                        <td><?php echo $chValue['audit_object']; ?></td>
                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                        <td><?php echo $chValue['Approval']; ?></td>
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


<?php
include "footer.php";
?>