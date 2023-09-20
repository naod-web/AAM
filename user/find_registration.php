<?php
include "u_header.php";
// $aud_name = $oms->select_auditor_name();
$viewforOther = $oms->view_FindingMOther();
// $viewfr = $oms->view_FindingR();
$op = $oms->select_operational();
$auditeeList = $oms->select_auditee();
$Eid = $oms->select_engagement_id();
$cs = $oms->select_cause_id();
$ef = $oms->select_effect_id();
$cr = $oms->select_criteria_id();


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

// $rec = $oms->select_recommendation_id();
// $jus = $oms->select_auditor_justification_id();
$rectificationList = $oms->select_rectification();


 

?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savec['su'])) {
                echo $savec['su'];
            }
            ?>
            <h4 class="page-header">Registered Finding</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span>Add New Finding</button> -->
    <!-- <a href="auditor.php" class="badge badge-info"><span class="glyphicon glyphicon-plus"></span>Auditor Names</a> -->

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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="datatbl">
                        <thead>
                            <tr>
                            <th>Finding ID</th>
                                <th>EID</th>
                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <th>Fact</th>
                                
                                <th>Description</th>
                                <th>Criteria</th>
                                <th>cause</th>
                                <th>effect</th>
                                <th>Internal_control</th>
                                <th>Recommendation</th>
                                <!-- <th>Auditor Justification/ Conclusion</th> -->
                                <!-- <td>Auditee Response</td> -->
                                <th>Response</th>
                                <th>Rectification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewforOther) {
                                foreach ($viewforOther as $RegValue) {
                            ?>
                                  
                                    <td><?php echo $RegValue['id']; ?></td>
                                    <td><?php echo $RegValue['E_id']; ?></td>
                                    <td><?php echo $RegValue['auditee']; ?></td>
                                    <td><?php echo $RegValue['Operational_area']; ?></td>
                                    <td><?php echo $RegValue['Facts']; ?></td>
                                    <td><?php echo $RegValue['Description']; ?></td>
                                    <td><?php echo $RegValue['criteria']; ?></td>
                                    <td><?php echo $RegValue['cause']; ?></td>
                                    <td><?php echo $RegValue['effect']; ?></td>
                                    <td><?php echo $RegValue['Internal_control']; ?></td>
                                    <td><?php echo $RegValue['recommendation']; ?></td>
                                    <td>
                                            <button type="submit" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#editModal3<?php echo $RegValue['id'] ?>">Auditee Response</button>
                                            <!-- <a href="view_operational.php" class="btn btn-outline-success">View Operational</a>&nbsp; -->
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal4<?php echo $RegValue['id'] ?>">Rectification</button>
                                            <!-- <a href="view_operational.php" class="btn btn-outline-success">View Operational</a>&nbsp; -->
                                        </td>
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
<!-- Auditee Response -->
<div class="modal fade" id="editModal3<?php echo $RegValue['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form method="post" action="#">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Auditee Response</h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $RegValue['audit_type'] ?>">
                                                <input type="hidden" name="auditee" id="auditee" value="<?php echo $RegValue['auditee'] ?>">
                                                <input type="hidden" value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly" >
                                                <div class="form-group">
                                                            <label>Engagement ID:</label>
                                                                <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $RegValue['E_id'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['id'])) {
                                                                echo $saveReg['id'];
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Finding ID:</label>
                                                                <input type="text" name="id" id="id" class="form-control" value="<?php echo $RegValue['id'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['id'])) {
                                                                echo $saveReg['id'];
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
                                                        <label>Auditee Response/Feedback/Justification</label>
                                                        <textarea name="resp" type="text" class="form-control"></textarea>
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
<div class="modal fade" id="editModal4<?php echo $RegValue['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form method="post" action="#">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Rectification</h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $RegValue['audit_type'] ?>">
                                                <input type="hidden" name="auditee" id="auditee" value="<?php echo $RegValue['auditee'] ?>">
                                                <input type="hidden" value="<?php echo Session::get("name"); ?>" class="form-control" readonly="readonly" >
                                                <div class="form-group">
                                                            <label>Finding ID:</label>
                                                                <input type="text" name="id" id="id" class="form-control" value="<?php echo $RegValue['id'] ?>" readonly="readonly">
                                                                <?php
                                                            if (isset($saveReg['id'])) {
                                                                echo $saveReg['id'];
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
                                                        <label>Rectification done</label>
                                                        <textarea name="rectification" type="text" class="form-control"></textarea>
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

<!-- View Modal for each Record -->


<!--  -->

<?php
include "footer.php";
?>
