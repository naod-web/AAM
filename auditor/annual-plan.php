<?php

include '../header.php';

$annual_plan = $oms->$annual_plan();


//$viewSetting = $oms->view_setting();

?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="page-header">Approve Annual Plan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID </th>
                                <th>Audit_activities</th>
                                <th>Team</th>
                                <th>Year</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                            if ($result->num_rows>0) {
                                while($row=$result->fetch_assoc()){
                        ?> 
                            <tr class="table">
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['Audit_activities']; ?></td>
                                <td><?php echo $row['Team']; ?></td>
                                <td><?php echo $row['Year']; ?></td>
                                <td><?php echo $row['Quantity']; ?></td>
                                <td><a class="btn btn-info" href="update.php?ID=<?php $row['ID']; ?>">Edit</a>&nbsp;<a class="btn btn-info" href="delete.php?ID=<?php $row['ID']; ?>">Delete</a></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
        include "footer.php";
    ?>