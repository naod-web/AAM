<?php
include "aud_header.php";

$Eid = $oms->select_engagement_id();
// $viewintrL = $oms->view_findingDetail();
// $E_id = $oms->select_engagement_id();
// $F_id = $oms->select_Finding_number();
if (isset($_POST['E_id'])) {

    $E_id=$_POST['E_id'];
    $viewen= $oms->view_engagementByE_id($E_id);
$viewOther = $oms->view_FindingByengagementID($E_id);

}

if (isset($_POST['submit'])){

    $savef = $oms->add_finding_detail($_POST);
}
if (isset($_POST['update'])) {

    $E_id=$_POST['E_id'];
    // echo $E_id;
    $st= $oms->updateFindingStatus($E_id);

}


// $viewen= $oms->view_engagementByE_id($E_id);

// echo $viewen;

?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savec['su'])) {
                echo $savec['su'];
            }
            ?>
            <a href="../tm/engagement.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
            
            <div class="form-group">
                <?php
                            if ($viewen) {
                                foreach ($viewen as $RegValue) {
                            ?>
                            <!-- <h5><strong>Engagement Detail:</strong></h5> -->
                            <h5 class="page-header"><strong>Engagement Detail</strong></h5>
                            <div>
                     <label>Engagement ID:</label>
                        <?php echo $RegValue['id'] ?>
                                </div>
                                <div>
                        <label>Auditee:</label>
                        <?php echo $RegValue['auditee'] ?>
                                </div>
                                <div>
                        <label>Description:</label>
                        <?php echo $RegValue['Description'] ?>
                                </div>
                                <div>
                        <label>Assignment Date:</label>
                        <?php echo $RegValue['Assignment_date'] ?>
                                </div>
                                <div>
                        <label>Start Date:</label>
                        <?php echo $RegValue['S_date'] ?>
                                </div>
                                <div>
                        <label>End date:</label>
                        <?php echo $RegValue['E_date'] ?>
                                </div>

                        <?php
                                }
                            }
                            ?>

                </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add New Finding</button> -->
    <!-- <a href="operational.php" class="btn btn-outine-success"><span class="glyphicon glyphicon-plus"></span>Operational Area</a>
    <a href="auditor.php" class="btn btn-outline-success"><span class="glyphicon glyphicon-plus"></span>Auditor Names</a> -->

    <div class="row">
        <div class="col-sm-10">

        </div>
    </div>

    <div class="row">
    <h5 class="page-header"><strong>Findings</strong></h5>
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table class="table table-bordered" id="dataTables-examplePLC">
                        <thead>
                            <tr>
                                <td>Finding ID</td>
                                <!-- <td>Engagement ID</td> -->
                                <!-- <td>Audit type</td> -->
                                <!-- <td>Auditee</td> -->
                                <td>Operational Area</td>
                                <!-- <td>Finding Number</td> -->
                                <td>Facts</td>
                                <td>Description</td>
                                <td>Citeria</td>
                                <td>Cause</td>
                                <td>Effect</td>
                                <td>Internal Control</td>
                                <!-- <td>Recommendation</td>  -->
                                <!-- <td>Auditor Justification/ Conclusion</td> -->
                                <!-- <td>Auditee Response</td> -->
                                <td>Attachment</td>
                                <td>View Record Detail</td>
                                <!-- <td>Finding Status</td> -->
                                <?php
                                        if(Session::get("position") !='TEAM MANAGER'){
                                            ?>
                                
                                <td>Visibility</td>
                                <?php
                                        }
                                        ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if ($viewOther) {
                                foreach ($viewOther as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id']; ?></td>
                                        
                                        <td><?php echo $RegValue['Operational_area']; ?></td>
                                        <td><?php echo $RegValue['Facts']; ?></td>
                                        <td><?php echo $RegValue['Description']; ?></td>
                                        <td><?php echo $RegValue['criteria']; ?></td>
                                        <td><?php echo $RegValue['cause']; ?></td>
                                        <td><?php echo $RegValue['effect']; ?></td>
                                        <td><?php echo $RegValue['Internal_control']; ?></td>

                                        <td><a class="btn btn-primary" href="' . $RegValue['Location'] . '"><i class="fa fa-download fw-fa"></i>&nbsp;Download</a></td>
                                        <td>
                                                <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $RegValue['id'] ?>"><i class="fa fa-solid fa-binoculars"></i>View</span></button>
                                               
                                        </td>
                                        <?php
                                        if(Session::get("position") !='TEAM MANAGER'){
                                            ?>
                                        <td>

                                        <form method="post" action="#"><input type="hidden" name="E_id" id="E_id" value="<?php echo $RegValue['E_id']; ?>">
                                  <button type="submit" name="update" class="btn btn-info btn-sm editbtn"><i class="fa fa-solid fa-binoculars"></i>Visibility</span></button>
                                    </form>
                                        </td>
                                        <?php
                                        }
                                        ?>

                                    <?php    
                                }
                            }
                                ?>
                                
                                    </tr>
                                    
                                

                       
                        </tbody>
                        
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>
<div class="modal fade" id="editModal2<?php echo $RegValue['id'] ?>"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-file"></i>View record detail</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                            <label>Plan ID:</label><?php echo $RegValue['id'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Engagement ID:</label><?php echo $RegValue['E_id'] ?>

                                                        </div>
                                                    <div class="form-group">
                                                            <label>Auditee:</label><?php echo $RegValue['auditee'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Operational Area:</label><?php echo $RegValue['Operational_area'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Facts:</label><?php echo $RegValue['Facts'] ?>

                                                        </div>
                                                            <div class="form-group">
                                                                <label>Description:</label><?php echo $RegValue['Description'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Criteria:</label><?php echo $RegValue['criteria'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                            <label>Cause:</label><?php echo $RegValue['cause'] ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Effect:</label><?php echo $RegValue['effect'] ?>

                                                        </div>
                                                            <div class="form-group">
                                                                <label>Internal Control:</label><?php echo $RegValue['Internal_control'] ?>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Recommendation:</label><?php echo $RegValue['recommendation'] ?>

                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                    <!-- <a href="engagement.php" class="btn btn-outline-success" data-target="#form_modalE"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</a> &nbsp; &nbsp; -->

                                            <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modalE--id should be inserted here"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</button> -->
                                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->






<?php
include "footer.php";
?>