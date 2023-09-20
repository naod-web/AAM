<?php
ob_start();
include 'lib/oms.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/session.php';
Session::init();
$name = Session::get("name");

$msg = Session::get("loginmsg");
$id = Session::get("id");
$user_role = Session::get("user_role");
//Session::sessionCheck();
// include "lib/session_timeout.php";

$oms = new oms();

// $taskLimit = $oms->view_task_limit();

// //Count Inbox Item  
// $viewInbox = $oms->view_inbox($id);
// $countInbox = $oms->count_inbox($id);

// if (!isset($user_role) || $user_role != '1') {
//     Session::destroy();
//     //header("Location: index.php");
// }

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7500)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stampt


if (!isset($user_role) || $user_role != '1') {
    session_unset();
    header("Location: index.php");
}



//Logout
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
}

//Check Out
if (isset($_GET['action']) && $_GET['action'] == "ckeckout") {
    $empCheckout = $oms->ckeckout_time($id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AAS </title>
    <link rel="shortcut icon" type="image/png" href="image/favicons.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/morris.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">


</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div>

            </div>
            <div>
                &nbsp; &nbsp; &nbsp; &nbsp; <img src="image/favicon.png.png" width="90" height="40" title="Logo of a company" alt="Logo of a company" />
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Audit Automation System</a>
            </div>
            <!-- /.navbar-header -->


            <ul class="nav navbar-top-links navbar-right">


                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a> -->

                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php if (isset($name)) {
                                                                echo $name;
                                                            } ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <!-- <li><a href="setting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                             //input-group 
                        </li>  -->
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-employee.php"> <i class="fa fa-user-plus"> &nbsp;</i>Add User/ User Creation</a>
                                </li>
                                <li>
                                    <a href="view-employee.php">View User List</a>
                                </li>

                            </ul>
                            /.nav-second-level
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-briefcase"></i> Plan<span class="fa briefcase"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view-annual-plan.php"><i class="fa fa-reply-all"></i>&nbsp;Plan</a>
                                </li>

                            </ul>
                        </li>
                        <!-- <li>
                            <a href="approve_temp_team.php"><i class="fa fa-folder-open"></i>&nbsp; Temporary Team Approval<span class=""></span></a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-align-left"></i> &nbsp; Audit Program<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_audit_prog.php"><i class="fa fa-reply-all"></i>&nbsp; Approved Audit Program</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="policy_procedure.php"><i class="fa fa-folder-open"></i>&nbsp; Policy Procedure<span class=""></span></a>
                        </li> -->
                        <li>
                            <a href="ply.php"><i class="fa fa-reply-all"></i>&nbsp; Policy Procedures</a>
                        </li>


                        <!-- <li>
                            <a href=""><i class="fa fa-plus fa-fw"></i> Add Designation</a>
                        </li> -->


                        <!-- <li>
                            <a><i class="fa fa-tasks fa-fw"></i> Task<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="task.php">Add Task</a>
                                </li>
                                <li>
                                    <a href="task-list.php">Task List</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li>
                            <a href="message.php"><i class="fa fa-comment fa-fw"></i> Message</a>
                        </li> -->

                        <li>
                            <a href="#"><i class="fa fa-folder-open"></i>&nbsp;Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li>
                                    <a href="#">Monthly Report</a>
                                </li> -->
                                <li>
                                    <a href="#" onclick="NewQTab()"><i class="fa fa-files-o fa-fw"></i> Quarter Executive Summary</a>
                                </li>
                                <li>
                                    <a href="#" onclick="NewTab()"><i class="fa fa-files-o fa-fw"></i> Report Summary</a>
                                </li>
                                <li>
                                    <a href="#" onclick="NewFTab()"><i class="fa fa-files-o fa-fw"></i> Finding Registration and Findindg Detail</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog"></i>&nbsp;Setting</a>
                            <ul class="nav nav-second-level">
                            <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-employee.php"> <i class="fa fa-user-plus"> &nbsp;</i>Add User/ User Creation</a>
                                </li>
                                <li>
                                    <a href="view-employee.php"><i class="fa fa-reply-all"></i>&nbsp;View User List</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                                </li>
                                <li>
                                <a href="#">Approval<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                <li>
                                    <a href="auditee.php"><i class="fa fa-reply-all"></i>&nbsp;Approve Auditee</a>
                                </li>
                                <li>
                                    <a href="audit_object.php"><i class="fa fa-reply-all"></i>&nbsp;Approve Audit Object</a>
                                </li>
                                <li>
                                    <a href="operational_approval.php"><i class="fa fa-reply-all"></i>&nbsp;Approve Auditable Area</a>
                                </li>
                                <li>
                                    <a href="chk_approval.php"><i class="fa fa-reply-all"></i>&nbsp;Checklist</a>
                                </li>
                                </ul>
                                </li>
                                <li>
                                    <a href="audit_type.php"><i class="fa fa-reply-all"></i>&nbsp;Audit type</a>
                                </li>
                                <li>
                                    <a href="changeP.php"><i class="fa fa-solid fa-wrench"></i>&nbsp;Change Password</a>
                                </li>
                                <li>
                                    <a href="logM.php"><i class="fa fa-duotone fa-gear"></i> &nbsp;Activity log</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    </div>