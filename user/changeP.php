<?php

include 'u_header.php';
if (isset($_POST['Change'])) {

    $passwd = $oms->changeP($_POST);
}
?>
<div class="container">

    <div class="row">
        <div class="col-md- col-md-offset-2">
            <div>
                <h4>Change Password</h4>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    &nbsp; &nbsp;

                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post">


                        <div class="form-group">
                            <input class="form-control" placeholder="Current Password" name="oldpassword" id="oldpassword" type="password">
                            <?php
                            if (isset($saveRisk['oldpassword'])) {
                                echo $saveRisk['oldpassword'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="New Password" name="newpassword" id="newpassword" type="password">
                            <?php
                            if (isset($saveRisk['newpassword'])) {
                                echo $saveRisk['newpassword'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Retype Password" name="confirmpassword" id="confirmpassword" type="password">
                            <?php
                            if (isset($saveRisk['confirmpassword'])) {
                                echo $saveRisk['confirmpassword'];
                            }
                            ?>
                        </div>
                        <div class="checkbox">
                            <!-- <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label> -->
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <input type="submit" name="Change" class="btn btn-lg btn-info" value="Change" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>