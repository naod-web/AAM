<?php
        include "u_header.php";
        $viewplcy = $oms->view_policyreg();

        $con = mysqli_connect("localhost", "root", "", "oms");
        if (mysqli_connect_errno()) {
            echo "Unable to connect to MySQL! " . mysqli_connect_error();
        }
        if (isset($_POST['save'])) {
            $target_dir = "../auditor/upld";
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
            // $filename = $_POST['filename'];
            // $department = $_POST['department'];
            $observation = $_POST['observation'];
            $location = "../auditor/upld/" . $files;
            $sqli = "INSERT INTO `observation` (`observation`, `Location`) VALUES ('{$observation}','{$location}')";
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
                 <h4 class="page-header">General Observation</h4>
             </div>
             <!-- /.col-lg-12 -->
         </div>
         <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
         <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add General Observation</button> -->
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
                                     <!-- <td>Document Name</td> -->
                                     <td>Observation</td>
                                    
                                     <td>Evidence</td>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $sqli = "SELECT * FROM `observation`";
                                    $res = mysqli_query($con, $sqli);
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo '<tr>';
                                        
                                        echo '<td>' . $row['observation'] . '</td>';
                                        
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



     <?php
        include "footer.php";
    ?>