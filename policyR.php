<?php
include "header.php";

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'oms');

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO policyreg (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

if (isset($_POST['save'])) {
    $savePolcy = $oms->save_policy($_POST);
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savePolcy['su'])) {
                echo $savePolcy['su'];
            }
            ?>
            <h3 class="page-header">Policy Registration</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Document Name</label>
                    <input type="text" name="dname" class="form-control">
                    <?php
                    if (isset($savePolcy['dname'])) {
                        echo $savePolcy['dname'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Department/ Area</label>
                    <input type="text" name="dept" class="form-control">
                    <?php
                    if (isset($savePolcy['dept'])) {
                        echo $savePolcy['dept'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <!-- <input type="text" name="description" class="form-control"> -->
                    <textarea name="description" type="text" class="form-control" id="editorlb"></textarea>
                    <?php
                    if (isset($savePolcy['description'])) {
                        echo $savePolcy['description'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Attachment</label>
                    <input type="file" name="attachment" class="form-control">
                    <?php
                    if (isset($savePolcy['attachment'])) {
                        echo $savePolcy['attachment'];
                    }
                    ?>
                </div>

                <input type="submit" name="save" class="btn btn-info" value="Save">
            </form>
        </div>
    </div>
    <div class="cliyerfix"></div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>