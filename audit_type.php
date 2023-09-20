<?php
include "header.php";

$viewM = $oms->select_audi_type();

if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);
    $saveReg = $oms->add_audit_type($_POST);
}
if (isset($_POST['edit'])) {
    $editch = $oms->edit_audit_type($_POST);
}
if (isset($_POST['delete'])) {

    $viewAnnual = $oms->del_audit_type($_POST);
}

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h5 class="page-header">Audit Type</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-sm-10">

            <form role="form" method="post">
                <div class="form-group">
                    <a href="audit_type.php" class="btn btn-outline-success"><i class="fa fa-arrow-circle-left"></i> &nbsp;Back</a>&nbsp;
                    <br /><label>Add Audit Type</label>
                    <input type="text" name="audit_type" class="form-control" required>
                    <?php
                    if (isset($saveReg['audit_type'])) {
                        echo $saveReg['audit_type'];
                    }
                    ?>
                </div>
                <input type="submit" name="submit" class="btn btn-info" value="submit" />
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-10">

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-heading">
                <h5>List of Audit Type</h5>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body" width="auto">

                    <table width="auto" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Audit Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $RegValue['id']; ?></td>
                                        <td><?php echo $RegValue['audit_type']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info editbtn1" data-toggle="modal" data-target="#editModal3<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                        </td>
                                    </tr>
                                    <!-- ========Delete Modal======== -->
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
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        <button type="submit" name="delete" class="btn btn-danger" value="delete">Yes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Record -->
                                    <div class="modal fade" id="editModal3<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update the records</h5>
                                                    <div class="row">

                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <form role="form" method="POST" action="#">
                                                        <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">
                                                            <div class="form-group">
                                                                <label>Audit type</label>
                                                                <input type="text" name="audit_type" id="audit_type" class="form-control" value="<?php echo $RegValue['audit_type'] ?>" placeholder="Edit Audit type">

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>


<?php
include "footer.php";
?>