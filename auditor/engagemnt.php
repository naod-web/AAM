<?php
include "aud_header.php";

// $auditeeList = $oms->select_auditee();
//$quarter_plan = $oms->select_quarter_plan();
$viewintrL = $oms->view_findingDetail();
$viewWBS = $oms->view_bwbs();
$E_id = $oms->select_engagement_id();
$F_id = $oms->select_Finding_number();
$aud_name = $oms->select_auditor_name();
// $viewfr = $oms->view_engagement();
// $viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();
$Eid = $oms->select_engagement_id();
$con_p_name = $oms->select_contac_p();
$con_p_nam = $oms->select_contac_pre();
// $adt = $oms->select_auditee();
$rectificationList = $oms->select_rectification();
$acceptList = $oms->select_acceptance();
$Shared_EId = $oms->temp_team_byName($_SESSION['name']);
$Shared_EId_array = array();
array_push($Shared_EId_array, -1);
foreach ($Shared_EId as $chValue) {

    array_push($Shared_EId_array, $chValue['E_id']);
}
// Session::set('Shared_EId',$Shared_EId_array);
$viewEn = array();
$viewTA=null;
		$user_type=$_SESSION['user_type'];
		if($user_type == 'Other')
		{
            $viewEn = $oms->view_engagement($_SESSION['dep_name']);
        }
        else{

            $viewEn = $oms->view_engagementTeam();
        }
    //  $viewTA = $oms->view_teamA();
    // $countResult = count($viewTA);
    // if( $countResult >0)
    // {
    //     $count=0;
    //     foreach ($viewTA as $teamEID) {
          
    //         $count++;
    //     }
    //     echo $count;
    // }





$chk_num = $oms->select_chk();
// $tm = $oms->select_team();
// $qpid = $oms->select_quarter_plan();
// $mpid = $oms->select_monthly_plan();
$p_id = $oms->select_planid();





if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);
    $saveReg = $oms->reg_audit_prog_engage($_POST);
}


if (isset($_POST['delete'])) {

    $delch = $oms->del_audit_program_engagement();
}




?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h5 class="page-header">Audit Work/ Engagement</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
    <div class="col-auto float-right ml-auto">
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>
                                <!-- <th>Engagement ID</th>
                                <th>Plan ID</th> -->
                                <th>#ID</th>
                                <th>Plan ID</th>
                                <th>Auditee</th>
                                <!-- <th>Audit type</th> -->
                                <th>Engagement Description</th>
                                <th>Assignment Date</th>
                                <th>Expected Start Date</th>
                                <th>Expected End Date</th>
                                <!-- <th>Expected End Date</th> -->
                                <!-- <th>Checklist Number</th>
                                <th>Additional Checklist</th> -->
                                <?php
                                        if($_SESSION['user_type'] != 'Other'){
                                            ?>
                                <th>Audit Program</th>
                                <?php
                                        }
                                        ?>
                                        <th>View Audit Program</th>
                                        <th>View Finding</th>
                                <!-- <th>Finding Registration</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $EId_array = array();
                                array_push($EId_array, -1);
                            if ($viewEn) {
                                foreach ($viewEn as $chValue) {
                                    array_push($EId_array, $chValue['id']);
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['id']; ?></td>
                                        <td><?php echo $chValue['p_id']; ?></td>
                                        <td><?php echo $chValue['auditee']; ?></td>
                                        <td><?php echo $chValue['Description']; ?></td>
                                        <td><?php echo $chValue['Assignment_date']; ?></td>
                                        <td><?php echo $chValue['S_date']; ?></td>
                                        <td><?php echo $chValue['E_date']; ?></td>
                                        
                                        <?php
                                        if($_SESSION['user_type'] != 'Other'){
                                            ?>
                                            <td>
                                            <button type="submit" class="btn btn-primary btn-sm editbtn" data-toggle="modal" data-target="#editModalAP<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Audit Program</button>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                        
                                        <td>
                                        <form method="post" action="audit_work_detail.php">
                                        <input type="hidden" name="E_id" id="E_id" value="<?php echo $chValue['E_id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn" ><i class="fa fa-solid fa-binoculars"></i>View AP</button>
                                        </form>
                                        </td>
                                        <td>
                                        <form method="post" action="view_findingByengagement.php">
                                        <input type="hidden" name="E_id" id="E_id" value="<?php echo $chValue['id']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm editbtn" ><i class="fa fa-solid fa-binoculars"></i>View Finding</button>
                                        </form>
                                        </td>

                                        <!-- <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-plus"></span>Register Finding</button>
                                            </td> -->
                                    </tr>
                                    <div class="modal fade" id="editModal2<?php echo $chValue['id'] ?>" aria-hidden="true">
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
                                                        <input type="hidden" value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly" >
                                                            <div class="form-group">
                                                                <label>Engagement ID</label> 
                                                                <input type="text" name="E_id" id="id" class="form-control" value="<?php echo $chValue['id'] ?> " readonly="readonly" >
                                                                <?php
                                                                if (isset($savec['E_id'])) {
                                                                    echo $savec['E_id'];
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Auditee:</label>
                                                                    <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" readonly="readonly" >
                                                                    <?php
                                                                if (isset($savech['auditee'])) {
                                                                    echo $savech['auditee'];
                                                                }
                                                                ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Operational_area</label>
                                                                <select name="Operational_area" class="form-control">
                                                                    <option value="">--- Select ---</option>
                                                                    <?php
                                                                    if (isset($op)) {
                                                                        foreach ($op as $value) {
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
                                                        <button type="submit" name="save" class="btn btn-info"><i class="fa fa-upload fw-fa"></i> Register Findings and Upload</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Audit Program Detail -->
                                    

                                    <!-- Audit Program -->
                                    <div class="modal fade" id="editModalAP<?php echo $chValue['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Audit Program</h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                        <!-- <input type="hidden" name="up_id" id="up_id" value=""> -->
                                                        <input type="hidden" name="auditee" id="auditee" value="<?php echo $chValue['auditee'] ?>">
                                                        <input type="hidden" name="E_id" id="E_id" value="<?php echo $chValue['id']; ?>">
                                                        <input type="hidden" name="name" id="name" value="<?php echo $_SESSION['name'] ?>">
                                                        <input type="hidden" name="dep_name" id="dep_name" value="<?php echo $chValue['dep_name'] ?>">
                                                        
                                                        
                                                        <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                            <div class="line">
                                                                <div class="form-group">
                                                                    <label>Engagement ID:</label><?php echo $chValue['id'] ?>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditee:</label><?php echo $chValue['auditee'] ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Expected Start Date:</label><?php echo $chValue['S_date'] ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>End Date:</label><?php echo $chValue['E_date'] ?>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditee Department:</label><?php echo $chValue['dep_name'] ?>

                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Objective of Audit</label>
                                                                <textarea name="Objective" type="text" class="form-control"  required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Scope of Audit</label>

                                                                <textarea name="Scope" type="text" class="form-control"  required></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Previous Audit Status</label>
                                                                <textarea name="Status" type="text" class="form-control"  required></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Total Working Days </label>
                                                                <input type="number" name="total" class="form-control">
                                                                <?php
                                                                if (isset($saveReg['total'])) {
                                                                    echo $saveReg['total'];
                                                                }
                                                                ?>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div style="clear:both;"></div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-check fw-fa"></i> OK</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $chValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $chValue['id'] ?>">

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
                            
                            Session::set("E_id", $EId_array);
                                ?>
                        </tbody>
                    </table>
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