<?php
include "tm_header.php";



 if(isset($_POST['Submit'])){
    // $register = $oms->reg_finding($data);
    
    $saveReg = $oms->add_temp_team($_POST);
    //$saveReg = $oms->add_temp_team($_POST);
}

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <?php
                        if(isset($saveReg['su'])){
                            echo $saveReg['su'];
                        }
                    ?>
                    <h1 class="page-header">ADD TEMPORARY TEAM</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                    <form role="form" method="post">
                            <div class="form-group">
                                <label>Ad-hoc</label>
                                <input type="text" name="Ad-hoc" class="form-control" required>
                                    <?php
                                        if(isset($saveReg['Ad-hoc'])){
                                            echo $saveReg['Ad-hoc'];
                                        }
                                    ?>
                            </div>
                            <div class="form-group">
                                <label>Team Member</label>
                                <input type="text" name="Team_member" class="form-control">
                                    <?php
                                        if(isset($saveReg['Team_member'])){
                                            echo $saveReg['Team_member'];
                                        }
                                    ?>
                            </div>
                            <div class="form-group">
                            <label>Status</label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" checked>Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="optionsRadiosInline2" value="0">Inactive
                            </label>
                        </div>
                            
                        <input type="submit" name="Submit" class="btn btn-lg btn-success btn-block" value="submit" /> 
                    </form>
                </div>
            </div>
            <!-- <div class="cliyerfix"></div> -->
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
 
    <?php
        include "../footer.php";
    ?>