<?php

include 'tm_header.php';


$viewES = $oms->view_quarter_summary();

if (isset($_POST['edit'])) {

    $viewAnnual = $oms->modify_quarter_summary($_POST);
}
if (isset($_POST['delete'])) {

    $delAnnual = $oms->del_quarterExec_summary($_POST);
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
            <h4 class="page-header">Modify Quarter Executive Report Summary</h4>
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
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
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"> <span class="glyphicon glyphicon-edit"></span>Edit</button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>
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


                                                        <div class="form-group">
                                                            <label>SN</label>
                                                            <input type="text" name="serial" id="serial" class="form-control" value="<?php echo $RegValue['serial'] ?>" placeholder="Enter Serial Number">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Auditee</label>
                                                            <input type="text" name="auditee" id="auditee" class="form-control" data-date-format="mm-dd-yyyy" value="<?php echo $RegValue['auditee'] ?>" placeholder="Enter Auditee name">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Irregularity Type</label>
                                                            <input type="text" name="Irregularity_type" id="Irregularity_type" value="<?php echo $RegValue['Irregularity_type'] ?>" class="form-control" placeholder="Enter Irregularity Type">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Amount</label>
                                                            <input type="text" name="amt" id="amt" value="<?php echo $RegValue['amt'] ?>" class="form-control" placeholder="Enter Amount">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Total</label>
                                                            <input type="text" name="total" id="total" value="<?php echo $RegValue['total'] ?>" class="form-control" placeholder="Enter Total amount">

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

                                    <!-- --------------------Delete Modal------------------------ -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $RegValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $RegValue['id'] ?>">

                                                        <h4> Are You sure to delete this content!!</h4>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
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