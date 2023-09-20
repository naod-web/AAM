<?php
include "u_header.php";

$auditeeList = $oms->select_auditee();

$rectificationList = $oms->select_rectification();
$con_p_name = $oms->select_contac_p();

// if (isset($_POST['submit'])) {

//     $savef = $oms->auditee_resp($_POST);
// }

$con = mysqli_connect("localhost", "root", "", "oms");
if (mysqli_connect_errno()) {
    echo "Unable to connect to MySQL! " . mysqli_connect_error();
}
if (isset($_POST['save'])) {
    $target_dir = "response/";
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
    
    // $name = Session::get("name");
    $E_id = $_POST['E_id'];
    $auditee = $_POST['auditee'];
    $Acceptance_Status = $_POST['Acceptance_Status'];
    // $Date = $_POST['Date'];
    $action = $_POST['action'];
    $resp = $_POST['resp'];
    $location = "response/" . $files;
    $name = $_POST['Auditor_in_charge'];
    $name1 = Session::get("name");
    $sqli = "INSERT INTO `auditee_response` (`E_id`,`auditee`,`Acceptance_Status`,`action`,`resp`, `Auditor_in_charge`,`name`) 
            VALUES ('{$E_id}','{$auditee}','{$Acceptance_Status}','{$action}','{$resp}','{$name}','{$name1}')";
    $result = mysqli_query($con, $sqli);
    if ($result) {
        header("location: auditee_response.php");
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
            <h4 class="page-header">Auditee Response</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Auditee Response</button> -->
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
                                <td>#FID</td>
                                <td>AUDITEE</td>
                                <td>ACCEPTANCE STATUS</td>
                                <!-- <td>Action</td> -->
                                <td>RESPONS/FEEDBACK/JUSTIFICATION</td>
                                <!-- <td>Download</td>                                 -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqli = "SELECT * FROM `auditee_response`";
                            $res = mysqli_query($con, $sqli);
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                
                                echo '<td>' . $row['F_id'] . '</td>';
                                echo '<td>' . $row['auditee'] . '</td>';
                                echo '<td>' . $row['accept'] . '</td>';
                                echo '<td>' . $row['resp'] . '</td>';
                                // echo '<td><a class="btn btn-primary" href="' . $row['Location'] . '"><i class="fa fa-download fw-fa"></i>&nbsp;Download</a></td>';
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
                    <h3 class="modal-title">Auditee Response</h3>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        
                        <div class="form-group">
                            <label>Auditee</label>
                                <input value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Acceptance Status/ Rectification</label>
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
                        <div class="form-group">
                            <label>Action</label>
                                <textarea name="action" type="text" class="form-control"></textarea>
                        </div>
                    
                        <div class="form-group">
                            <label>Auditee Response/ Feedback</label>
                            <textarea name="resp" type="text" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Send to:</label>
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
                        <div class="form-group">
                                <label>Responded by:</label>
                                    <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>
                        </div>

                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-upload fw-fa"></i>Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>