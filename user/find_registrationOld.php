<?php
include "u_header.php";
// $aud_name = $oms->select_auditor_name();
$viewfr = $oms->view_FindingR();
// $viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();
$Eid = $oms->select_engagement_id();
$cs = $oms->select_cause_id();
$ef = $oms->select_effect_id();
$cr = $oms->select_criteria_id();

// $rec = $oms->select_recommendation_id();
// $jus = $oms->select_auditor_justification_id();
$rectificationList = $oms->select_rectification();

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
    // $E_id = $_POST['E_id'];
    // $auditee = $_POST['auditee'];
    // $Operational_area = $_POST['Operational_area'];
    // $Finding_number = $_POST['Finding_number'];
    // $Facts = $_POST['Facts'];
    // $Description = $_POST['Description'];

    // $Internal_control = $_POST['Internal_control'];
    // $recommendation = $_POST['recommendation'];
    // // $Resp = $_POST['Resp'];
    // $auditor_justification = $_POST['auditor_justification'];
    // $Acceptance_Status = $_POST['Acceptance_Status'];
    // $auditor_name = $_POST['auditor_name'];
    // // $Date = $_POST['Date'];
    // $Action = $_POST['Action'];

    // $location = "findings/" . $files;
    // $sqli = "INSERT INTO `finding_registration` (`E_id`,`auditee`,`Operational_area`, `Finding_number`,`Facts`,`Description`,`criteria`, `cause`,`effect`,`Internal_control`,`recommendation`, `auditor_justification`,`Acceptance_Status`,`auditor_name`, `Action`, `location`) 
    //         VALUES ('{$E_id}','{$auditee}','{$Operational_area}','{$Finding_number}','{$Facts}','{$Description}','{$criteria}','{$cause}','{$effect}','{$Internal_control}','{$recommendation}','{$auditor_justification}','{$Acceptance_Status}','{$auditor_name}','{$Action}','{$location}')";
    // $result = mysqli_query($con, $sqli);
    // if ($result) {
    //     header("location: f_registration.php");
    //     // echo "File has been uploaded";
    // };
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
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add New Finding</button> -->
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

                    <table class="table table-bordered" id="dataTables-exampleplc">
                        <thead>
                            <tr>
                                <!-- <td>Engagement ID</td> -->
                                <td>Auditee</td>
                                <td>Operational Area</td>
                                <td>Description</td>
                                <td>Recommendation</td>
                                <td>Auditor Justification/ Conclusion</td>
                                <!-- <td>Auditee Response</td> -->
                                <td>Attachment</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqli = "SELECT * FROM `finding_registration`";
                            $res = mysqli_query($con, $sqli);
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                echo '<td>' . $row['auditee'] . '</td>';
                                echo '<td>' . $row['Operational_area'] . '</td>';
                                echo '<td>' . $row['Description'] . '</td>';
                                echo '<td>' . $row['recommendation'] . '</td>';
                                echo '<td>' . $row['auditor_justification'] . '</td>';
                                
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

<?php
include "footer.php";
?>