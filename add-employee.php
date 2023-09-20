<?php
include "header.php";

$desig_select = $oms->select_designation();
$es = $oms->select_aud();
$dept_name = $oms->select_dept();

if (isset($_POST['emp_save'])) {
    $saveImp = $oms->save_employee($_POST);
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveImp['su'])) {
                echo $saveImp['su'];
            }
            ?>
            <h4 class="page-header">Add User/ User Creation</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
            <form role="form" method="post">
                <div class="form-group">
                    <label>User/Branch/District/HO</label>
                    <input type="text" name="name" class="form-control">
                    <?php
                    if (isset($saveImp['name'])) {
                        echo $saveImp['name'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <select name="designation" class="form-control">
                        <option value="">--- Select ---</option>
                        <?php
                        if (isset($desig_select)) {
                            foreach ($desig_select as $value) {
                        ?>
                                <option value="<?php echo $value['designation']; ?>"> <?php echo $value['designation']; ?> </option>
                        <?php }
                        } ?>
                    </select>
                    <?php
                    if (isset($saveImp['designation'])) {
                        echo $saveImp['designation'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Audit type</label>
                    <select name="audit_type" class="form-control">
                        <option value="">--- Select ---</option>
                        <?php
                        if (isset($es)) {
                            foreach ($es as $value) {
                        ?>
                                <option value="<?php echo $value['audit_type']; ?>"> <?php echo $value['audit_type']; ?> </option>
                        <?php }
                        } ?>
                    </select>
                    <?php
                    if (isset($saveImp['audit_type'])) {
                        echo $saveImp['audit_type'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Office or User Phone</label>
                    <input type="text" name="phone" class="form-control">
                    <?php
                    if (isset($saveImp['phone'])) {
                        echo $saveImp['phone'];
                    }
                    ?>
                </div>
                <!-- <div class="form-group">
                    <label>Joining Date</label>
                    <input type="date" name="joining_date" class="form-control" data-date-format="mm-dd-yyyy" placeholder="mm-dd-yyyy">

                </div> -->
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" maxlength="45">
                    <?php
                    if (isset($saveImp['email'])) {
                        echo $saveImp['email'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="user_name" class="form-control">
                    <?php
                    if (isset($saveImp['user_name'])) {
                        echo $saveImp['user_name'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" minlength="8">
                    <?php
                    if (isset($saveImp['password'])) {
                        echo $saveImp['password'];
                    }
                    ?>
                </div>
                <div class="form-group">
                            <label>Department</label>
                            <select name="dep_name" class="form-control">
                                <option value="">--- Select ---</option>
                                <?php
                                if (isset($dept_name)) {
                                    foreach ($dept_name as $value) {
                                ?>
                                        <option value="<?php echo $value['dep_name']; ?>"> <?php echo $value['dep_name']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label>Use type</label>
                            <select name="user_type" class="form-control">
                                <option value="">--- Select ---</option>
                                <option value="Manager">Auditor</option>
                                <option value="Auditor">Auditor</option>
                                <option value="Other">Other</option>
                                
                            </select>
                           
                        </div>


                <input type="submit" name="emp_save" class="btn btn-info" value="Save">
            </form>
        </div>
    </div>
    <div class="cliyerfix"></div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>