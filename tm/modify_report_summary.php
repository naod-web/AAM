<?php

include 'tm_header.php';


$viewES = $oms->view_report_summary();

if (isset($_POST['submit'])) {
    $saveTeam = $oms->save_report_summary($_POST);
}
if (isset($_POST['edit'])) {

    $viewAnnual = $oms->edit_report_summary($_POST);
}
if (isset($_POST['delete'])) {

    $delAnnual = $oms->del_report_summary($_POST);
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
            <h4 class="page-header">Modify Report Summary</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>



                                <th>Intro</th>
                                <th>Audit Objective</th>
                                <th>Methodology</th>
                                <th>Audit Scope</th>
                                <th>Sampling Technique</th>
                                <th>Rating</th>
                                <th>Summary</th>
                                <th>Operation</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewES) {
                                foreach ($viewES as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['intro']; ?></td>
                                        <td><?php echo $RegValue['objective']; ?></td>
                                        <td><?php echo $RegValue['methodology']; ?></td>
                                        <td><?php echo $RegValue['scope']; ?></td>
                                        <td><?php echo $RegValue['technique']; ?></td>
                                        <td><?php echo $RegValue['rating']; ?></td>
                                        <td><?php echo $RegValue['summary']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Edit</span></button>

                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-trash">Delete</span></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Report Summary</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $RegValue['id'] ?>">
                                                        <?php
                                                        if (isset($saveReg['id'])) {
                                                            echo $saveReg['id'];
                                                        }
                                                        ?>

                                                        <div class="form-group">
                                                            <label>Introduction</label>
                                                            <input type="text" name="intro" id="intro" class="form-control" value="<?php echo $RegValue['intro'] ?>" placeholder="Please provide some Intro ">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Audit Objective</label>
                                                            <input type="text" name="objective" id="objective" class="form-control" data-date-format="mm-dd-yyyy" value="<?php echo $RegValue['objective'] ?>" placeholder="Objective">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Audit Methodology</label>
                                                            <input type="text" name="methodology" id="methodology" value="<?php echo $RegValue['methodology'] ?>" class="form-control" placeholder="Enter Methodology">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Audit Scope</label>
                                                            <input type="text" name="scope" id="scope" value="<?php echo $RegValue['scope'] ?>" class="form-control" placeholder="Enter Scope">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sampling Technique</label>
                                                            <input type="text" name="technique" id="technique" value="<?php echo $RegValue['technique'] ?>" class="form-control" placeholder="Enter Technique">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Rating</label>
                                                            <input type="number" name="rating" id="scope" value="<?php echo $RegValue['rating'] ?>" class="form-control" placeholder="Enter Rating">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Executive Summary</label>
                                                            <input type="text" name="summary" id="summary" value="<?php echo $RegValue['summary'] ?>" class="form-control" placeholder="Executive Summary">

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edit" class="btn btn-info" value="edit">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ----------Delete Modal----------- -->
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>