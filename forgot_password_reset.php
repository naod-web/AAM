<?php
$message = "";
$valid = 'true';
include "lib/oms.php";
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/session.php';
$oms = new Oms();
if (isset($_POST['forgot_passwd_reset'])) {
    $forgot_passwd_reset = $oms->forgot_passwd_reset($_POST, $_GET);
}
//Session::sessionCheck();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <div class="row"><br><br><br>
            <div class="col-md-4"></div>
            <div class="col-md-4" style="background-color: #D2D1D1; border-radius:15px;">
                <br><br>
                <form role="form" method="POST">
                    <label>Please enter your new password</label><br><br>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pwd" name="password1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pwd" name="password2" placeholder="Re-type Password">
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
                    <input type="submit" name="forgot_passwd_reset" class="btn btn-lg btn-info btn-block" value="Save Password">
                    <br><br>
                    <label>This link will work only once for a limited time period.</label>
                    <center> <a href="index.php">Back to Login</a></center>
                    <br>
                </form>
            </div>
            <!-- <div class="col-md-4">
                <br><br>
                <h4>Forgot Password DEMO</h4>
                <p>Feel free to create account with your valid email and try changing your password. We do nothing with your email.</p>
                <a href="https://github.com/suresh021/forgot-password">Find at Github</a>
            </div> -->
        </div>
</body>

</html>