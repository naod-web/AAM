<?php
include "aud_header.php";

// $viewau=null;
// $E_id=null;
// if (isset($_POST['E_id'])) {
//     $E_id = $_POST['E_id'];
    
//     $viewau= $oms->view_APBy($E_id);
// }

$viewau=null;
$F_id=null;
if (isset($_POST['F_id'])) {
    // echo $F_id;


    $F_id = $_POST['F_id'];
    $viewau= $oms->view_ARByE_id($F_id);
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
                <a href="#" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                <a href="v_resp.php" class="btn btn-outline-success"><i class="fa-regular fa fa-rotate-right"></i> &nbsp;Refresh</a>&nbsp;
                <h5 class="page-header">View Auditee Response</h5>

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

<div>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleUP">
                        <thead>
                            <tr>

                                <th>#EID</th>
                                <th>Finding ID</th>
                                <th>Auditee</th>
                                <th>Acceptance Status</th>
                                <th>Response/Justification</th>
                                <!-- <th>AR Status</th> -->
                                <!-- <th>Action</th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewau) {
                                foreach ($viewau as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['F_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['accept']; ?></td>
                                        <td><?php echo $RegValue['resp']; ?></td>

                                    </tr>

                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    
</div>
                        </div>

<?php
include "footer.php";
?>
