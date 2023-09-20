<?php
include "header.php";
// include '../lib/session_timeout.php';
$con = mysqli_connect("localhost","root","","oms");

$viewch = $oms->view_quarter_summary($_POST);
$listAnnualPlan = $oms->listAnnualPlan();
$pendingAnnualPlan = $oms->pendingAnnualPlan();
$completeAnnualPlan = $oms->completeAnnualPlan();
$userCount = $oms->userCount();
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-home"></i>&nbsp;Dashboard&nbsp;<i class="fa fa-chevron-right"></i></h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">ARS</div>
                            <div>
                                <h4>Approved Quarter Exec Report Summary</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="approve_report.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div> -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">AP</div>
                            <div>
                                <h5>Approved Team</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="viewTeam.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                            <i class="fa fa-solid fa-check"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">AO</div>
                            <div>
                                <h5>Approve Audit Object</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="audit_object.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                            <i class="fa fa-solid fa-check"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">AA</div>
                            <div>
                                <h5>Approve Audital Areas</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="view_operational.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                            <!-- <i class="fa fa-users fa-fw"></i> -->
                            <!-- <i class="fa fa-solid fa-check"></i> -->
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                   echo $listAnnualPlan[0];
                                ?>
                            </div>
                            <div>
                                <h5>List of Annual Plan</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="list_annualplan.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                            <!-- <i class="fa fa-users fa-fw"></i> -->
                            <!-- <i class="fa fa-solid fa-check"></i> -->
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                   echo $pendingAnnualPlan[0];
                                ?>
                            </div>
                            <div>
                                <h5>Pending Annual Plan</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="pendingAnnualPlan.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                            <!-- <i class="fa fa-users fa-fw"></i> -->
                            <!-- <i class="fa fa-solid fa-check"></i> -->
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                   echo $completeAnnualPlan[0];
                                ?>
                            </div>
                            <div>
                                <h5>Completed Annual Plan</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="completeAnnualPlan.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                            <!-- <i class="fa fa-users fa-fw"></i> -->
                            <!-- <i class="fa fa-solid fa-check"></i> -->
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php
                                   echo $userCount[0];
                                ?>
                            </div>
                            <div>
                                <h5>Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="view-employee.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- /.row -->
        <div class="row">


            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <div>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Irregularity_type', 'amt'],
         <?php
         $sql = "SELECT * FROM quarter_summary";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Irregularity_type']."',".$result['amt']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Quarter Executive Summary Report',
          pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        // var chart = new google.visualization.BarChart(document.getElementById('Barchart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 375px; height: 300px;"></div>
    <!-- <div id="barchart" style="width: 900px; height: 500px;"></div> -->
  </body>
</html>

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
                    <table width="50%" class="table table-striped table-bordered table-hover" id="dataTables-plc">
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
                                    <!-- ------Edit Modal------ -->
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

</div>
<!-- /#wrapper -->


<?php
include "footer.php";
?>