<?php
include "u_header.php";

$viewAuditwork = $oms->view_finding_registration($_POST);


?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            <h5 class="page-header">Approve Audit Program</h5>
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



                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <th>Finding number</th>

                                <th>Facts</th>

                                <th>Cause</th>
                                <th>Effect</th>
                                <th>Internal_control</th>
                                <th>recommendation</th>
                                <th>Resp</th>
                                <th>Auditor Justification</th>
                                <th>Acceptance_Status</th>
                                <th>Accept</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditwork) {
                                foreach ($viewAuditwork as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['operational_area']; ?></td>

                                        <td><?php echo $RegValue['Finding_number']; ?></td>

                                        <td><?php echo $RegValue['Facts']; ?></td>

                                        <td><?php echo $RegValue['cause']; ?></td>
                                        <td><?php echo $RegValue['effect']; ?></td>
                                        <td><?php echo $RegValue['Internal_control']; ?></td>
                                        <td><?php echo $RegValue['recommendation']; ?></td>
                                        <td><?php echo $RegValue['Resp']; ?></td>
                                        <td><?php echo $RegValue['auditor_justification']; ?></td>
                                        <td><?php echo $RegValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $RegValue['accept']; ?></td>


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