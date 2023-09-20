<?php
include "aud_header.php";

$viewAuditwork = $oms->view_audit_program();
$op_area = $oms->select_audit_op();


$viewM = $oms->select_aud_prog_wbs($_SESSION['audit_type']);

if (isset($_POST['submit'])) {
    $viewAuditwork = $oms->edit_audit_prog_engageA($_POST);
}

if (isset($_POST['save'])) {
    $saveE = $oms->Finding_Registration($_POST);
}

if (isset($_POST['reg_auditprog'])) {
  
    $saveReg = $oms->regBreakdown($_POST);
}
if (isset($_POST['edit_AP'])) {
    // $register = $oms->reg_finding($data);
    $saveReg = $oms->edit_auditprogram($_POST);
}
if (isset($_POST['delete'])) {

    $delch = $oms->del_audit_prog_engagement();
}
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            <h5 class="page-header">Audit program and Finding registration work</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <!-- <th>#ID</th> -->
                                <th>Engagement ID</th>
                                <th>Auditee</th>
                                <th>Objective of Audit</th>
                                <th>Scope of Audit</th>
                                <th>Previous Audit</th>
                                <th>Total Working Date</th>
                                <th>Auditee Department</th>
                                <th>View Breakdown detail</th>
                                <?php
                                        if($_SESSION['user_type'] != 'Other'){
                                            ?>
                                <th>Finding</th>
                                <th>Breakdown</th>

                                <!-- <th>Status</th> -->
                                <?php
                                        }
                                        else{
                                            ?>

                                <?php
                                        }
                                        ?>

                                <th>Action</th>
                                <!-- <th>Allow Visibility</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewAuditwork) {
                                foreach ($viewAuditwork as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        
                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Objective']; ?></td>
                                        <td><?php echo $RegValue['Scope']; ?></td>
                                        <td><?php echo $RegValue['Status']; ?></td>
                                        <td><?php echo $RegValue['total']; ?></td>
                                        <td><?php echo $RegValue['dep_name']; ?></td>
                                        <td>
                                        <form method="post" action="wbd_detail.php">
                                            <input type="hidden" name="E_id" id="E_id" value="<?php echo $RegValue['E_id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn"><i class="fa fa-solid fa-binoculars"></i>View WBS</span></button>
                                        </form>
                                        </td>
                                        <?php
                                        if($RegValue['Approval']=='Approved' && $_SESSION['user_type'] != 'Other'){
                                            ?>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm editbtn" data-toggle="modal" data-target="#editModalF<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-plus"></span>Register Finding</button>

                                            </td><?php

                                        }
                                        else{
                                            ?>
                                            <td></td>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if($_SESSION['user_type'] != 'Other'){
                                            ?>
                                        <td>
                                        <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal3<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-pen">Add Breakdown</span></button>
                                        </td>
                                        <!-- <td> Approval </td> -->
                                        <td>
                                                <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $RegValue['id'] ?>"><i class="fa fa-solid fa-binoculars"></i>View</span></button>
                                                <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>
                                                <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                        </td>
                                        
                                        <?php
                                        }
                                        else{
                                            ?>
                                            <td><?php echo $RegValue['Approval']; ?></td>
                                           <?php

                                        }
                                        ?>

                                    </tr>
                                     <!-- View Modal for each Record -->
                                    <div class="modal fade" id="editModal2<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-file"></i>View record detail</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Plan ID:</label><?php echo $RegValue['id'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Engagement ID:</label><?php echo $RegValue['E_id'] ?>

                                                        </div>
                                                    <div class="form-group">
                                                            <label>Auditee:</label><?php echo $RegValue['auditee'] ?>

                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Audit Objective:</label><?php echo $RegValue['Objective'] ?>

                                                        </div>
                                                            <div class="form-group">
                                                                <label>Previous Audit Status:</label><?php echo $RegValue['Status'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Total Working Day:</label><?php echo $RegValue['total'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditee Department:</label><?php echo $RegValue['dep_name'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status:</label><?php echo $RegValue['Approval'] ?>

                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                    <!-- <a href="engagement.php" class="btn btn-outline-success" data-target="#form_modalE"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</a> &nbsp; &nbsp; -->

                                            <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modalE--id should be inserted here"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</button> -->
                                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- ========Delete Modal======== -->
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

                                                        <button type="submit" name="delete" class="btn btn-info" value="delete">Yes</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editModalF<?php echo $RegValue['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Finding Registration</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                        <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                        <input type="hidden" name="dep_name" id="dep_name" value="<?php echo $RegValue['dep_name'] ?>">
                                                        <input type="hidden" value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly" >
                                                        <!-- <input type="hidden" value="<?php echo $RegValue['E_id'] ?>" class="form-control" readonly="readonly" > -->
                                                            <div class="form-group">
                                                                <label>Engagement ID</label> 
                                                                <input type="text" name="E_id" id="id" class="form-control" value="<?php echo $RegValue['E_id'] ?> " readonly="readonly" >
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditee:</label>
                                                                    <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $RegValue['auditee'] ?>" readonly="readonly" >
                                                                
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Operational_area</label>
                                                                <select name="Operational_area" class="form-control">
                                                                    <option value="">--- Select ---</option>
                                                                    <?php
                                                                    if (isset($op_area)) {
                                                                        foreach ($op_area as $value) {
                                                                    ?>
                                                                            <option value="<?php echo $value['Operational_area']; ?>"> <?php echo $value['Operational_area']; ?> </option>
                                                                    <?php }
                                                                    } ?>
                                                                </select>
                                                                <?php
                                                                if (isset($savec['Operational_area'])) {
                                                                    echo $savec['Operational_area'];
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Facts</label>
                                                                <textarea name="Facts" class="form-control" rows="3"></textarea>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea name="Description" type="text" class="form-control"></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Criteria</label>
                                                                <textarea name="criteria" type="text" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Cause</label>
                                                                <textarea name="cause" type="text" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Effect</label>
                                                                <textarea name="effect" type="text" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Existing Internal Control</label>
                                                                <textarea name="Internal_control" class="form-control" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Recommendation</label>
                                                                <textarea name="recommendation" type="text" class="form-control" id="editor4"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditor Conclusion/ Justification</label>
                                                                <textarea name="auditor_justification" type="text" class="form-control"></textarea>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Auditor Name</label>
                                                                <input value="" class="form-control">

                                                            </div> -->
                                                            <div class="form-group">
                                                                <label>Attachment</label>
                                                                <input type="file" name="file" class="form-control">

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div style="clear:both;"></div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" name="save" class="btn btn-info fa fa-upload fw-fa"> Register Findings and Upload</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- ---------------------edit modal-------------------- -->
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modify and Update Audit Program</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">

                                                        <div class="form-group">
                                                            <label>Engagement ID</label>
                                                            <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $RegValue['E_id'] ?>" placeholder="Enter Engagement Unique value" >

                                                        </div>
                                                        <div class="form-group">
                                                            <label> Auditee</label>
                                                            <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $RegValue['auditee'] ?>" placeholder="modify auditee">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Objective Audit</label>
                                                            <input type="text" name="Objective" id="Objective" class="form-control" value="<?php echo $RegValue['Objective'] ?>" placeholder="modify Audit Objective">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Scope</label>
                                                            <input type="text" name="Scope" id="Scope" class="form-control" value="<?php echo $RegValue['Scope'] ?>" placeholder="modify Audit Scope">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Previous Audit Status</label>
                                                            <input type="text" name="Status" id="Status" value="<?php echo $RegValue['Status'] ?>" class="form-control" placeholder="modify Previous Audit Status">

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Total Working Days</label>
                                                            <input type="text" name="total" id="total" value="<?php echo $RegValue['total'] ?>" class="form-control" placeholder="Modify Total Working Days">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit_AP" class="btn btn-info" value="edit_AP">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Work breakdown -->
                                    <div class="modal fade" id="editModal3<?php echo $RegValue['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" action="#">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Breakdown Audit program</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-2"></div>
                                                            <input type="hidden" name="E_id" id="E_id" class="form-control" value="<?php echo $RegValue['E_id'] ?>">
                                                            <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                            <div class="col-md-8">

                                                                <div class="form-group">
                                                                    <label>Auditable Area</label>
                                                                    <select name="Operational_area" class="form-control">
                                                                        <option value="">--- Select ---</option>
                                                                        <?php
                                                                        if (isset($op_area)) {
                                                                            foreach ($op_area as $value) {
                                                                        ?>
                                                                                <option value="<?php echo $value['Operational_area']; ?>"> <?php echo $value['Operational_area']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($saveReg['Operational_area'])) {
                                                                        echo $saveReg['Operational_area'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label>Start Date</label>
                                                                        <input type="date" name="S_date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="enter the start time">
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label>Start Date</label>
                                                                        <input type="date" name="S_date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="enter start day">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>End Date</label>
                                                                        <input type="date" name="E_date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="enter end day">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div class="modal-footer">
                                                        <button type="submit" name="reg_auditprog" class="btn btn-info" value="reg_auditprog">OK</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- View WBS -->

                                        <div class="modal fade" id="editModal5<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-file"></i>View record detail</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
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

<div class="modal fade" id="editModal5<?php echo $RegValue['id'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="dialog">
         <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title">View WBS per engagement</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body modal-xl">
            <div class="panel-body" width="100%">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-examplebwbs">
                    <thead>
                        <tr>
                            <th>#EID</th>
                            <th>OperationalArea</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $RegValue['E_id']; ?></td>
                                    <td><?php echo $RegValue['Operational_area']; ?></td>
                                    <td><?php echo $RegValue['S_date']; ?></td>
                                    <td><?php echo $RegValue['E_date']; ?></td>
                                </tr>
                                    <?php
                                    }
                                    }
                                    ?>
                    </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>