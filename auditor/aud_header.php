<?php
ob_start();
include '../lib/oms.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '../../lib/session.php';
Session::init();
$name = Session::get("name");
// $p_id = Session::get("p_id");
$msg = Session::get("loginmsg");
$id = Session::get("id");
$user_role = Session::get("user_role");
//Session::sessionCheck();

$oms = new oms();



// if (!isset($user_role) || $user_role != '2' ) {
//     session_unset();
//     header("Location: ../index.php");
// }

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7500)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

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
    <title>AAS</title>
    <!-- <script src="../js/ckeditor1.js"></script> -->
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
        <div>

        </div>
        <div>
            &nbsp; &nbsp; &nbsp; &nbsp; <img src="../image/favicon.png.png" width="90" height="40" title="Logo of a company" alt="Logo of a company" />
        </div>

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

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

            <div>
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">


                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Message!
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
                                <a href="view_risk_registration.php">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> RF
                                        <span class="pull-right text-muted small">View Risk Registration</span>
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

                        <a class="dropdown-toggle" data-toggle="dropdown" href="../index.php">
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
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="aud_dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>

                        <!-- <li>
                            <a href="introduction_letter.php"><i class="fa fa-plus fa-fw"></i> Introduction Letter</a>
                        </li> -->

                        <li>

                        <li>
                            <a href="#"><i class="fa fa-align-left"></i> &nbsp; Audit Program<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                    <a href="engagemnt.php"><i class="fa fa-reply-all"></i>&nbsp; View Engagement</a>
                                </li>
                            <!-- <li>
                                
                                    <a href="Audit_program.php"><i class="fa fa-reply-all"></i>&nbsp; Audit Program</a>
                                </li> -->
                                <li>
                                    <a href="modify_auditwork.php"><i class="fa fa-reply-all"></i>&nbsp; Audit Program</a>
                                </li>
                                <!-- <li>
                                    <a href="view_audit_prog.php"><i class="fa fa-reply-all"></i>&nbsp; Approved Audit Program</a>
                                </li> -->
                                <!-- <li>
                                    <a href="WBS.php"><i class="fa fa-archive"></i>&nbsp;Work Breakdown</a>
                                </li> -->

                                <li>
                                    <a href="view_wbs.php"><i class="fa fa-archive"></i>&nbsp;view wbs</a>
                                </li>
                                <!-- <li>
                                    <a href="view_audit_prog_wbs.php"><i class="fa fa-archive"></i>&nbsp;Audit Program With WB</a>
                                </li> -->
                            </ul>
                            <!-- <a href="#"> <i class="fa fa-archive"></i> &nbsp; Work breakdown structure<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="WBS.php"><i class="fa fa-reply-all"></i>&nbsp;Work Breakdown</a>
                                </li>

                                <li>
                                    <a href="view_wbs.php"><i class="fa fa-reply-all"></i>&nbsp;view wbs</a>
                                </li>

                            </ul> -->
                        </li>
                        <!-- <li>
                            <a href="#"> <i class="fa fa-archive"></i> &nbsp; Work breakdown structure<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <a href="WBS.php"><i class="fa fa-reply-all"></i>&nbsp;Work Breakdown</a>
                                </li>

                                <li>
                                    <a href="view_wbs.php"><i class="fa fa-reply-all"></i>&nbsp;view wbs</a>
                                </li>

                            </ul>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-folder-open"></i> &nbsp; Risk control & Registered <span class=""></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_risk_registration.php"><i class="fa fa-reply-all"></i>&nbsp; View Risk Registration</a>
                                </li>
                                <li>
                                    <a href="view_con_risk.php"><i class="fa fa-reply-all"></i>&nbsp; View Risk Control</a>
                                </li>


                            </ul>
                        </li>
                        <li>
                            <a href="find_registration.php"><i class="fa fa-check-square"></i>&nbsp; Finding Registration<span class=""></span></a>
                        </li>
                        <ul class="nav nav-second-level">

                            <!-- <li>
                                <a href="detail_finding.php"><i class="fa fa-check-square"></i>&nbsp; Finding Detail<span class=""></span></a>
                            </li>
                            <li>
                                <a href="detail_det.php"><i class="fa fa-reply-all"></i>&nbsp; Detail Finding </a>

                            </li> -->
                            <!-- <li>
                                <a href="view_auditee_response.php"><i class="fa fa-reply-all"></i>&nbsp; Auditee Response </a>

                            </li> -->
                            <li>
                                <a href="v_resp.php"><i class="fa fa-reply-all"></i>&nbsp; Auditee Response </a>

                            </li>
                            <li>
                                <a href="rectf_status.php"><i class="fa fa-reply-all"></i>&nbsp; Rectification  </a>

                            </li>
                            <!-- <li>
                                <a href="approve_finding.php"><i class="fa fa-reply-all"></i>&nbsp; Finding Registration[Approved] </a>

                            </li> -->

                        </ul>
                        </li>



                        <li>
                            <a href="view_team.php"><i class="fa fa-reply-all"></i>&nbsp;Temp team/ Ad-hoc Assignment <span class=""></span></a>
                        </li>

                        <li>
                            <a href="supporting_file.php"><i class="fa fa-check-square"></i>&nbsp; Supporting Document<span class=""></span></a>
                        </li>
                        <li>
                            <a href="observation.php"><i class="fa fa-check-circle"></i>&nbsp; General Observation<span class=""></span></a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-cog"></i>&nbsp;Setting</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="changeP.php"><i class="fa fa-reply-all"></i>&nbsp;Change Password</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>

        </nav>
    </div>