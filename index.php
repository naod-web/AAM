<?php
include "lib/oms.php";
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/lib/session.php';
$oms = new Oms();
if (isset($_POST['login'])) {
    $login = $oms->login_check($_POST);
}
//Session::sessionCheck();
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
    <link rel="shortcut icon" type="image/png" href="image/favicons.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->


</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        &nbsp; &nbsp; <img src="image/favicon.png.png" width="280" height="125" title="COOP" alt="Logo of a company" />
                        <h3 class="panel-title text-center">AUDIT AUTOMATION SYSTEM</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                    <?php
                                    if (isset($login['email'])) {
                                        echo $login['email'];
                                    }
                                    ?>
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="myInput" required>
                                    <?php
                                    if (isset($login['password'])) {
                                        echo $login['password'];
                                    }

                                    ?>
                                </div>
                                <!-- <input type="checkbox"  onclick="myFunction()">Show Password -->
                                <!-- <input type="checkbox" onclick="myFunction()">Show Password -->
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Login">
                                <!-- <a href="forgot_passwd.php">Forgot Password?</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>



    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div>

            </div>
            <!-- <div class="me-2 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div> -->
            <!-- Left -->

            <!-- Right -->
            <div>
                <div>

                </div>


                <!-- <a href="https://twitter.com/Coopbankoromia?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="me-4 text-reset">
                    <i class="fa fa-twitter"></i>
                </a> -->
                <!-- <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a> -->
                <!-- <a href="" class="me-4 text-reset">
                    <i class="fa fa-instagram"></i>
                </a> -->
                <!-- <a href="https://www.linkedin.com/company/cooperative-bank-of-oromia/mycompany/" class="me-4 text-reset">
                    <i class="fa fa-linkedin"></i>
                </a> -->
                <!-- <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a> -->
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <!-- <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>COOPERATIVE BANK OF OROMIA
                        </h6> -->
                        <!-- <p>
                            Coop Bank of Oromia is the bank that committed to breakthrough!!
                            Work to become the Leading Private Bank in Ethiopia by 2025.
                        </p> -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            FAQ/HELP
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">FAQ</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>

                    </div>

                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <!-- <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="https://www.linkedin.com/company/cooperative-bank-of-oromia/mycompany/" class="text-reset">Linkedin Page</a>
                        </p>
                        <p>
                            <a href="https://www.facebook.com/cooperativebankoforomia/" class="text-reset">facebook</a>
                        </p>
                        <p>
                            <a href="https://twitter.com/Coopbankoromia?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="text-reset">Twitter</a>
                        </p> -->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <!-- <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6> -->
                        <!-- <p><i class="fa fa-home me-3"></i> Africa Avenue, Flamingo Area, Get House Building</p> -->
                        <!-- <p>
                            <i class="fa fa-envelope me-3"></i>
                            info@coopbankoromia.com.et
                        </p> -->
                        <!-- <p><i class="fa fa-phone me-3"></i> +251 11 515 0229</p> -->
                        <!-- <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p> -->
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <!-- <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021/22 Copyright:
            <a class="text-reset fw-bold" href="https://coopbankoromia.com.et/">Coop Bank of Oromia /</a></a>Developed by: Gemechu G. Bayisa

        </div> -->
        <!-- Copyright -->
    </footer>
    <!-- Footer -->






</body>

</html>