<?php

include "tm_header.php";

$viewAssign = $oms->view_temp_team($_POST);

?>


<div id="page-wrapper" class="">


    <div class="row">
        <div class="col-sm-10">
            <br>
            <button type="button" id="new" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                New Team <i class="fa fa-plus-square"></i>
            </button>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ad-hoc List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover mx-auto" id="dataTables-example">
                        <thead>
                            <tr>

                                <th>Ad-hoc</th>
                                <th>Team_member</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if ($viewAssign) {
                                foreach ($viewAssign as $DeValue) {
                            ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $DeValue['Ad_hoc']; ?></td>
                                        <td><?php echo $DeValue['Team_member']; ?></td>
                                        <td> <input type="radio" name="status" id="optionsRadiosInline1" value="1" checked>Active &nbsp; <input type="radio" name="status" id="optionsRadiosInline2" value="0">Inactive </td>
                                        <td>
                                            <button type="submit" class="btn btn-success " data-toggle="modal" data-target="#exampleModal<?php echo $RegValue['id'] ?>"> Edit</button>
                                            <button type="button" class="btn btn-danger " onclick="DeleteUser('.$i.')"> Delete</button>
                                        </td>

                                    </tr>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <form role="form" method="post">
                                                        <div class="form-group">
                                                            <label>Ad-hoc</label>
                                                            <input type="text" name="Ad_hoc" id="Ad_hoc" class="form-control">
                                                            <?php
                                                            if (isset($saveteam['Ad_hoc'])) {
                                                                echo $saveteam['Ad_hoc'];
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Team Member</label>
                                                            <input type="text" name="Team_member" id="Team_member" class="form-control">
                                                            <?php
                                                            if (isset($saveteam['Team_member'])) {
                                                                echo $saveteam['Team_member'];
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" checked>Active
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0">Inactive
                                                            </label>
                                                        </div>
                                                        <input type="submit" name="team_save" class="btn btn-primary" value="Save">
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

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



<?php
include "footer.php";
?>