<?php
include('config_session.php');
$page = 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Colors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>HWC - CMS</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">
    <!-- C3 Charts Stylesheet -->
    <link rel="stylesheet" href="css/plugins/c3-chart-css/c3.min.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <div class="page-wrapper">

        <!-- ###### Layout Container Area ###### -->
        <div class="layout-container-area">

            <!-- Side Menu Area -->
            <?php include 'inc_siderbar.php'; ?>

            <!-- Layout Container -->
            <div class="layout-container sidemenu-container">

                <!-- ***** Page Top Bar Area ***** -->
                <?php include 'inc_header.php'; ?>

                <!-- Wrapper -->
                <div class="wrapper wrapper-content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Card Area -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card bg-white zoom-effect bg-boxshadow-2 mb-30">
                                    
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Site Settings</h5>
                                        </a>
                                        <a href="setting.php" class="btn btn-primary card-btn color-white">View List</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Area -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card bg-white zoom-effect bg-boxshadow-2 mb-30">
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Message</h5>
                                        </a>
                                        <a href="messages.php" class="btn btn-primary card-btn color-white">View List</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card bg-white zoom-effect bg-boxshadow-2 mb-30">
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title">Message From Quotes</h5>
                                        </a>
                                        <a href="subscriber.php" class="btn btn-primary card-btn color-white">View List</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Area -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- jQuery 2.2.4 -->
    <script src="assets/js/jquery/jquery.2.2.4.min.js"></script>
    <!-- Bootsrap js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins-js/menu-active.js"></script>

    <script src="js/plugins-js/calendar-js/fullcalendar-moment.min.js"></script>
    <script src="js/plugins-js/calendar-js/fullcalendar.min.js"></script>
    <script src="js/plugins-js/calendar-js/ui-fullcalendr.js"></script>

    <!-- Plugins js -->
    <script src="js/plugins-js/d3-c3-js/c3.min.js"></script>
    <script src="js/plugins-js/d3-c3-js/d3.min.js"></script>
    <script src="js/plugins-js/d3-c3-js/active.js"></script>

    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/session_log.js"></script>

</body>


</html>