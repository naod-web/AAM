<?php
include "tl_header.php";

$viewAuditwork = $oms->view_audit_program($_POST);


?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            <h3 class="page-header">Approved Audit Programs</h3>
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



                                <th>Engagement ID</th>
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>

                                <th>Previous Audit</th>

                                <th>Total Working Days</th>
                                <th>Approve</th>
                                <!-- <th>Comment</th> -->


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditwork) {
                                foreach ($viewAuditwork as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['Objective']; ?></td>

                                        <td><?php echo $RegValue['Scope']; ?></td>

                                        <td><?php echo $RegValue['Status']; ?></td>

                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td><?php echo $RegValue['Approval']; ?></td>

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