<?php

include 'header.php';

$log = $oms->view_log();

?>


<!-- --------------------------------- -->
<!-- EDIT POP UP FORM (BOOTSTRAP MODAL) -->
<!-- --------------------------------- -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-md- col-md-offset-1">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h1 class="page-header">Log</h1>
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" value="">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                <div class="panel-heading">

                </div>



                <!-- =========================================== -->


                <!-- /.panel-heading -->
                <div class="panel-body">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>



                                <th>datetime</th>
                                <th>ip</th>
                                <th>hostname</th>
                                <th>uri</th>
                                <th>agent</th>
                                <th>referer</th>
                                <th>domain</th>
                                <th>filename</th>
                                <th>method</th>
                                <th>data</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($log) {
                                foreach ($log as $RegValue) {
                            ?>
                                    <tr class="odd gradeX">



                                        <td><?php echo $RegValue['datetime']; ?></td>
                                        <td><?php echo $RegValue['ip']; ?></td>
                                        <td><?php echo $RegValue['hostname']; ?></td>
                                        <td><?php echo $RegValue['uri']; ?></td>
                                        <td><?php echo $RegValue['agent']; ?></td>
                                        <td><?php echo $RegValue['referer']; ?></td>
                                        <td><?php echo $RegValue['domain']; ?></td>
                                        <td><?php echo $RegValue['filename']; ?></td>
                                        <td><?php echo $RegValue['method']; ?></td>
                                        <td><?php echo $RegValue['data']; ?></td>

                                    </tr>


                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- <script>
                        function show() {
                            var rowId =
                                event.target.parentNode.parentNode.id;
                            //this gives id of tr whose button was clicked
                            var data =
                                document.getElementById(rowId).querySelectorAll(".row-data");
                            /*returns array of all elements with 
                            "row-data" class within the row with given id*/

                            var Audit_activities = data[0].innerHTML;
                            var Team = data[1].innerHTML;
                            

                        }
                    </script> -->
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
include "footer.php";
?>