<?php

include 'header.php';


$viewES = $oms->view_quarter_summary();

if (isset($_POST['submit'])) {


    $saveTeam = $oms->quarter_summary($_POST);
}
if (isset($_POST['edit'])) {
    $edQuarter = $oms->edit_quarterExec_summary($_POST);
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
                                <th>Operation</th>


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
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"> Approve</button>

                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Executive Quarter Plan Summary</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">
                                                        <?php
                                                        if (isset($saveReg['id'])) {
                                                            echo $saveReg['id'];
                                                        }
                                                        ?>


                                                        <div class="form-group">
                                                            <label>Approve</label>
                                                            <input type="text" name="approve" id="total" value="<?php echo $RegValue['approve'] ?>" class="form-control" placeholder="Enter Approval">
                                                            <?php
                                                            if (isset($saveReg['approve'])) {
                                                                echo $saveReg['approve'];
                                                            }
                                                            ?>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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