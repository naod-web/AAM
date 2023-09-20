<?php

include "tm_header.php";

$ity = $oms->select_ity();
$audty = $oms->select_auditee();

$viewch = $oms->view_quarter_summary($_POST);
$audit_activities = $oms->select_audit_activities();


?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>
            <h5 class="page-header">QUARTER EXECUTIVE SUMMARY LIST</h5>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div>

    </div>
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
                    <!-- <input type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')" /> -->
                    <!-- <button type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-trash"> Delete</span></button> -->
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg2">
                        <thead>
                            <tr>
                                
                                <th>Auditee</th>
                                <th>Irregularity</th>
                                <th>Amount</th>

                                <!-- <th>Operation</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $DeValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $DeValue['auditee']; ?></td>
                                        <td><?php echo $DeValue['Irregularity_type']; ?></td>
                                        <td><?php echo $DeValue['amt']; ?></td>
                                 
                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $DeValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $DeValue['id'] ?>">

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
                                    <!-- ------Edit Modal------ -->
                                    <div class="modal fade" id="editModal<?php echo $DeValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Team</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $DeValue['id'] ?>">

                                                        <!-- <div class="form-group">
                                                            <label>Team</label>
                                                            <input type="text" name="Team" id="Team" value="<?php echo $DeValue['Team'] ?>" class="form-control" placeholder="Enter team">

                                                        </div> -->
                                                        <!-- <div class="form-group">
                                                            <label>Audit Type</label>
                                                            <input type="text" name="Audit_type" id="Audit_type" value="<?php echo $DeValue['Audit_type'] ?>" class="form-control" placeholder="Enter Audit Type">

                                                        </div> -->

                                                        <div class="form-group">
                                                            <label>Auditee</label>
                                                            <input type="date" name="auditee" id="auditee" value="<?php echo $DeValue['auditee'] ?>" class="form-control" placeholder="edit auditee">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Irregularity type</label>
                                                            <input type="text" name="Irregularity_type" id="Irregularity_type" value="<?php echo $DeValue['Irregularity_type'] ?>" class="form-control" placeholder="Enter Irregularity_type">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Amount</label>
                                                            <input type="text" name="amt" id="amt" value="<?php echo $DeValue['amt'] ?>" class="form-control" placeholder="Enter auditee">
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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



<!-- <div class="cliyerfix"></div> -->
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h3 class="modal-title">Quarter Executive summary</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        
                    <div class="form-group">
                            <label>Auditee</label>
                            <select name="auditee" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($audty)) {
                                    foreach ($audty as $value) {
                                ?>
                                        <option value="<?php echo $value['audit_object']; ?>"> <?php echo $value['audit_object']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['auditee'])) {
                                echo $savec['auditee'];
                            }
                            ?>
                        </div>

                        <div class="form-group">
                    <label>Irregularity type</label>
                    <select name="Irregularity_type" class="form-control">
                        <option value="">--- Select ---</option>
                        <?php
                        if (isset($ity)) {
                            foreach ($ity as $value) {
                        ?>
                                <option value="<?php echo $value['Irregularity_type']; ?>"> <?php echo $value['Irregularity_type']; ?> </option>
                        <?php }
                        } ?>
                    </select>
                    <?php
                    if (isset($saveTeam['Irregularity_type'])) {
                        echo $saveTeam['Irregularity_type'];
                    }
                    ?>
                </div>
                        <div class="form-group">
                            <label>Irregularity Amount</label>
                            <input type="number" name="amt" class="form-control">
                            <?php
                                if (isset($saveTeam['amt'])) {
                                echo $saveTeam['amt'];
                            }
                            ?>
                        </div>
                        
                        
                        
                        

                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="create" class="btn btn-info" value="create"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>






<!-- /#page-wrapper -->



<?php
include "footer.php";
?>

