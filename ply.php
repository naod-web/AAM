     <?php
        include "header.php";
        $viewplcy = $oms->view_policyreg();

        $con = mysqli_connect("localhost", "root", "", "oms");
        if (mysqli_connect_errno()) {
            echo "Unable to connect to MySQL! " . mysqli_connect_error();
        }
        if (isset($_POST['save'])) {
            $target_dir = "uplds/";
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
            $filename = $_POST['filename'];
            $department = $_POST['department'];
            $description = $_POST['description'];
            $location = "uplds/" . $files;
            $sqli = "INSERT INTO `policyregistration` (`FileName`,`department`,`description`, `Location`) VALUES ('{$filename}','{$department}','{$description}','{$location}')";
            $result = mysqli_query($con, $sqli);
            if ($result) {
                echo "File has been uploaded";
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
                 <h5 class="page-header">Policy Procedures/Guidelines/Standards</h5>
             </div>
             <!-- /.col-lg-12 -->
         </div>
         <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add Policy Procedures</button>
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
                                     <td>Document Name</td>
                                     <td>Department/ Area</td>
                                     <td>Description</td>
                                     <td>Download</td>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $sqli = "SELECT * FROM `policyregistration`";
                                    $res = mysqli_query($con, $sqli);
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['FileName'] . '</td>';
                                        echo '<td>' . $row['department'] . '</td>';
                                        echo '<td>' . $row['description'] . '</td>';
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
                         <h5 class="modal-title">Policy Procedures</h5>
                     </div>

                     <div class="modal-body">
                         <div class="col-md-2"></div>
                         <div class="col-md-8">

                             <div class="form-group">
                                 <label>Document Name</label>
                                 <input type="text" name="filename" class="form-control" placeholder="Enter Document Name" required>

                             </div>

                             <div class="form-group">
                                 <label>Department/ Area of Application</label>
                                 <input type="text" name="department" class="form-control" placeholder="Department or Area of application" required>

                             </div>

                             <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="description" type="text" class="form-control" ></textarea>
                             </div>
                             <div class="form-group">
                                 <label>File</label>
                                 <input type="file" name="file" class="form-control">

                             </div>
                         </div>
                     </div>
                     <div style="clear:both;"></div>
                     <div class="modal-footer">
                         <button type="submit" name="save" class="btn btn-info"><i class="fa fa-upload fw-fa"></i> Upload</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                     </div>
             </div>
             </form>
         </div>
     </div>



     <?php
        include "footer.php";
    ?>