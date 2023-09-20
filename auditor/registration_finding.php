<?php
include "aud_header.php";

$aud_name = $oms->select_auditor_name();
$viewfr = $oms->view_FindingR();
$viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();
$E_id = $oms->select_engagement_id();
$cs = $oms->select_cause_id();
$ef = $oms->select_effect_id();
$cr = $oms->select_criteria_id();
$rec = $oms->select_recommendation_id();
$jus = $oms->select_auditor_justification_id();
$rectificationList = $oms->select_rectification();

// $aud_findAn = $oms->select_aud_find();

$con = mysqli_connect("localhost", "root", "", "oms");
if (mysqli_connect_errno()) {
    echo "Unable to connect to MySQL! " . mysqli_connect_error();
}
if (isset($_POST['save'])) {
    $target_dir = "findings/";
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
    $auditor_name = $_POST['auditor_name'];
    $Date = $_POST['Date'];
    $Action = $_POST['Action'];

    $location = "findings/" . $files;
    $sqli = "INSERT INTO `finding_registration` (`E_id`,`auditee`,`Operational_area`, `Finding_number`,`Facts`,`Description`,`criteria`, `cause`,`effect`,`Internal_control`,`recommendation`, `auditor_justification`,`Acceptance_Status`,`auditor_name`,`Date`, `Action`, `location`) 
    VALUES ('{$E_id}','{$auditee}','{$Operational_area}','{$Finding_number}','{$Facts}','{$Description}','{$criteria}','{$cause}','{$effect}','{$Internal_control}','{$recommendation}','{$auditor_justification}','{$Acceptance_Status}','{$auditor_name}','{$Date}','{$Action}','{$location}')";
    $result = mysqli_query($con, $sqli);
    if ($result) {
        header("Location: find_registration.php");
        // echo "Finding registered successfully and File has been uploaded";
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

            <h4 class="page-header">Finding Registration</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Findings</button>
    <a href="criteria.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Critera</a> &nbsp; <a href="cause.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Cause</a>
    &nbsp; &nbsp; <a href="effect.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Effect</a> &nbsp; <a href="recommendation.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Recommendation</a>
    &nbsp; &nbsp;<a href="auditor_justification.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditor Justification</a>&nbsp; &nbsp;<a href="auditor.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditor</a>
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

                    <table class="table table-bordered" id="dataTables-exampleplc">
                        <thead>
                            <tr>
                                <th>Engagement ID</th>
                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <th>Finding Number</th>
                                <!-- <th>Facts</th> -->
                                <!-- <th>Description</th> -->
                                <!-- <th>Criteria</th>
                                <th>Cause</th>
                                <th>Effect</th> -->
                                <!-- <th>Existing Internal Control</th>
                                <th>Recommendation</th>

                                <th>Auditor Justification/ Conclusion</th>
                                <th>Acceptance Status</th>
                                <th>Auditor Name</th>
                                <th>Date</th>
                                <th>Action</th> -->
                                <th>Attachment</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqli = "SELECT * FROM `finding_registration`";
                            $res = mysqli_query($con, $sqli);
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                echo '<td>' . $row['E_id'] . '</td>';
                                echo '<td>' . $row['auditee'] . '</td>';
                                echo '<td>' . $row['Operational_area'] . '</td>';
                                echo '<td>' . $row['Finding_number'] . '</td>';




                                echo '<td><a class="btn btn-primary" href="' . $row['Location'] . '"><i class="fa fa-download fw-fa"></i>&nbsp;Download</a></td>';
                                echo '</tr>';
                            }
                            mysqli_close($con);
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
                    <h4 class="modal-title">Finding Registration</h4>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <label>Engagement ID</label>
                            <select name="E_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($E_id)) {
                                    foreach ($E_id as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['id']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['E_id'])) {
                                echo $saveM['E_id'];
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
                            if (isset($saveM['Operational_area'])) {
                                echo $saveM['Operational_area'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Finding Number</label>
                            <input type="number" name="Finding_number" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Facts</label>
                            <input type="text" name="Facts" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="Description" type="text" class="form-control" id="editor"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>Criteria</label>
                            <textarea name="Criteria" type="text" class="form-control" id="editor1"></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Criteria</label>
                            <select name="criteria" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($cr)) {
                                    foreach ($cr as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['criteria']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['criteria'])) {
                                echo $saveM['criteria'];
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">
                            <label>Cause</label>
                            <textarea name="Cause" type="text" class="form-control" id="editor2"></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Cause</label>
                            <select name="cause" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($cs)) {
                                    foreach ($cs as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['cause']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['cause'])) {
                                echo $saveM['cause'];
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">
                            <label>Effect</label>
                            <textarea name="Effect" type="text" class="form-control" id="editor3"></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Effect</label>
                            <select name="effect" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($ef)) {
                                    foreach ($ef as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['effect']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['effect'])) {
                                echo $saveM['effect'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Existing Internal Control</label>
                            <textarea name="Internal_control" class="form-control" rows="3"></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label>Recommendation</label>
                            <textarea name="Recommendation" type="text" class="form-control" id="editor4"></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Recommendation</label>
                            <select name="recommendation" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($rec)) {
                                    foreach ($rec as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['recommendation']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['recommendation'])) {
                                echo $saveM['recommendation'];
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">
                            <label>Auditee Response</label>
                            <textarea name="Resp" class="form-control" rows="3"></textarea>

                        </div> -->

                        <!-- <div class="form-group">
                            <label>Auditor Conclusion</label>
                            <textarea name="Auditor_conclusion" type="text" class="form-control" id="editor5"></textarea>
                        </div> -->
                        <div class="form-group">
                            <label>Auditor Justification</label>
                            <select name="auditor_justification" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($jus)) {
                                    foreach ($jus as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['auditor_justification']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['auditor_justification'])) {
                                echo $saveM['auditor_justification'];
                            }
                            ?>
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
                            if (isset($saveM['Acceptance_Status'])) {
                                echo $saveM['Acceptance_Status'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Auditor Name</label>
                            <select name="auditor_name" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($aud_name)) {
                                    foreach ($aud_name as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['auditor_name']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['auditor_name'])) {
                                echo $saveM['auditor_name'];
                            }
                            ?>
                        </div>
                        </section>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="Date" class="form-control">


                        </div>
                        <div class="form-group">
                            <label>Action</label>
                            <input type="text" name="Action" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="file" class="form-control">

                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-info"><i class="fa fa-upload fw-fa"></i> Register and Upload</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
        </div>
        </form>
    </div>
</div>



<?php
include "footer.php";
?>