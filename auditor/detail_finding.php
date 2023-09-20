<?php
include "aud_header.php";

$viewM = $oms->view_findingRegistration($_SESSION['audit_type']);
if (isset($_POST['submit'])) {
    // $register = $oms->reg_finding($data);

    // $saveReg = $oms->reg_wbs($_POST);
    $saveReg = $oms->add_finding_detail($_POST);
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
            <h5 class="page-header">Detail Finding</h5>
        </div>
        <!-- /.col-lg-12 -->
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

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-exampleDF">
                        <thead>
                            <tr>
                                <th>Engagement ID</th>
                                <!-- <td>Audit type</td> -->
                                <th>Auditee</th>
                                <th>Operational Area</th>
                                <!-- <td>Finding Number</td> -->
                                <th>Facts</th>
                                <th>Description</th>
                                <th>Citeria</th>
                                <th>Cause</th>
                                <th>Effect</th>
                                <th>Internal Control</th>
                                <!-- <th>Recommendation</th> -->
                                <!-- <th>Auditor Justification/ Conclusion</th> -->
                                <!-- <th>Done by</th> -->
                                <!-- <th>Attachment</th> -->
                                <th>Finding Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewM) {
                                foreach ($viewM as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        
                                        <td><?php echo $RegValue['E_id']; ?></td>
                                        <td><?php echo $RegValue['auditee']; ?></td>
                                        <td><?php echo $RegValue['Operational_area']; ?></td>
                                        <td><?php echo $RegValue['Facts']; ?></td>
                                        <td><?php echo $RegValue['Description']; ?></td>
                                        <td><?php echo $RegValue['criteria']; ?></td>
                                        <td><?php echo $RegValue['cause']; ?></td>
                                        <td><?php echo $RegValue['effect']; ?></td>
                                        <td><?php echo $RegValue['Internal_control']; ?></td>
                                        
                                        <td>
                                            
                                        <button type="submit" class="btn btn-info btn-sm editbtn1" data-toggle="modal" data-target="#editModal1<?php echo $RegValue['id'] ?>"><span class="glyphicon glyphicon-edit">Add Detail</span></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal1<?php echo $RegValue['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Finding Detail</h5>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                </div>
                                                <form role="form" method="POST" action="#">
                                                    <div class="modal-body">
                                                    <input type="hidden" name="audit_type" id="audit_type" value="<?php echo $RegValue['audit_type'] ?>">
                                                        
                                                        <div class="form-group">
                                                                <label>Engagement ID</label> 
                                                                <input type="text" name="E_id" id="E_id" class="form-control" value="<?php echo $RegValue['E_id'] ?> " readonly="readonly" >
                                                                <?php
                                                                if (isset($savec['E_id'])) {
                                                                    echo $savec['E_id'];
                                                                }
                                                                ?>
                                                            </div>

                                                        <div class="form-group">
                                                            <label>Irregularity Description:</label>
                                                                <!-- <input type="text" name="Irregularity_description"  class="form-control" > -->
                                                                <textarea name="Irregularity_description" type="text" class="form-control"  required></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Loss Amount:</label>
                                                                <input type="number" name="Loss_amount" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="submit" class="btn btn-info" value="submit">Add</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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

                    <!-- Modal -->


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