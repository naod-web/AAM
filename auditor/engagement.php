<?php
include "aud_header.php";

// $auditeeList = $oms->select_auditee();
//$quarter_plan = $oms->select_quarter_plan();
$viewEn = $oms->view_engagement($_SESSION['audit_type']);


?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($savech['su'])) {
                echo $savech['su'];
            }
            ?>

            <h5 class="page-header">Audit Work/ Engagement</h5>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button> -->
    <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modalE"><span class="glyphicon glyphicon-plus"></span>Engagement Creation</button> -->
    <div class="row">
        <div class="col-auto float-right ml-auto">
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
                                    <!-- <th>Engagement ID</th> -->
                                    <!-- <th>Plan ID</th> -->
                                    <th>Auditee</th>
                                    <!-- <th>Audit type</th> -->
                                    <th>Engagement Description</th>
                                    <th>Assignment Date</th>
                                    <th>Expected Start Date</th>
                                    <th>Expected End Date</th>
                                    <!-- <th>Name</th> -->
                                    <!-- <th>Additional Checklist</th> -->
                                    <th>Action</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($viewEn) {
                                    foreach ($viewEn as $chValue) {
                                ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $chValue['auditee']; ?></td>
                                            <td><?php echo $chValue['Description']; ?></td>
                                            <td><?php echo $chValue['Assignment_date']; ?></td>
                                            <td><?php echo $chValue['S_date']; ?></td>
                                            <td><?php echo $chValue['E_date']; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-edit"></span>Edit </button>
                                                <button type="submit" class="btn btn-danger btn-sm deletebtn " name="delete" value="Delete Data" data-toggle="modal" data-target="#deleteModal<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-trash"></span>Delete</button>
                                            </td>
                                            <td>
                                            <button type="submit" class="btn btn-info btn-sm editbtn" data-toggle="modal" data-target="#editModal2<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-plus">Ad-hoc</span></button>
                                            <button type="submit" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#editModal3<?php echo $chValue['id'] ?>"><span class="glyphicon glyphicon-plus">Introduction Letter</span></button>
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

                                        <!-- Ad-hoc Creation -->
                                        <div class="modal fade" id="editModal2<?php echo $chValue['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" action="#">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Ad-hoc Creation</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                                <div class="form-group">
                                                                    <label>Enagement ID:</label>
                                                                    <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $chValue['id'] ?>" >
                                                                    <?php
                                                                    if (isset($saveReg['E_id'])) {
                                                                        echo $saveReg['E_id'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditee:</label>
                                                                    <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>">
                                                                    <?php
                                                                    if (isset($saveReg['auditee'])) {
                                                                        echo $saveReg['auditee'];
                                                                    }
                                                                    ?>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Team Members</label><br />
                                                                    <select name="Team_member[]" class="form-control mul" multiple="multiple">
                                                                        <option value="">--- Select ---</option>
                                                                        <?php
                                                                        $con = mysqli_connect("localhost", "root", "", "oms");
                                                                        $query = "SELECT * FROM employee";
                                                                        $query_run = mysqli_query($con, $query);
                                                                        if (mysqli_num_rows($query_run) > 0) {
                                                                            foreach ($query_run as $rowaud) {

                                                                        ?>;
                                                                        <option value="<?php echo $rowaud['name']; ?>"><?php echo $rowaud['name']; ?></option>
                                                                <?php
                                                                            }
                                                                        } else {
                                                                            echo "No Record Found";
                                                                        }
                                                                ?>
                                                                    </select>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditor-in-charge/Contact person</label>
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
                                                                <div class="form-group">
                                                                    <label>Sub-process</label>
                                                                    <input name="sub" type="text" class="form-control">
                                                                    <!-- <textarea name="sub" type="text" class="form-control"></textarea> -->
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditor Responsibility/Description</label>
                                                                    <textarea name="Description" type="text" class="form-control"></textarea>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                            <label>Previous Audit Status</label>
                                                            <textarea name="Status" type="text" class="form-control" id="edPA" required></textarea>

                                                        </div> -->
                                                                <div class="form-group">
                                                                    <label>Created by:</label>
                                                                    <input value="<?php echo Session::get("name"); ?>" class="form-control">

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
                                        <!-- Introduction Letter -->
                                        <div class="modal fade" id="editModal3<?php echo $chValue['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" action="#">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Introduction Letter</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                                                                <div class="form-group">
                                                                    <label>Enagement ID:</label>
                                                                    <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $chValue['id'] ?>" >
                                                                    <?php
                                                                    if (isset($saveReg['E_id'])) {
                                                                        echo $saveReg['E_id'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Date</label>
                                                                        <input type="date" name="date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy">
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label>Reference</label>
                                                                    <input type="text" name="reference" class="form-control" placeholder="Enter reference">

                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label>Generated by Team Leader</label>
                                                                    <input type="text" name="gene_by_tl" class="form-control" placeholder="Generated by Team Leader">

                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label>Chief Internal Auditor/ Team Leaders</label>
                                                                    <input type="text" name="ch_tl" class="form-control" placeholder="Chief Internal Auditor/ Team Leaders">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditee:</label>
                                                                    <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>">
                                                                    <?php
                                                                    if (isset($saveReg['auditee'])) {
                                                                        echo $saveReg['auditee'];
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Auditor Name</label>
                                                                    <input value="<?php echo Session::get("name"); ?>" class="form-control">

                                                                </div> 
                                                                <div class="form-group">
                                                                    <label>Letter Body</label>
                                                                    <textarea name="detail" type="text" class="form-control" id="editorlb"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="clear:both;"></div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="sub" class="btn btn-info" value="sub"><span class="glyphicon glyphicon-save"></span> Save</button>
                                                            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>


                                        <div class="modal fade" id="editModal1<?php echo $chValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Engagement Creation</h5>
                                                        <div class="row">

                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        </div>
                                                        <form role="form" method="POST" action="#">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="up_id" id="up_id" value="<?php echo $chValue['id'] ?>">
                                                                <!-- <div class="form-group">
                                                                <label>Engagement ID</label>
                                                                <input type="text" name="p_id" id="id" class="form-control" placeholder="Enter Monthly Plan ID">

                                                            </div> -->
                                                                <div class="form-group">
                                                                    <label>Auditee</label>
                                                                    <input type="text" name="auditee" id="auditee" class="form-control" value="<?php echo $chValue['auditee'] ?>" placeholder="Enter auditee">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Audit type</label>
                                                                    <input type="text" name="audit_type" id="audit_type" class="form-control" value="<?php echo $chValue['audit_type'] ?>" placeholder="Enter audit type">

                                                                </div>


                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input type="text" name="Description" id="Description" class="form-control" value="<?php echo $chValue['Description'] ?>" placeholder="Enter Description">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Assignment Date</label>
                                                                    <input type="date" name="Assignment_date" id="Assignment_date" class="form-control" value="<?php echo $chValue['Assignment_date'] ?>" placeholder="Enter Assignment Date">

                                                                </div>
                                                                <div class=" form-group">
                                                                    <label>Expected Start Date</label>
                                                                    <input type="date" name="S_date" id="S_date" class="form-control" value="<?php echo $chValue['S_date'] ?>" placeholder="Enter Start Date">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Expected End Date</label>
                                                                    <input type="date" name="E_date" id="E_date" class="form-control" value="<?php echo $chValue['E_date'] ?>" placeholder="Enter Expected End Date">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Amend by:</label>
                                                                    <input value="<?php echo Session::get("name"); ?>" class="form-control" disabled>

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



    <!-- <div class="cliyerfix"></div> -->
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<div class="modal fade" id="form_modalE" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#">
                <div class="modal-header">
                    <h5 class="modal-title">Engagement Creation</h5>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $_SESSION['audit_type'] ?>">
                    <input type="hidden" name="name" id="name" value="<?php echo $_SESSION['name'] ?>">
                    
                        <!-- <div class="form-group">
                            <label>Quarter Plan</label>
                            <input type='text' name="q_id" id='q_id' class='form-control' placeholder='Enter id' onkeyup="GetDetail(this.value)" value="">
                        </div> -->



                        <div class="form-group">
                            <label>Engagement Description</label>
                            <textarea name="Description" type="text" class="form-control"></textarea>
                            <!-- <textarea rows="4" class="form-control summernote" name="Description"></textarea> -->
                            <!-- <textarea name="Description" type="text" class="form-control"></textarea> -->
                            <!-- <input type="text" name="Description" class="form-control"> -->

                        </div>

                        <div class="form-group">
                            <label>Expected Start Date</label>
                            <input type="date" name="S_date" class="form-control">
                            <?php
                            if (isset($saveReg['S_date'])) {
                                echo $saveReg['S_date'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Expected End Date</label>
                            <input type="date" name="E_date" class="form-control">
                            <?php
                            if (isset($saveReg['E_date'])) {
                                echo $saveReg['E_date'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Checklist Number</label>
                            <select name="checklist_number" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($chk_num)) {
                                    foreach ($chk_num as $value) {
                                ?>
                                        <option value="<?php echo $value['id']; ?>"> <?php echo $value['checklist_number']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                            <?php
                            if (isset($saveM['chk_num'])) {
                                echo $saveM['chk_num'];
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Additional Checklist by Team/Auditors</label>
                            <textarea name="add_checklist" type="text" class="form-control" id=""></textarea>
                        </div>

                    </div>

                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info" value="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>