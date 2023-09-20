<?php
include "tm_header.php";
$aud_name = $oms->select_auditor_name();
$viewforOther = $oms->view_FindingM();
// $viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
// $auditeeList = $oms->select_auditee();
$Eid = $oms->select_engagement_id();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();

$rectificationList = $oms->select_rectification();

$con = mysqli_connect("localhost", "root", "", "oms");
if (mysqli_connect_errno()) {
    echo "Unable to connect to MySQL! " . mysqli_connect_error();
}
if (isset($_POST['save'])) {
    $target_dir = "../findings";
    $target_file = $target_dir . date("dmYhis") . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif") {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $files = date("dmYhis") . basename($_FILES["file"]["name"]);
        } else {
            echo "Error Uploading File";
            exit;
        }
    } else {
        echo "File Not Supported";
        exit;
    }
    $E_id = $_POST['E_id'];
    $auditee = $_POST['auditee'];
    $Operational_area = $_POST['Operational_area'];
    $Finding_number = $_POST['Finding_number'];
    $Facts = $_POST['Facts'];
    $Description = $_POST['Description'];
    $criteria = $_POST['criteria'];
    $cause = $_POST['cause'];
    $effect = $_POST['effect'];

    $Internal_control = $_POST['Internal_control'];
    $recommendation = $_POST['recommendation'];
    // $Resp = $_POST['Resp'];
    $auditor_justification = $_POST['auditor_justification'];
    $Acceptance_Status = $_POST['Acceptance_Status'];
    $name	 	= Session::get("name");
    // $auditor_name = $_POST['auditor_name'];
    // $Date = $_POST['Date'];
    $Action = $_POST['Action'];

    $location = "../findings" . $files;
    $sqli = "INSERT INTO `finding_registration` (`E_id`,`auditee`,`Operational_area`, `Finding_number`,`Facts`,`Description`,`criteria`,`cause`,`effect`,`Internal_control`,`recommendation`, `auditor_justification`,`Acceptance_Status`,`name`, `Action`, `location`) 
            VALUES ('{$E_id}','{$auditee}','{$Operational_area}','{$Finding_number}','{$Facts}','{$Description}','{$criteria}','{$cause}','{$effect}','{$Internal_control}','{$recommendation}','{$auditor_justification}','{$Acceptance_Status}','{$name}','{$Action}','{$location}')";
    $result = mysqli_query($con, $sqli);
    if ($result) {
        header("location: find_registration.php");
        // echo "File has been uploaded";
    };
}
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savec['su'])) {
                echo $savec['su'];
            }
            ?>
            <h5 class="page-header">Finding Registration</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add New Finding</button> -->
    <!-- <a href="auditor.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditor Names</a>
    <a href="operational.php" class=p"badge badge-info"><span class="glyphicon glyphicon-plus"></span>Operational Area</a> -->
    <!-- <a href="operational.php" class="btn btn-outine-success"><span class="glyphicon glyphicon-plus"></span>Operational Area</a>
    <a href="auditor.php" class="btn btn-outline-success"><span class="glyphicon glyphicon-plus"></span>Auditor Names</a> -->
    <!-- <a href="auditor.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditor Names</a> -->

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
                <!-- <button class="btn btn-primary btn-sm btn-menu" type="button" id="filter"><i class="glyphicon glyphicon-filter"></i> Filter</button> &nbsp; &nbsp; &nbsp; -->
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-examplePLC">
                        <thead>
                            <tr>
                            <th>Engagement ID</th>
                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <th>Fact</th>
                                
                                <th>Description</th>
                                <th>Criteria</th>
                                <th>cause</th>
                                <th>effect</th>
                                <th>Internal_control</th>
                                <th>Recommendation</th>
                                <!-- <th>Auditor Justification/ Conclusion</th> -->
                                <!-- <td>Auditee Response</td> -->
                                <!-- <th>Attachment</th> -->
                                <!-- <th>Response</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewforOther) {
                                foreach ($viewforOther as $RegValue) {
                            ?>
                                  
                                    <td><?php echo $RegValue['E_id']; ?></td>
                                    <td><?php echo $RegValue['auditee']; ?></td>
                                    <td><?php echo $RegValue['Operational_area']; ?></td>
                                    <td><?php echo $RegValue['Facts']; ?></td>
                                    <td><?php echo $RegValue['Description']; ?></td>
                                    <td><?php echo $RegValue['criteria']; ?></td>
                                    <td><?php echo $RegValue['cause']; ?></td>
                                    <td><?php echo $RegValue['effect']; ?></td>
                                    <td><?php echo $RegValue['Internal_control']; ?></td>
                                    <td><?php echo $RegValue['recommendation']; ?></td>
                                    
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
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title">Finding Registration</h3>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <label>Engagement ID</label>
                            <select name="E_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($Eid)) {
                                    foreach ($Eid as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['id']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['E_id'])) {
                                echo $savec['E_id'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Auditee</label>
                            <select name="auditee" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($auditeeList)) {
                                    foreach ($auditeeList as $value) {
                                ?>
                                        <option value="<?php echo $value['audit_object']; ?>"> <?php echo $value['audit_object']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['auditee'])) {
                                echo $savec['auditee'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Operational Area</label>
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
                            <label>Finding Number</label>
                            <input type="number" name="Finding_number" class="form-control">
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
                            <textarea name="auditor_justification" type="text" class="form-control" id="editor5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Acceptance Status</label>
                            <select name="Acceptance_Status" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($rectificationList)) {
                                    foreach ($rectificationList as $value) {
                                ?>
                                        <option value="<?php echo $value['Rectification']; ?>"> <?php echo $value['Rectification']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['Acceptance_Status'])) {
                                echo $savec['Acceptance_Status'];
                            }
                            ?>
                        </div>
                       
                        </section>
                        <div class="form-group">
                            <label>Auditor Name</label>
                            <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

                        </div>                      
                        <div class="form-group">
                            <label>Action</label>
                            <textarea name="Action" class="form-control" rows="3"></textarea>
                        </div>                        
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



<?php
include "footer.php";
?>