<?php
include "tm_header.php";



 if(isset($_POST['Submit'])){

    $saveAud = $oms->adding_type($_POST);
}

?>
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <?php
                        if(isset($saveAud['su'])){
                            echo $saveAud['su'];
                        }
                    ?>
                    <h1 class="page-header">Add Audit Type</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                <form role="form" method="post">
                            <div class="form-group">
                            <label>Audit Type</label>
                            <input type="text" name="Audit_type" class="form-control" required>
                                <?php 
                                    if(isset($saveRisk['Audit_type'])){
                                        echo $saveRisk['Audit_type'];
                                    }
                                ?>
                            </div>
                            
                        <input type="submit" name="Submit" class="btn btn-lg btn-success btn-block" value="save" > 
                    </form>
                    </div>
            </div>
        </div>
    
    <?php
        include "../footer.php";
    ?>