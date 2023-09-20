<html>

<head>
    <!-- <title>IT SOURCECODE | Upload and Download File</title> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <style>
        .form {
            width: 100%;
            display: inline-block;
            position: inherit;
            padding: 6px;
        }

        .label {
            padding: 10px;
            width: 10%;
        }

        .input {
            position: inherit;
            padding: 3px;
            margin-left: 2.3%;
        }

        .btn {
            margin-left: 6.5%;
            background-color: blue;
            color: white;
        }
    </style>
    <?php
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
    <center>

        <form class="form" method="post" action="" enctype="multipart/form-data">

            <label>Document Name</label>
            <input type="text" name="filename">


            <label>Department</label>
            <input type="text" name="department"> <br />


            <label>Description</label>
            <!-- <input type="text" name="filename"> <br /> -->
            <textarea name="description" type="text"></textarea>

            <label>File:</label>
            <input type="file" name="file"> <br />


            <!-- <div style="margin-left: 9%">
                <label>File:</label>
                <input type="file" name="file"> <br />
            </div> -->
            <button type="submit" name="save" class="btn"><i class="fa fa-upload fw-fa"></i> Upload</button>
        </form>
    </center>
    <br>
    <div class="container">
        <table id="demo" class="table table-bordered">
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
                    echo '<td><a class="btn" href="' . $row['Location'] . '">Download</a></td>';
                    echo '</tr>';
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
    </script>
</body>

</html>