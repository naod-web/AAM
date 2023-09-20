<?php
include "aud_header.php";

$viewau=null;
$E_id=null;
if (isset($_POST['E_id'])) {
    $E_id = $_POST['E_id'];
    $viewau= $oms->view_wbs_nsubE_id($E_id);

    $viewen= $oms->view_auditWorktByE_id($E_id);

}
if (isset($_POST['update'])) {
 $st= $oms->updateWBDStatus($E_id);
}
if (isset($_POST['approval'])) {
    $st= $oms->ApprovalWBDStatus($E_id);
}

if (isset($_POST['edit'])) {
        $saveReg = $oms->edit_wbd_detail($_POST);
    }

if (isset($_POST['delete'])) {
    $delch = $oms->del_wbd_detail();
}


?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveAuditwork['su'])) {
                echo $viewAuditwork['su'];
            }
            ?>
            <div class="col-sm-10">
                <a href="modify_auditwork.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                <a href="#" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
                
                <div class="form-group">
                <?php
                            if ($viewen) {
                                foreach ($viewen as $RegValue) {
                            ?>
                            <h5 class="page-header"><strong>Audit Program Detail</strong></h5>
                            <div>
                     <label>Audit Program ID:</label>
                        <?php echo $RegValue['id'] ?>
                                </div>
                                
                                <div>
                        <label>Auditee:</label>
                        <?php echo $RegValue['auditee'] ?>
                                </div>
                                <div>
                        <label>Objective:</label>
                        <?php echo $RegValue['Objective'] ?>
                                </div>
                                <div>
                        <label>Scope:</label>
                        <?php echo $RegValue['Scope'] ?>
                                </div>
                                <div>
                        <label>Prevous Audit Status:</label>
                        <?php echo $RegValue['Status'] ?>
                                </div>
                                <div>
                        <label>Total Working Day:</label>
                        <?php echo $RegValue['total'] ?>
                                </div>

                        <?php
                                }
                            }
                            ?>

                </div>
                <h5 class="page-header"><strong>Work Breakdown</strong></h5>
            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                    if($_SESSION['position']!="TEAM MANAGER"){
                        ?>

                        <!-- <form method="post" action="#">
                        
                        <input type="hidden" name="E_id" id="E_id" value="<?php echo $E_id;?>">
                        <button type="submit" name='update' class="btn btn-primary"><i class="fa fa-solid fa-check"></i>Submit</button>
                       
                    </form> -->
                   
                <?php
                }
                ?>
                 <?php
                    if($_SESSION['position']=="TEAM MANAGER"){

                        // echo $_SESSION['Ap   proval'];
                        ?>

                        <form method="post" action="#">

                        <input type="hidden" name="E_id" id="E_id" value="<?php echo $E_id;?>">
                        <button type="submit" name='approval' class="btn btn-primary"><i class="fa fa-solid fa-check"></i>Approval</button>

                    </form>

                <?php
                }
                ?>
<div>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleAPP">
                        <thead>
                            <tr>
                                <th>WBD ID</th>
                                <th>Operational Area</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>WBD Status</th>
                                <th>Approval Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewau) {
                                foreach ($viewau as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['id'];?></td>
                                        <td><?php echo $RegValue['Operational_area']; ?></td>
                                        <td><?php echo $RegValue['S_date']; ?></td>
                                        <td><?php echo $RegValue['E_date']; ?></td>
                                        <td>
                                        <?php echo $RegValue['w_status']; ?>
                                        </td>
                                        <td>
                                        <?php echo $RegValue['A_status']; ?>
                                        </td>
                                        <td>
                                                <!-- <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2"><i class="fa fa-solid fa-binoculars"></i>View</span></button> -->
                                                <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>
                                                <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                        </td>
                                        
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $RegValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $RegValue['id'] ?>">

                                                        <h4> Are You sure to delete this content!!</h4>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="delete" class="btn btn-info" value="delete">Yes</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modify and Update Work Breakdown Detail</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">

                                                        <div class="form-group">
                                                            <label>Engagement ID</label>
                                                            <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $RegValue['E_id'] ?>" readonly="readonly">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Operational Area</label>
                                                            <input type="text" name="Operational_area" id="Operational_area" class="form-control" value="<?php echo $RegValue['Operational_area'] ?>" placeholder="Modify Operational Area">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" name="S_date" id="S_date" class="form-control" value="<?php echo $RegValue['S_date'] ?>" placeholder="Modify Start Date">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="date" name="E_date" id="E_date" value="<?php echo $RegValue['E_date'] ?>" class="form-control" placeholder="Modify End Date">

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    
</div>

<?php
include "footer.php";
?>
