<?php
include "tm_header.php";

$getId = $_GET['edit_id'];

$selectDes = $oms->select_annual_by_id($getId);

if(isset($_POST['edit'])){
    $editAnnual = $oms->edit_annual($_POST);
}

$viewAnnual = $oms->select_annual();

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Edit Annual Plan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                <?php
                    if(isset($editAnnual['su'])){
                        echo $editAnnual['su'];
                    }
                ?>
                    <form role="form" method="post">
                        <input type="hidden" name="id" value="<?php echo $selectDes->id; ?>">
                        <div class="form-group">
                            <label>Audit_activities</label>
                            <input type="text" name="designation_name" class="form-control" value="<?php echo $selectDes->designation; ?>">
                            <?php
                                if(isset($editAnnual['Audit_activities'])){
                                    echo $editAnnual['Audit_activities'];
                                }
                            ?>
                        </div>
                        
                        <button type="submit" name="edit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <br/>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            # 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Audit_activities</th>
                                        <th>Team</th>
                                        <th>Year</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=1;
                                    if($viewAnnual){
                                        foreach ($viewAnnual as $DeValue) {
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $DeValue['Audit_activities']; ?></td>
                                        <td><a href="edit_annual_plan.php?edit_id=<?php echo $DeValue['id']; ?>" class="btn btn-success btn-xs">Edit</a> <a href="edit-annual_plan.php?delete_id=<?php echo $DeValue['id']; ?>" class="btn btn-danger btn-xs">Delete</a></td>
                                    </tr>
                                    <?php
                                        $i++;
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
        include "../footer.php";
    ?>