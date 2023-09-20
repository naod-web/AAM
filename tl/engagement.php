<?php
include "tl_header.php";

// $auditeeList = $oms->select_auditee();
//$quarter_plan = $oms->select_quarter_plan();
$viewEn = $oms->view_engagement();
// $chk_num = $oms->select_chk();
// $tm = $oms->select_team();
// $qpid = $oms->select_quarter_plan();


?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h4 class="page-header">Audit Work/ Engagement</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</button> -->
    <div class="row">
        <div class="col-sm-10">


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg1">
                        <thead>
                            <tr>
                                <th>Engagement ID</th>
                                <th>Monthly Plan ID</th>
                                <!-- <th>Auditee</th>
                                <th>Assigned Team</th> -->
                                <th>Engagement Description</th>
                                <th>Assignment Date</th>
                                <th>Expected Start Date</th>
                                <th>Expected End Date</th>
                                <th>Checklist Number</th>
                                <!-- <th>Operation</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewEn) {
                                foreach ($viewEn as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['id']; ?></td>
                                        <td><?php echo $chValue['m_id']; ?></td>

                                        <td><?php echo $chValue['Description']; ?></td>
                                        <td><?php echo $chValue['Assignment_date']; ?></td>
                                        <td><?php echo $chValue['S_date']; ?></td>
                                        <td><?php echo $chValue['E_date']; ?></td>
                                        <td><?php echo $chValue['checklist_number']; ?></td>
                                        <!-- <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                            <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>

                                        </td> -->
                                    </tr>

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



<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->


<?php
include "footer.php";
?>