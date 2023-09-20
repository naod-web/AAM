<?php
ob_start();

include('../lib/oms.php');
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '../../lib/session.php';

Session::init();
$name = Session::get("name");
$msg = Session::get("loginmsg");
$id = Session::get("id");
$user_role = Session::get("user_role");
//Session::sessionCheck();

$oms = new oms();

// $taskLimit = $oms->view_task_limit();

//Count Inbox Item  
// $viewInbox = $oms->view_inbox($id);
// $countInbox = $oms->count_inbox($id);

// if (!isset($user_role) || $user_role != '0') {
//     Session::destroy();
//     //header("Location: ../index.php");
// }

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7500)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (!isset($user_role) || $user_role != '0') {
    session_unset();
    header("Location: ../index.php");
}

//Logout
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
    header("Location: ../index.php");
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
    <title>AAS - Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../image/favicons.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/metisMenu.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/morris.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div>
                &nbsp; &nbsp; <img src="../image/favicon.png.png" width="90" height="40" title="Logo of a company" alt="Logo of a company" />
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="user_dashboard.php">Audit Automation System</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- <li class="dropdown">
                    <a href="?action=ckeckout" class="btn btn-success"><strong>Check Out</strong></a>
                </li>
                 -->

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
                        <!-- <li class="sidebar-search"> -->
                        <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                        <!-- /input-group -->
                        <!-- </li> -->
                        <li>
                            <a href="user_dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <!-- <li>
                            <a href="engagement.php"><i class="fa fa-tasks fa-fw"></i> Engagement<span class="fa arrow"></span></a>
                        
                        </li> -->
                        <li>
                            <a href="engagemnt.php"><i class="fa fa-tasks fa-fw"></i>Engagement<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="view_risk_reg.php"><i class="fa fa-tasks fa-fw"></i> Risk Registration<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="view_risk_con.php"><i class="fa fa-reply-all"></i> Risk Control<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="find_registration.php"><i class="fa fa-plus fa-fw"></i> Finding<span class="fa arrow"></span></a>

                        </li>
                        <!-- <li>
                            <a href="aud_auditeeresponse.php"><i class="fa fa-plus fa-fw"></i> Finding Registration2<span class="fa arrow"></span></a>

                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-align-left"></i> &nbsp;Auditee Response</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="auditee_response.php"><i class="fa-solid fa fa-comments"></i> Auditee Response</a>
                                </li>
                                <li>
                                    <a href="resp_detail.php"><i class="fa-solid fa fa-comments"></i> View Auditee Response</a>
                                </li>
                                <!-- <li>
                                    <a href="response.php"><i class="fa fa-reply"></i> Auditor Opinion Against Auditee Response</a>
                                </li> -->

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa-sharp fa fa-solid fa-envelope"></i>&nbsp;Rectification</a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="rect_status.php"><i class="fa fa-reply-all"></i> View Rectification </a>
                                </li>
                                <li>
                                <a href="rect_detail.php"><i class="fa fa-reply"></i>&nbsp;Rectification</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa-sharp fa fa-solid fa-envelope"></i>&nbsp;Observation</a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="obser_user.php"><i class="fa fa-comment fa-fw"></i> </a>
                                </li>
                            </ul>
                        </li>
                        

                        <li>
                            <a href="#"><i class="fa fa-cog"></i>&nbsp;Setting</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="changeP.php"><i class="fa fa-reply-all"></i>&nbsp;Change Password</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 
                        <li>
                            <a href="setting.php"><i class="fa fa-cog fa-fw"></i> Setting</a>
                        </li> -->
                        <!-- <div>
                        <li>
                            <a><i class="fa fa-tasks fa-fw"></i> Task<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="task.php">Add Task</a>
                                </li>
                                <li>
                                    <a href="task-list.php">Task List</a>
                                </li>
                            </ul>
                        </li>  
                        </div> -->
                        <!-- <div>
                            <li>
                                <a href="message.php"><i class="fa fa-comment fa-fw"></i> Message</a>
                            </li>

                            <li>
                        </div> -->
                        <!-- <a href="#"><i class="fa fa-files-o fa-fw"></i> Report<span class="fa arrow"></span></a>
                            
                                <ul class="nav nav-second-level">
                                   <li>
                                        <a href="#">Daily Report</a>
                                    </li>
                                   
                                    <li>
                                        <a href="#">Monthly Report</a>
                                    </li>
                                </ul> -->
                        <!-- /.nav-second-level
                        </li>
                    </ul>
                </div>
                 /.sidebar-collapse 
            </div>
            /.navbar-static-side -->
        </nav>