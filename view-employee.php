<?php

include 'header.php';
$desig_select = $oms->select_designation();
$viewImp = $oms->view_employee();
if (isset($_POST['submit'])) {


    $viewAnnual = $oms->edit_employee();
}
if (isset($_POST['delete'])) {

    $delAnnual = $oms->del_emp();
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveImp['su'])) {
                echo $saveImp['su'];
            }
            ?>
            <h4 class="page-header">View User</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- <div class="col-lg-4">
                    <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                </div> -->
                <div class="panel-heading">
                    Employee List Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <!-- <th>Designation</th> -->
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Email</th>
                                <!-- <th>Username</th> -->


                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewImp) {
                                foreach ($viewImp as $EmpValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $EmpValue['name']; ?></td>
                                       

                                        <td><?php echo $EmpValue['phone']; ?></td>
                                        <td><?php echo $EmpValue['joining_date']; ?></td>
                                        <td><?php echo $EmpValue['email']; ?></td>
                                        
                                        <!-- Add additional field as a local field that hold (username) if it is needed -->



                                        <td>
                                        <!-- <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $EmpValue['id']; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button> -->
                                            
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $EmpValue['id'] ?>"><span class="glyphicon glyphicon-eye-open">View</span></button>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal<?php echo $EmpValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $EmpValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                        </td>
                                    </tr>
                                    
                                    <!-- View Modal for each Record -->
                                    <div class="modal fade" id="editModal2<?php echo $EmpValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-user"></i>View Employee record</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <label>Full Name:</label><?php echo $EmpValue['name'] ?>

                                                        </div>
                                                        
                                                        <!-- <div class="form-group">
                                                            <label>Designation or Position</label>
                                                            <input type="text" name="designation" id="designation" value="<?php echo $EmpValue['designation'] ?>" class="form-control" placeholder="Enter designation">

                                                        </div> -->

                                                        <div class="form-group">
                                                            <label>Phone:</label><?php echo $EmpValue['phone'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Joining Date:</label><?php echo $EmpValue['joining_date'] ?>

                                                        </div>
                                        
                                                        <div class="form-group">
                                                            <label>email:</label><?php echo $EmpValue['email'] ?>

                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label>Audit type:</label><?php echo $EmpValue['audit_type'] ?>

                                                        </div> -->
                                                    </div>
                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        
                                                    </div> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal<?php echo $EmpValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $EmpValue['id']; ?>">
                                                        <?php
                                                        if (isset($saveImp['id'])) {
                                                            echo $saveImp['id'];
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $EmpValue['name'] ?>" placeholder="Enter Name">

                                                        </div>
                                                        
                                                        <!-- <div class="form-group">
                                                            <label>Designation or Position</label>
                                                            <input type="text" name="designation" id="designation" value="<?php echo $EmpValue['designation'] ?>" class="form-control" placeholder="Enter designation">

                                                        </div> -->

                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input type="text" name="Phone" id="phone" value="<?php echo $EmpValue['phone'] ?>" class="form-control" placeholder="Enter phone">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Joining Date</label>
                                                            <input type="text" name="joining_date" id="joining_date" value="<?php echo $EmpValue['joining_date'] ?>" class="form-control" placeholder="mm-dd-yyyy">

                                                        </div>

                                                        <div class="form-group">
                                                            <label>email</label>
                                                            <input type="text" name="email" id="email" value="<?php echo $EmpValue['email'] ?>" class="form-control" placeholder="Enter email">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" name="username" id="username" value="<?php echo $EmpValue['username'] ?>" class="form-control" placeholder="Enter Address">

                                                        </div>
                                                        


                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $EmpValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $EmpValue['id'] ?>">
                                                        <?php
                                                        if (isset($saveReg['id'])) {
                                                            echo $saveReg['id'];
                                                        }
                                                        ?>
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