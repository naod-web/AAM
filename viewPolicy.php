<?php
include "aud_header.php";


$viewfR = $oms->view_findR();
if (isset($_POST['submit'])) {
    $saveReg = $oms->reg_finding($_POST);
}

?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h3 class="page-header">View Registered Policy</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>

                                <th>Document Name</th>
                                <th>Department/ Area </th>
                                <th>Description</th>
                                <th>Attachment</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewfR) {
                                foreach ($viewfR as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['dname']; ?></td>
                                        <td><?php echo $chValue['dept']; ?></td>
                                        <td><?php echo $chValue['description']; ?></td>
                                        <td><?php echo $chValue['attachment']; ?></td>
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





<?php
include "footer.php";
?>