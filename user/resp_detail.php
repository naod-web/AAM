<?php
include 'u_header.php';

$viewau = null;
$F_id = null;
if ( isset( $_POST[ 'F_id' ] ) ) {
    // echo $F_id;

    $F_id = $_POST[ 'F_id' ];
    $viewau = $oms->view_ARByE_id( $F_id );

}
if ( isset( $_POST[ 'update' ] ) ) {
    $st = $oms->updateAPStatus( $F_id );
}

if ( isset( $_POST[ 'edit' ] ) ) {
    $saveReg = $oms->edit_rs_detail( $_POST );
}

if ( isset( $_POST[ 'delete' ] ) ) {
    $delch = $oms->del_rs_detail();
}

?>

<div id = 'page-wrapper'>
<div class = 'row'>
<div class = 'col-lg-10'>
<?php
if ( isset( $saveAuditwork[ 'su' ] ) ) {
    echo $viewAuditwork[ 'su' ];
}
?>
<div class = 'col-sm-10'>
<a href = 'auditee_response.php' class = 'btn btn-outline-success'><i class = 'fa fa-arrow-circle-left'></i> &nbsp;
Back</a>&nbsp;
<a href = 'resp_detail.php' class = 'btn btn-outline-success'><i class = 'fa-regular fa fa-rotate-right'></i> &nbsp;
Refresh</a>&nbsp;
<h5 class = 'page-header'>View Auditee Response</h5>
</div>

</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class = 'row'>
<div class = 'col-lg-12'>
<div class = 'panel panel-default'>

<div class = 'panel-heading'>
</div>
<!-- /.panel-heading -->
<div class = 'panel-body'>
<?php
if ( $_SESSION[ 'position' ] != 'AUDITOR' ) {
    ?>

    <form method = 'post' action = '#'>
    <input type = 'hidden' name = 'F_id' id = 'F_id' value = "<?php echo $F_id;?>">
    <button type = 'submit' name = 'update' class = 'btn btn-primary'><i class = 'fa fa-solid fa-check'></i>Submit</button>

    </form>

    <?php
}
?>

<div>
<table width = '100%' class = 'table table-striped table-bordered table-hover' id = 'dataTables-exampleUP'>
<thead>
<tr>
<th>#ID</th>
<th>FID</th>
<th>Auditee</th>
<th>Acceptance Status</th>
<th>Response</th>
<th>Response Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
if ( $viewau ) {
    foreach ( $viewau as $RegValue ) {
        ?>
        <tr class = 'odd gradeX'>

        <td><?php echo $RegValue[ 'id' ];
        ?></td>
        <td><?php echo $RegValue[ 'F_id' ];
        ?></td>
        <td><?php echo $RegValue[ 'auditee' ];
        ?></td>
        <td><?php echo $RegValue[ 'accept' ];
        ?></td>
        <td><?php echo $RegValue[ 'resp' ];
        ?></td>
        <?php
        if ( $RegValue[ 'r_status' ] == 'create' && $_SESSION[ 'user_type' ] == 'Other' ) {
            ?>
            <td>
            <?php echo $RegValue[ 'r_status' ];
            ?>
            </td>
            <?php

        } else {
            ?>
            <td></td>
            <?php
        }
        ?>
        <td>
        <!-- <button type = 'submit' class = 'btn btn-info btn-sm editbtn' data-toggle = 'modal' data-target = '#editModal2'><i class = 'fa fa-solid fa-binoculars'></i>View</span></button> -->
        <button type = 'submit' class = 'btn btn-info btn-sm editbtn1' data-toggle = 'modal' data-target = "#editModal1<?php echo $RegValue['id'] ?>"><span class = 'glyphicon glyphicon-edit'>Edit</span></button>
        <button type = 'submit' class = 'btn btn-danger btn-sm deletebtn ' name = 'delete' value = 'Delete Data' data-toggle = 'modal' data-target = "#deleteModal<?php echo $RegValue['id'] ?>"><span class = 'glyphicon glyphicon-trash'></span>Delete</button>
        </td>

        </tr>

        <!-- Delete Modal -->
        <div class = 'modal modal-danger fade-in ' id = "deleteModal<?php echo $RegValue['id'] ?>" tabindex = '-1' role = 'dialog' aria-labelledby = 'exampleModalLabel' aria-hidden = 'true'>
        <div class = 'modal-dialog'>
        <div class = 'modal-content'>
        <div class = 'modal-header'>
        <h3 class = 'modal-title' id = 'exampleModalLabel'>Delete Confirmation</h3>
        <!-- <button type = 'button' class = 'btn-close' data-bs-dismiss = 'modal' aria-label = 'Close'></button> -->
        </div>
        <form role = 'form' method = 'POST' action = '#'>
        <div class = 'modal-body'>
        <input type = 'hidden' name = 'id' id = 'id' value = "<?php echo $RegValue['id'] ?>">

        <h4> Are You sure to delete this content!!</h4>
        </div>
        <div class = 'modal-footer'>

        <button type = 'submit' name = 'delete' class = 'btn btn-info' value = 'delete'>Yes</button>
        <button type = 'button' class = 'btn btn-danger' data-dismiss = 'modal'>No</button>
        </div>
        </form>
        </div>
        </div>
        </div>

        <!-- Edit Modal -->
        <div class = 'modal fade' id = "editModal1<?php echo $RegValue['id'] ?>" tabindex = '-1' aria-labelledby = 'exampleModalLabel' aria-hidden = 'true'>
        <div class = 'modal-dialog'>
        <div class = 'modal-content'>
        <div class = 'modal-header'>
        <h5 class = 'modal-title' id = 'exampleModalLabel'>Modify and Update Work Breakdown Detail</h5>
        <!-- <button type = 'button' class = 'btn-close' data-bs-dismiss = 'modal' aria-label = 'Close'></button> -->
        </div>
        <form role = 'form' method = 'POST' action = '#'>
        <div class = 'modal-body'>
        <input type = 'hidden' name = 'up_id' id = 'up_id' value = "<?php echo $RegValue['id'] ?>">

        <div class = 'form-group'>
        <label>Finding ID</label>
        <input type = 'text' name = 'F_id' id = 'F_id' class = 'form-control' value = "<?php echo $RegValue['F_id'] ?>" readonly = 'readonly'>

        </div>
        <div class = 'form-group'>
        <label>Auditee</label>
        <input type = 'text' name = 'auditee' id = 'auditee' class = 'form-control' value = "<?php echo $RegValue['auditee'] ?>" placeholder = 'Modify Auditee'>

        </div>
        <div class = 'form-group'>
        <label>Acceptance Status</label>
        <input type = 'text' name = 'resp' id = 'resp' class = 'form-control' value = "<?php echo $RegValue['resp'] ?>" placeholder = 'Modify auditee response'>
        </div>

        </div>
        <div class = 'modal-footer'>
        <button type = 'submit' name = 'edit' class = 'btn btn-info' value = 'edit'>Update</button>
        <button type = 'button' class = 'btn btn-danger' data-dismiss = 'modal'>No</button>
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
include 'footer.php';
?>
