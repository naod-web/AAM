<?php

include 'header.php';
if (isset($_POST['Change'])) {

    $passwd = $oms->changePA($_POST);
}

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>
            <h4 class="page-header">CHANGE PASSWORD</h4>

        </div>
        
    </div>
    <div>

    </div>
    <div>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><i class="fa fa-cog"></i> &nbsp;CHANGE PASSWORD</button>
        
    </div>

    <div class="row">
        <div class="col-sm-10">


        </div>
    </div>


</div>

<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h3 class="modal-title">CHANGE PASSWORD</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
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
                        
                        <!-- Change this to a button or input when using this as a form -->
                        <input type="submit" name="Change" class="btn btn-lg btn-info" value="Change" />
                        <input type="submit"  class="btn btn-lg btn-secondary" value="Cancel" />
                        <!-- <div class="modal-footer">
                            <button type="submit" name="Change" class="btn btn-info" value="Change">Change</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div> -->
        
                    
                
                </div>
                <div style="clear:both;"></div>
                
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>