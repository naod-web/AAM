<?php
include "tm_header.php";

//$auditType_select = $oms->select_auditType();
//$audit_activities = $oms->select_audit_activities();
$auditee = $oms->select_auditeeA();
$Quarter_number = $oms->select_quarter_number();
$stid = $oms->select_month_year();
$yr = $oms->select_plan_year();
$audit_type = $oms->select_auditTypeq();
$con_p_name = $oms->select_contac_pr();
// $Team = $oms->select_team();
// $listAudit_select = $oms->select_auditee();
$viewM = $oms->view_annual($_SESSION['audit_type'],$_SESSION['dep_name']);
$risk_lvl = $oms->select_risk_level();
$dept_t = $oms->select_dept();
$aobjct = $oms->select_audit_objct();
// $op_area = $oms->select_audit_op();
// $risk_itm = $oms->select_risk_item();
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->annual_tm_plan($_POST);
}
if (isset($_POST['register'])) {
    $saveE = $oms->reg_audit_program_engage($_POST);
}
if (isset($_POST['edit'])) {
    $editch = $oms->edit_anual_plan($_POST);
}
if (isset($_POST['close'])) {
    $editch = $oms->cl_anual_plan($_POST);
}
if (isset($_POST['delete'])) {

    $viewAnnual = $oms->del_plan($_POST);
}

