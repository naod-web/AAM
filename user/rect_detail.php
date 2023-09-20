<?php
include "u_header.php";

$viewau=null;
$F_id=null;
if (isset($_POST['F_id'])) {
    // echo $F_id;
    $F_id = $_POST['F_id'];
    $viewau= $oms->view_RECyE_id($F_id);

}
if (isset($_POST['update'])) {
 $st= $oms->updateRECStatus($F_id);
}


// if (isset($_POST['edit'])) {
//         $saveReg = $oms->edit_rs_detail($_POST);
//     }

// if (isset($_POST['delete'])) {
//     $delch = $oms->del_rs_detail();
// }


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
                <a href="rect_status.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                <a href="rect_detail.php" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
                <h5 class="page-header">View Rectification</h5>
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
                    if($_SESSION['position']!="AUDITOR"){
                        ?>

                        <form method="post" action="#">

                        <input type="hidden" name="F_id" id="F_id" value="<?php echo $F_id;?>">
                        <button type="submit" name='update' class="btn btn-primary"><i class="fa fa-solid fa-check"></i>Submit</button>

                    </form>

                <?php
                }
                ?>

<div>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleUP">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>FID</th>
                                <th>Auditee</th>
                                <th>Rectification Status</th>
                                <th>Rectification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewau) {
                                foreach ($viewau as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id'];?></td>
                                        <td><?php echo $RegValue['F_id'];?></td>
                                        <td><?php echo $RegValue['auditee'];?></td>
                                        <td><?php echo $RegValue['Acceptance_Status'];?></td>
                                        <td><?php echo $RegValue['rectification'];?></td>
                                        <td><?php echo $RegValue['r_status'];?></td>
                                        

                                    </tr>


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
