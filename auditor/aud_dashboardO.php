<?php
include "aud_header.php";
// include '../lib/session_timeout.php';
// $con = mysqli_connect("localhost","root","","oms");
?>
<div id="page-wrapper">
<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header"><i class="fa fa-home"></i>&nbsp;Auditor Dashboard</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        
        </div>
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
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">RC</div>
                            <div>
                                <h5>Approved Audit Program</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="view_audit_prog.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"></div>
                            <div>Temp team!</div>
                        </div>
                    </div>
                </div>
                <a href="view_team.php">
                    <div class="panel-footer">
                        <span class="pull-left">View detail</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"></div>
                            <div>Engagement!</div>
                        </div>
                    </div>
                </div>
                <a href="engagemnt.php">
                    <div class="panel-footer">
                        <span class="pull-left">View detail</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task_name', 'S_date'],
         <?php
         $sql = "SELECT * FROM wbs";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Task_name']."',".$result['S_date']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Workbreakdown',
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
                    <h5>Work breakdown</h5>

                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- <input type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')" /> -->
                    <!-- <button type="submit" name="buttonDelete" value="Delete" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-trash"> Delete</span></button> -->
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>S_date</th>
                                <th>E_date</th>

                                <!-- <th>Operation</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($viewch) {
                                foreach ($viewch as $DeValue) {
                            ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $DeValue['Task_name']; ?></td>
                                        <td><?php echo $DeValue['S_date']; ?></td>
                                        <td><?php echo $DeValue['E_date']; ?></td>
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

        <!-- /.row -->
        <div class="row">


            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <div>


</div>
<!-- /#wrapper -->


<?php
include "footer.php";
?>