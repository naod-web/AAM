<?php
$message = "";
$valid = 'true';
//include "header.php";
include "lib/oms.php";
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/session.php';
$oms = new Oms();
if (isset($_POST['forgot_passwd'])) {
    $forgot_passwd = $oms->forgot_passwd($_POST);
}
//Session::sessionCheck();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="image/favicons.png">
    <title>Forgot Password</title>
</head>

<body>
    <div class="container">
        <div class="row"><br><br><br>
            <div class="col-md-4"></div>
            <div class="col-md-4" style="background-color: #D2D1D1; border-radius:15px;">
                <br><br>
                <form role="form" method="POST">
                    <div class="form-group">
                        <label>Please enter your email to recover your password</label><br><br>
                        <input class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Email">
                        <?php
                        if (isset($forgot_passwd)) {
                            echo $forgot_passwd;
                        }
                        ?>
                    </div>

                    <?php if (isset($error)) {
                        echo "<div class='alert alert-danger' role='alert'>
                      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      <span class='sr-only'>Error:</span>" . $error . "</div>";
                    } ?>
                    <?php if ($message <> "") {
                        echo "<div class='alert alert-danger' role='alert'>
                      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      <span class='sr-only'>Error:</span>" . $message . "</div>";
                    } ?>
                    <?php if (isset($message_success)) {
                        echo "<div class='alert alert-success' role='alert'>
                      <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                      <span class='sr-only'>Error:</span>" . $message_success . "</div>";
                    } ?>
                    <input type="submit" name="forgot_passwd" class="btn btn-lg btn-info btn-block" value="Send Email">
                    <br><br>
                    <center><a href="index.php">Back to Login</a></center>
                    <br>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