if (isset($_POST['importSubmit'])) {

		 // Allowed mime types
		 $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

		 // Validate whether selected file is a CSV file
		 if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
			 
			 // If the file is uploaded
			 if(is_uploaded_file($_FILES['file']['tmp_name'])){
				 
				 // Open uploaded CSV file with read-only mode
				 $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
				 
				 // Skip the first line
				 fgetcsv($csvFile);
				 
				 // Parse data from CSV file line by line
				 while(($line = fgetcsv($csvFile)) !== FALSE){

                    
					 // Get row data
					$query['auditee'] = $line[0];
					$query['audit_object'] = $line[1];
                    $query['dep_name'] = $line[2];
					$query['Operational_area'] = $line[3];
					$query['audit_type'] = $line[4];
					$query['risk_level'] = $line[5];
					$query['risk_score'] = $line[6];
					$query['Year'] = $line[7];
					$query['Quarter_number'] = $line[8];
					// $query['s_id'] = $line[9];
					// $query['e_id'] = $line[10];
    $oms->batch_annual_plan($query);
				 }
				 // Close opened CSV file
				 fclose($csvFile);
                 echo '<p class="text-success"><strong>Success! </strong>File uploaded </p>';
			 }else{
                 echo '<p class="text-danger"><strong>Error! </strong>File is not uploaded </p>';
			 }
		 }else{
             echo '<p class="text-danger"><strong>Error! </strong>Invalid file!</p>';
		 }
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
            <h4 class="page-header">Plan</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" ><a href=""> Audit Activities</a></button> -->

    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Create New Plan</button> &nbsp; &nbsp;
    <a href="auditee.php" class="btn btn-outline-success"><span class="glyphicon glyphicon-plus"></span>Auditee</a> &nbsp; &nbsp;
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#batch_modal"><i class="fa fa-solid fa-upload"></i>Import Batch Plan</button> &nbsp; &nbsp;
    
    
    <!-- <a href="risk_item.php" class="btn btn-outline-success"><span class="glyphicon glyphicon-plus"></span>Risk Item</a> &nbsp; &nbsp; -->
    <!-- <a href="risk_plan.php" class="btn btn-outline-success"><span class="glyphicon glyphicon-plus"></span>View Risk Item With Plan</a> &nbsp; &nbsp; -->
    <!-- <a href="team.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Team</a> -->
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleA">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <!-- <th>Serial</th> -->
                                <th>Auditee</th>
                                <th>Audit Object</th>
                                <!-- <th>Audit Type</th> -->
                                <!-- <th>Risk Item</th>
                                <th>Risk Score</th> -->
                                <th>Risk Level</th>
                                <th>Risk Score</th>
                                <th>Year</th>
                                <th>Quarter Number</th>
                                <!-- <th>Start Date</th>
                                <th>End Date</th> -->
                                <th>Add Engegment</th>
                                <th>Action</th>
                                <!-- <th>Close Plan</th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                                    Session::set("p_id", $RegValue['id']);
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['audit_object']; ?></td>
                                        <td><?php echo $RegValue['risk_level']; ?></td>
                                        <td><?php echo $RegValue['risk_score']; ?></td>
                                        <td><?php echo $RegValue['Year']; ?></td>
                                        <td><?php echo $RegValue['Quarter_number']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modalE"><span class="glyphicon glyphicon-plus"></span>Engagement</button>
                                        </td>
                                        <td>
                                            <!-- <button type="button" data-id="1" class="btn btn-default btn-view" data-toggle="modal" data-target="#myModal">View</button> -->
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-eye-open">View</span></button>
                                            <button type="submit" class="btn btn-primary editbtn1" name="edit" value="Edit Data" data-toggle="modal" data-target="#editModal3<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                        </td>
                                        

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
                                                            <label>Auditee:</label><?php echo $RegValue['auditee'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Audit Object:</label><?php echo $RegValue['audit_object'] ?>

                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Risk Level:</label><?php echo $RegValue['risk_level'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Risk Score:</label><?php echo $RegValue['risk_score'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                                <label>Year:</label><?php echo $RegValue['Year'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Quarter Number:</label><?php echo $RegValue['Quarter_number'] ?>

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
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Record -->
                                    <div class="modal fade" id="editModal3<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update the records</h5>
                                                    <div class="row">
                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">
                                                        <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                            <div class="form-group">
                                                                <label>Auditee</label>
                                                                <input type="text" name="auditee" id="audit_object" class="form-control" value="<?php echo $RegValue['auditee'] ?>" placeholder="Edit Auditee">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Audit Object</label>
                                                                <input type="text" name="audit_object" id="audit_object" class="form-control" value="<?php echo $RegValue['audit_object'] ?>" placeholder="Edit audit object">

                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Risk Level</label>
                                                                <input type="text" name="risk_level" id="risk_level" class="form-control" value="<?php echo $RegValue['risk_level'] ?>" placeholder="Edit Risk Level">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Risk Score</label>
                                                                <input type="text" name="risk_score" id="risk_score" class="form-control" value="<?php echo $RegValue['risk_score'] ?>" placeholder="Edit Risk Score">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="text" name="Year" id="Year" class="form-control" value="<?php echo $RegValue['Year'] ?>" placeholder="Edit Year">

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Quarter Number</label>
                                                                <input type="text" name="Quarter_number" id="Quarter_number" class="form-control" value="<?php echo $RegValue['Quarter_number'] ?>" placeholder="Edit Quarter number">

                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Updated by:</label>
                                                                <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

                    <!-- Modal -->


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>



<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Plan</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">

                    
                    <div class="form-group">
                            <label>Auditee</label>
                            <select name="auditee" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($auditee)) {
                                    foreach ($auditee as $value) {
                                ?>
                                        <option value="<?php echo $value['auditee']; ?>"> <?php echo $value['auditee']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['auditee'])) {
                                echo $saveM['auditee'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Audit Object</label>
                            <select name="audit_object" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($aobjct)) {
                                    foreach ($aobjct as $value) {
                                ?>
                                        <option value="<?php echo $value['audit_object']; ?>"> <?php echo $value['audit_object']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['audit_object'])) {
                                echo $savec['audit_object'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <select name="dep_name" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($dept_t)) {
                                    foreach ($dept_t as $value) {
                                ?>
                                        <option value="<?php echo $value['dep_name']; ?>"> <?php echo $value['dep_name']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Risk Level</label>
                            <select name="risk_level" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($risk_lvl)) {
                                    foreach ($risk_lvl as $value) {
                                ?>
                                        <option value="<?php echo $value['risk_level']; ?>"> <?php echo $value['risk_level']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['risk_level'])) {
                                echo $savec['risk_level'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Risk Score </label>
                            <input type="number" name="risk_score" class="form-control">
                            <?php
                            if (isset($savec['risk_score'])) {
                                echo $savec['risk_score'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <select name="Year" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($yr)) {
                                    foreach ($yr as $value) {
                                ?>
                                        <option value="<?php echo $value['year']; ?>"> <?php echo $value['year']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Year'])) {
                                echo $saveM['Year'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Quarter Number</label>
                            <select name="Quarter_number" class="form-control">
                                <option value="">--- Enter Quarter Number ---</option>
                                <?php
                                if (isset($Quarter_number)) {
                                    foreach ($Quarter_number as $value) {
                                ?>
                                        <option value="<?php echo $value['Quarter_number']; ?>"> <?php echo $value['Quarter_number']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['Quarter_number'])) {
                                echo $saveM['Quarter_number'];
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">
                          <label>Start Date</label>
                                <input type="date" name="s_id" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy">

                            </div>
                        <div class="form-group">
                         <label>End Date</label>
                                <input type="date" name="e_id" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy">

                            </div> -->

                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info" value="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="batch_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Import batch plan</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                   
                    
                    <div class="form-group">
                        
            <input type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                        </div>


                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
            
                    <button type="submit" name="importSubmit" class="btn btn-info" value="IMPORT"><span class="glyphicon glyphicon-import"></span> IMPORT</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>
<div class="modal fade" id="form_modalE" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h5 class="modal-title">Audit Work/Engagement Creation</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <!-- <div class="form-group">
                            <label>Quarter Plan</label>
                            <input type='text' name="q_id" id='q_id' class='form-control' placeholder='Enter id' onkeyup="GetDetail(this.value)" value="">
                        </div> -->
                        <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                        <input type="hidden" name="p_id" id="id" value="<?php echo $RegValue['id'] ?>">
                        <!-- <input type="hidden" name="dep_name" id="dep_name" value=""> -->
                        
                        <div class="form-group">
                            <label>Plan ID:</label>
                            <input type="text" name="p_id" id="p_id" class="form-control" value="<?php echo $RegValue['id'] ?>" readonly="readonly">
                                </div>
                        <div class="form-group">
                        <div class="form-group">
                            <label>Department:</label>
                            <input type="text" name="dep_name" id="dep_name" class="form-control" value="<?php echo $RegValue['dep_name'] ?>" readonly="readonly">
                                </div>
                        <div class="form-group">
                            <label>Auditee:</label>
                                <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $RegValue['auditee'] ?>" readonly="readonly">
                                <?php
                            if (isset($saveReg['auditee'])) {
                                echo $saveReg['auditee'];
                            }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label>Engagement Description</label>
                            <textarea name="Description" type="text" class="form-control"></textarea>
                            <!-- <textarea rows="4" class="form-control summernote" name="Description"></textarea> -->
                            <!-- <textarea name="Description" type="text" class="form-control"></textarea> -->
                            <!-- <input type="text" name="Description" class="form-control"> -->

                        </div>

                        <div class="form-group">
                            <label>Expected Start Date</label>
                            <input type="date" name="S_date" class="form-control">
                            <?php
                            if (isset($saveReg['S_date'])) {
                                echo $saveReg['S_date'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Expected End Date</label>
                            <input type="date" name="E_date" class="form-control">
                            <?php
                            if (isset($saveReg['E_date'])) {
                                echo $saveReg['E_date'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Assign Contact person</label>
                                <select name="Auditor_in_charge" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($con_p_name)) {
                                    foreach ($con_p_name as $value) {
                                ?>
                                        <option value="<?php echo $value['name']; ?>"> <?php echo $value['name']; ?> </option>
                                <?php }
                                } ?>
                                </select>
                                <?php
                                if (isset($saveReg['Auditor_in_charge'])) {
                                    echo $saveReg['Auditor_in_charge'];
                                }
                                ?>
                        </div>

                    </div>
                    
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="register" class="btn btn-info" value="register"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>