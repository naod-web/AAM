<?php
include "u_header.php";
$viewAuditee_resp = $oms->view_rectification($_SESSION['name']);

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAR['su'])) {
                echo $saveAR['su'];
            }
            ?>
            <h4 class="page-header">Rectification Status</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- <div>
                    <input type="text" id="filter" name="filter" autofocus="true" placeholder="Filter by keyword" />

                    <input type="submit" id="btnFilter" name="btnFilter" value="Go" />

                    <input type="submit" id="btnClear" name="btnClear" value="clearBtn" />
                </div> -->
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>

                                <th>FID</th>
                                <th>Auditee</th>
                                <th>Rectification Status</th>
                                <th>Action</th>
                                <th>Auditee Response/Feedback</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditee_resp) {
                                foreach ($viewAuditee_resp as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['F_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Acceptance_Status']; ?></td>
                                        <td><?php echo $RegValue['action']; ?></td>
                                        <td><?php echo $RegValue['rectification']; ?></td>
                                        <td>
                                        <form method="post" action="rect_detail.php">
                                            <input type="hidden" name="F_id" id="F_id" value="<?php echo $RegValue['F_id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn"><i class="fa fa-solid fa-binoculars"></i>View Detail Rectification </span></button>
                                        </form>
                                        </td>
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