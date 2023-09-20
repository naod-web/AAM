<?php
include "aud_header.php";

$aud_name = $oms->select_auditor_name();
$f_id = $oms->select_finding_id();

// $aud_findAn = $oms->select_aud_find();

$con = mysqli_connect("localhost", "root", "", "oms");
if (mysqli_connect_errno()) {
    echo "Unable to connect to MySQL! " . mysqli_connect_error();
}
if (isset($_POST['save'])) {
    $target_dir = "support/";
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
    $f_id         = $_POST['f_id'];
    $document_name         = $_POST['document_name'];
    $description = $_POST['description'];
    $auditor_name    = $_POST['auditor_name'];
    $upload_time = $_POST['upload_time'];

    $location = "support/" . $files;
    $sqli = "INSERT INTO `supporting_doc` (`f_id`,`document_name`,`description`, `auditor_name`,`upload_time`, `location`) 
    VALUES ('{$f_id}','{$document_name}','{$description}','{$upload_time}','{$location}')";
    $result = mysqli_query($con, $sqli);
    if ($result) {
        header("Location: supporting_file.php");
        // echo "Supporting file has been successfully uploaded";
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

            <h4 class="page-header">Supporting Document</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Supporting Documents</button>
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
                                <th>Finding ID</th>
                                <th>Document Name</th>
                                <th>Description</th>
                                <th>Auditor Name</th>
                                <th>Date</th>
                                <th>Upload Time</th>
                                <th>Attachment</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqli = "SELECT * FROM `supporting_doc`";
                            $res = mysqli_query($con, $sqli);
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                echo '<td>' . $row['f_id'] . '</td>';
                                echo '<td>' . $row['document_name'] . '</td>';
                                echo '<td>' . $row['description'] . '</td>';
                                echo '<td>' . $row['auditor_name'] . '</td>';
                                echo '<td>' . $row['date'] . '</td>';
                                echo '<td>' . $row['upload_time'] . '</td>';

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
                    <h4 class="modal-title">Supporting Number Registration</h4>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <label>Finding ID</label>
                            <select name="f_id" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($f_id)) {
                                    foreach ($f_id as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['id']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveReg['f_id'])) {
                                echo $saveReg['f_id'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" name="document_name" class="form-control" placeholder="Enter document_name">
                            <?php
                            if (isset($saveReg['document_name'])) {
                                echo $saveReg['document_name'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                            <?php
                            if (isset($saveReg['description'])) {
                                echo $saveReg['description'];
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
                            if (isset($saveReg['auditor_name'])) {
                                echo $saveReg['auditor_name'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Upload Time</label>
                            <input type="time" name="upload_time" class="form-control">
                            <?php
                            if (isset($saveReg['upload_time'])) {
                                echo $saveReg['upload_time'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="file" class="form-control">

                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-info"><i class="fa fa-upload fw-fa"></i> OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
        </div>
        </form>
    </div>
</div>



<?php
include "footer.php";
?>