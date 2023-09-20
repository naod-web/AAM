<?php
ob_start();
include '../lib/oms.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '../../lib/session.php';
Session::init();
$name = Session::get("name");
$msg = Session::get("loginmsg");
$id = Session::get("id");
$user_role = Session::get("user_role");
//Session::sessionCheck();
// include '../lib/session_timeout.php';


$oms = new oms();

// $taskLimit = $oms->view_task_limit();

//Count Inbox Item  
// $viewInbox = $oms->view_inbox($id);
// $countInbox = $oms->count_inbox($id);

// if(!isset($audit_type) || )

// if (!isset($user_role) || $user_role != '3') {
//     Session::destroy();
//     //header("Location: ../index.php");
// }

// if (!isset($user_role) || $user_role = '3') {
//     header("");
// } elseif (!isset($user_role) || $user_role != '3') {
//     Session::destroy();
//     header("Location:../index.php");
// }

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7500)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (!isset($user_role) || $user_role != '3') {
    session_unset();
    header("Location: ../index.php");
}

//Logout
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
    header("Location: ../index.php");
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
    <link rel="shortcut icon" type="image/png" href="../image/favicons.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/metisMenu.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/morris.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
     -->
    <!-- `boot for export in doc -->
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></scrip>
    <script src="../js/repeater.js" type="text/javascript"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
    <div id="wrapper">


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div>
                &nbsp; &nbsp; &nbsp; &nbsp; <img src="../image/favicon.png.png" width="90" height="40" title="Logo of a company" alt="Logo of a company" />
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="tm_dashboard.php">Audit Automation System</a>
            </div>
            <!-- /.navbar-header -->


            <ul class="nav navbar-top-links navbar-right">


                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
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
                        <li>
                            <a href="tm_dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-briefcase"></i> Plan<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_annualplan.php"><i class="fa fa-reply-all"></i>&nbsp;Plan Creation</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <a href="engagement.php"><i class="fa fa-solid fa-folder-open"></i>&nbsp; Enagagement</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-align-left"></i> &nbsp; Audit Program<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="modify_auditwork.php"><i class="fa fa-solid fa-check"></i>&nbsp; Approve Audit Program</a>
                                </li>
                                <li>
                                    <a href="view_aud_program_wbs.php"><i class="fa fa-reply"></i>&nbsp; View Approved Audit program</a>
                                </li>
                                <li>
                                    <a href="view_wbs.php"><i class="fa fa-reply-all"></i>&nbsp; View List of WBD</a>
                                </li>
                                <!-- <li>
                                    <a href="view_audit_program.php"><i class="fa fa-reply-all"></i> &nbsp; Approve Audit Program</a>

                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="checklist.php"><i class="fa fa-solid fa-check"></i>&nbsp; Checklist </a>
                        </li>
                        <!-- <li>
                            <a href="repor.php"><i class="fa fa-plus fa-fw"></i> Check </a>
                        </li> -->
                        <li>
                            <a href=""><i class="fa fa-users"></i>&nbsp; View Team <span class=""></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="temp_team.php"><i class="fa fa-reply-all"></i>&nbsp;View Temporary Team/ Ad-hoc</a>
                                </li>
                                <!-- <li>
                                    <a href="viewTeam.php"><i class="fa fa-reply-all"></i>&nbsp; View Approved Team</a>
                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder-open"></i>&nbsp; Introduction Letter<span class=""></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="intro_letter.php"><i class="fa fa-reply-all"></i>&nbsp;Introduction Letter<span class=""></span></a>
                                    <!-- <a href="http://desktop-ece92r2/Reports/Pages/Report.aspx?ItemPath=%2fuser%2fIntroduction+Letter" onclick="NewQTab()"><i class="fa fa-reply-all"></i>&nbsp; Introduction Letter<span class=""></span></a> -->

                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="find_registration.php"><i class="fa fa-plus fa-fw"></i> Finding Registration</a>
                        </li>
                        <!-- <li>
                            <a href="detail_det.php"><i class="fa fa-reply-all"></i>&nbsp; Finding Detail</a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-folder-open"></i>&nbsp; Report<span class=""></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href=""><i class="fa fa-files-o fa-fw"></i> Quarter Executive Report Summary <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="Quarter_summary.php"><i class="fa fa-reply-all"></i>&nbsp; Quarter Executive Summary</a>
                                        </li>
                                        
                                        <!-- <li>
                                            <a href="list_quartersummary.php"><i class="fa fa-reply-all"></i>&nbsp; Quarter Executive Summary List</a>
                                        </li> -->
                                    </ul>
                                </li>


                                <li>
                                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Report Summary<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">

                                        <li>
                                            <a href="report_summary.php"><i class="fa fa-reply-all"></i>&nbsp; Report Summary</a>
                                        </li>
                                        <li>
                                            <a href="qreport_summary.php"><i class="fa fa-reply"></i>&nbsp; summary</a>
                                        </li>
                                        <li>
                                            <a href="rep_summary.php"><i class="fa fa-reply"></i>&nbsp; RR summary</a>
                                        </li>
                                        <!-- <li>
                                            <a href="list_annualplan.php"><i class="fa fa-reply-all"></i>&nbsp; Annual Plan List</a>
                                        </li> -->

                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>

                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-cog"></i>&nbsp;Setting</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="audit_objectOld.php"><i class="fa fa-reply-all"></i>&nbsp;Audit Object</a>
                                </li>
                                <!-- <li>
                                    <a href="operational.php"><i class="fa fa-reply-all"></i>&nbsp; Operational/Area of Audit</a>
                                </li> -->
                                <li>
                                    <a href="ply.php"><i class="fa fa-solid fa-envelope"></i>&nbsp; Policy Procedures</a>
                                </li>
                                <li>
                                    <a href="plan_year.php"><i class="fa fa-regular fa-calendar"></i>&nbsp; Plan year</a>
                                </li>
                                <!-- <li>
                                    <a href="chk_engagement.php"><i class="fa fa-regular fa-calendar"></i>&nbsp; Engagement</a>
                                </li> -->
                                <li>
                                    <a href="changeP.php"><i class="fa fa-solid fa-wrench"></i>&nbsp;Change Password</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>