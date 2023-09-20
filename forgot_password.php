<?php

include 'header.php';
if (isset($_POST['submit'])) {
    //it will be changed to changeP.php for forget password
    $passwd = $oms->edit_chk($_POST);
}
?>
<div class="container">

    <div class="row">
        <div class="col-md- col-md-offset-3">
            <div>
                <h3>Forgot Password</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    &nbsp; &nbsp;

                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post">

                        <div class="form-group">

                            <input type="text" name="user_name" class="form-control" placeholder="Enter your email">
                            <?php
                            if (isset($saveRisk['user_name'])) {
                                echo $saveRisk['user_name'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Old Password" name="oldpwd" type="password">
                            <?php
                            if (isset($login['oldpwd'])) {
                                echo $login['oldpwd'];
                            }

                            ?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="New Password" name="password" type="password">
                            <?php
                            if (isset($login['password'])) {
                                echo $login['password'];
                            }

                            ?>
                        </div>
                        <div class="checkbox">
                            <!-- <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label> -->
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <input type="submit" name="Change" class="btn btn-lg btn-info" value="Change">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>