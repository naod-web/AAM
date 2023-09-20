<?php
include "u_header.php";
// $aud_name = $oms->select_auditor_name();
$viewfr = $oms->view_FindingM();
// $viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();
$Eid = $oms->select_engagement_id();
$cs = $oms->select_cause_id();
$ef = $oms->select_effect_id();
$cr = $oms->select_criteria_id();
$con_p_name = $oms->select_contac_pr();

// $rec = $oms->select_recommendation_id();
// $jus = $oms->select_auditor_justification_id();
$rectificationList = $oms->select_rectification();
$acceptList = $oms->select_acceptance();
if (isset($_POST['op_area'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->add_aud_resp($_POST);
}
if (isset($_POST['rect'])) {
    // $register = $oms->reg_finding($data);

    $saveReg = $oms->add_rectification($_POST);
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
            <h5 class="page-header">Finding Registration</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
        <input type="hidden" name="auditee" id="auditee" value="<?php echo $chValue['auditee'] ?>">
            <div class="panel panel-default">

                <div class="panel-heading">

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-eg">
                        <thead>
                            <tr>
                                <td>EID</td>
                                <td>Auditee</td>
                                <td>Operational Area</td>
                                <td>Description</td>
                                <td>Recommendation</td>
                                <td>Auditor Justification/ Conclusion</td>
                                <!-- <td>Auditee Response</td> -->
                                <!-- <td>Attachment</td> -->
                                <td>Response</td>
                                <td>Rectification</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewfr) {
                                foreach ($viewfr as $chValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $chValue['E_id']; ?></td>
                                        <td><?php echo $chValue['auditee']; ?></td>
                                        <td><?php echo $chValue['Operational_area']; ?></td>
                                        <td><?php echo $chValue['Description']; ?></td>
                                        <td><?php echo $chValue['recommendation']; ?></td>
                                        <td><?php echo $chValue['auditor_justification']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#editModal3<?php echo $chValue['id'] ?>">Auditee Response</button>
                                            <!-- <a href="view_operational.php" class="btn btn-outline-success">View Operational</a>&nbsp; -->
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal4<?php echo $chValue['id'] ?>">Rectification</button>
                                            <!-- <a href="view_operational.php" class="btn btn-outline-success">View Operational</a>&nbsp; -->
                                        </td>
                                    </tr>
                                    <!-- ========Delete Modal======== -->
                                    <div class="modal modal-danger fade-in " id="deleteModal<?php echo $chValue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Delete Confirmation</h3>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $chValue['id'] ?>">

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
                                    <!-- Auditee Response -->
                                <div class="modal fade" id="editModal3<?php echo $chValue['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form method="post" action="#">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Auditee Response</h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $chValue['audit_type'] ?>">
                                                
                                                <input type="hidden" value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly" >
                                                <div class="form-group">
                                                            <label>Engagement ID:</label>
                                                                <input type="text" name="E_id" id="id" class="form-control" value="<?php echo $chValue['E_id'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['E_id'])) {
                                                                echo $saveReg['E_id'];
                                                            }
                                                            ?>
                                                        </div>
                                                <div class="form-group">
                                                            <label>Auditee:</label>
                                                                <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['auditee'])) {
                                                                echo $saveReg['auditee'];
                                                            }
                                                            ?>
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Acceptance Status</label>
                                                        <select name="accept" class="form-control">
                                                            <option value="">--- Select ---</option>
                                                            <?php
                                                            if (isset($acceptList)) {
                                                                foreach ($acceptList as $value) {
                                                            ?>
                                                                    <option value="<?php echo $value['accept']; ?>"> <?php echo $value['accept']; ?> </option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                        <?php
                                                        if (isset($saveReg['accept'])) {
                                                            echo $saveReg['accept'];
                                                        }
                                                        ?>
                                                    </div>
                                                        <div class="form-group">
                                                            <label>Action</label>
                                                                <textarea name="action" type="text" class="form-control"></textarea>
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Auditee Response/ Feedback</label>
                                                        <textarea name="resp" type="text" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                                    <label>Share with</label>
                                                                    <select name="Auditor_in_charge" class="form-control">
                                                                        <option value="">--- Select ---</option>
                                                                        <?php
                                                                        if (isset($con_p_name)) {
                                                                            foreach ($con_p_name as $value) {
                                                                        ?>
                                                                                <option value="<?php echo $value['name']; ?>"> <?php echo $value['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($saveReg['Auditor_in_charge'])) {
                                                                        echo $saveReg['Auditor_in_charge'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                            <div class="modal-footer">
                                                <button type="submit" name="op_area" class="btn btn-info" value="op_area"><span class="glyphicon glyphicon-save"></span> Save</button>
                                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                            </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>

                                <!-- Rectification -->
                                <div class="modal fade" id="editModal4<?php echo $chValue['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form method="post" action="#">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Rectification</h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $chValue['audit_type'] ?>">
                                                
                                                <input type="hidden" value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly" >
                                                <div class="form-group">
                                                            <label>Engagement ID:</label>
                                                                <input type="text" name="E_id" id="id" class="form-control" value="<?php echo $chValue['E_id'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['E_id'])) {
                                                                echo $saveReg['E_id'];
                                                            }
                                                            ?>
                                                        </div>
                                                <div class="form-group">
                                                            <label>Auditee:</label>
                                                                <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['auditee'])) {
                                                                echo $saveReg['auditee'];
                                                            }
                                                            ?>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Rectification Status</label>
                                                            <select name="Acceptance_Status" class="form-control">
                                                                <option value="">--- Select ---</option>
                                                                <?php
                                                                if (isset($rectificationList)) {
                                                                    foreach ($rectificationList as $value) {
                                                                ?>
                                                                        <option value="<?php echo $value['Rectification']; ?>"> <?php echo $value['Rectification']; ?> </option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                            <?php
                                                            if (isset($savec['Acceptance_Status'])) {
                                                                echo $savec['Acceptance_Status'];
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Action</label>
                                                                <textarea name="action" type="text" class="form-control"></textarea>
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Rectification done</label>
                                                        <textarea name="rectification" type="text" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                                    <label>Share with</label>
                                                                    <select name="Auditor_in_charge" class="form-control">
                                                                        <option value="">--- Select ---</option>
                                                                        <?php
                                                                        if (isset($con_p_name)) {
                                                                            foreach ($con_p_name as $value) {
                                                                        ?>
                                                                                <option value="<?php echo $value['name']; ?>"> <?php echo $value['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                    <?php
                                                                    if (isset($saveReg['Auditor_in_charge'])) {
                                                                        echo $saveReg['Auditor_in_charge'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                    
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                            <div class="modal-footer">
                                                <button type="submit" name="rect" class="btn btn-info" value="rect"><span class="glyphicon glyphicon-save"></span> Save</button>
                                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                            </div>
                                    </div>
                                    </form>
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

    <div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title">Auditee Response</h3>
                </div>

                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        
                        <div class="form-group">
                            <label>Acceptance Status/ Rectification</label>
                            <select name="Acceptance_Status" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($rectificationList)) {
                                    foreach ($rectificationList as $value) {
                                ?>
                                        <option value="<?php echo $value['Rectification']; ?>"> <?php echo $value['Rectification']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($savec['Acceptance_Status'])) {
                                echo $savec['Acceptance_Status'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Action</label>
                                <textarea name="action" type="text" class="form-control"></textarea>
                        </div>
                    
                        <div class="form-group">
                            <label>Auditee Response/ Feedback</label>
                            <textarea name="resp" type="text" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                            <input type="file" name="file" class="form-control">
                        </div>
    
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-upload fw-fa"></i>Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
        </div>
        </form>
    </div>
</div>


<?php
include "footer.php";
?>