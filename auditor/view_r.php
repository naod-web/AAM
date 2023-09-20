<?php

include 'aud_header.php';


$viewReg = $oms->view_fr();

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h1 class="page-header">Risk Finding Result</h1>
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

                                <th>Employee Name</th>
                                <th>Details</th>
                                <th>Comment</th>
                                <th>Operations</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewReg) {
                                foreach ($viewReg as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['Employee_name']; ?></td>
                                        <td><?php echo $RegValue['Detail']; ?></td>
                                        <td><?php echo $RegValue['Comment']; ?></td>


                                        <td><a href="edit-employee.php?edit_id=<?php echo $EmpValue['id']; ?>" class="btn btn-success btn-xs">Edit</a> <a href="edit-employee.php?delete_id=<?php echo $EmpValue['id']; ?>" class="btn btn-danger btn-xs">Delete</a></td>
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