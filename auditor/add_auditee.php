<?php
include "tm_header.php";



 if(isset($_POST['Submit'])){

    $saveAud = $oms->adding_auditee($_POST);
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
                    <h1 class="page-header">Add Auditee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                <form role="form" method="post">
                            <div class="form-group">
                            <label>Auditee list</label>
                            <input type="text" name="Auditee_list" class="form-control" required>
                                <?php 
                                    if(isset($saveRisk['Auditee_list'])){
                                        echo $saveRisk['Auditee_list'];
                                    }
                                ?>
                            </div>
                            
                        <input type="submit" name="Submit" class="btn btn-lg btn-success btn-block" value="save"> 
                    </form>
                    </div>
            </div>
        </div>
    
    <?php
        include "../footer.php";
    ?>