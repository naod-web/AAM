<?php
include "u_header.php";

$viewau = $oms->select_auditee_response();

?>


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header">View Auditee Response</h5>
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleUP">
                        <thead>
                            <tr>
                            <th>#ID</th>
                                <th>FID</th>
                                <th>Auditee</th>
                                <th>Acceptance Status</th>
                                <th>Response</th>
                                <th>Response Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewau) {
                                foreach ($viewau as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                    <td><?php echo $RegValue['id'];?></td>
                                        <td><?php echo $RegValue['F_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['accept']; ?></td>
                                        <td><?php echo $RegValue['resp']; ?></td>
                                        <td><?php echo $RegValue['r_status']; ?></td>
                                        <td>
                                        <form method="post" action="resp_detail.php">
                                            <input type="hidden" name="F_id" id="F_id" value="<?php echo $RegValue['F_id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn"><i class="fa fa-solid fa-binoculars"></i>View Detail Response </span></button>
                                        </form>
                                        </td>
                                    </tr>
                                        <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal -->


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