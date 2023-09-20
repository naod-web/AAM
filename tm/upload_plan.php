<?php
include "tm_header.php";
// $aud_name = $oms->select_auditor_name();
// $viewfr = $oms->view_annual();
// $viewfr = $oms->view_FindingR();
$yr = $oms->select_plan_year();


$con = mysqli_connect("localhost", "root", "", "oms");
if (mysqli_connect_errno()) {
    echo "Unable to connect to MySQL! " . mysqli_connect_error();
}
if (isset($_POST['save'])) {
    $target_dir = "upload_plan/";
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
    
    $Year = $_POST['Year'];
    $location = $_POST['location'];

    $location = "upload_plan/" . $files;
    $sqli = "INSERT INTO `upload_plan` (`Year`, `location`) 
            VALUES ('{$Year}','{$location}')";
    $result = mysqli_query($con, $sqli);
    if ($result) {
        header("location: upload_plan.php");
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
            <a href="view_annualplan.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;<a href="upload_plan.php" class="btn btn-outline-success"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> &nbsp;Refresh</a> 
            <h5 class="page-header">Upload Plan</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>Upload Plan</button>
    
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

                    <table class="table table-bordered" id="dataTables-exampleA">
                        <thead>
                            <tr>
                                <td>Plan Year</td>
                                <td>Attachment</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqli = "SELECT * FROM `upload_plan`";
                            $res = mysqli_query($con, $sqli);
                            while ($row = mysqli_fetch_array($res)) {
                                echo '<tr>';
                                echo '<td>' . $row['Year'] . '</td>';
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
                    <h5 class="modal-title">Upload Finding</h5>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <div class="form-group">
                            <label>Active Plan Year</label>
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
                            <label>Attachment</label>
                            <input type="file" name="file" class="form-control">

                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-info"><i class="fa fa-upload fw-fa"></i>Upload</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
        </div>
        </form>
    </div>
</div>



<?php
include "footer.php";
?>