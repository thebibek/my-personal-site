<?php
include('config_session.php');
include 'all_functions.php';
$page = 'profile';

    if(isset($_POST['change_pwd']))
    {
        $old_password=$_POST['old_password'];
        $new_password=$_POST['new_password'];
        $con_password=$_POST['con_password'];

        $chg_pwd=mysql_query("SELECT * FROM admin WHERE user_id='$user_id'");
        $chg_pwd1=mysql_fetch_array($chg_pwd);
        $data_pwd=$chg_pwd1['password'];

        if($data_pwd==$old_password){
            if($new_password==$con_password){
                $update_pwd=mysql_query("UPDATE admin SET password='$new_password' WHERE user_id='$user_id'");
                $change_pwd_error="Update Sucessfully !!!";
            }
            else{
                $change_pwd_error="Your new and Retype Password is not match !!!";
            }
        }
        
        else
        {
            $change_pwd_error="Your old password is wrong !!!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>HWC - CMS</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">
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
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col">
                                <!-- Information -->
                                <div class="card-- bg-boxshadow mb-30">
                                    <h3>My Log</h3>
                                    <hr>
                                    <div class="card--body" style="height: 600px; overflow-y: scroll; overflow-x: hidden;">
                                        <?php
                                            $sql = mysql_query("SELECT * FROM action_log WHERE user_id  = '$user_id' order by log_id DESC");
                                            while ($row = mysql_fetch_object($sql)) {
                                        ?>
                                            <div class="row mb-2">
                                                <div class="col-1 text-muted"><i class="fa fa-check"></i></div>
                                                <div class="col-4 text-muted">
                                                    <h6 class="font--weigth-200 font-s--14"><b><?php echo $row->action; ?></b></h6>
                                                </div>
                                                <div class="col-4">
                                                    <p class="mb-0 text-dark"><?php echo date('M d, Y', strtotime($row->entry_date)).' '.date('h: i a', strtotime($row->entry_time)); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Skills -->
                                <div class="card bg-boxshadow mb-30">
                                    <div class="profile--thumb col-md-4">
                                        <?php
                                        if (isset($_SESSION["cms_usergender"])) {
                                            if ($_SESSION["cms_usergender"] == 'male') {
                                                print '<i class="icon-profile-male"></i>';
                                            }
                                            else if ($_SESSION["cms_usergender"] == 'female') {
                                                print '<i class="icon-profile-female"></i>';
                                            }
                                        } 
                                        ?>
                                    </div>
                                    <?php  
                                        $sql_user_info = mysql_query("SELECT * FROM admin WHERE id = '$user_id'") or die(mysql_error());
                                        $row_user_info = mysql_fetch_object($sql_user_info);
                                    ?>
                                    <h3><?php echo $row_user_info->name; ?></h3>
                                        <!-- <p class="text-right"><a href=""> Edit Profile</a></p> -->
                                    <hr>
                                    <div class="card--body">
                                        <!-- Contact Area -->
                                        <h6 class="my-3 font-s--14"><b>Personal Information</b></h6>

                                        <div class="row mb-2">
                                            <div class="col-4 text-muted">
                                                <h6 class="font--weigth-300 font-s--14"><b>Gender: </b></h6>
                                            </div>
                                            <div class="col-8">
                                                <p class="mb-0 text-dark"><?php echo ucfirst($row_user_info->gender); ?></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4 text-muted">
                                                <h6 class="font--weigth-300 font-s--14"><b>Address: </b></h6>
                                            </div>
                                            <div class="col-8">
                                                <p class="mb-0 text-dark"><?php echo ucfirst($row_user_info->address); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Change Password -->
                                <div class="card bg-boxshadow mb-30" id="settings">
                                    <h5>Change Password</h5>
                                    <hr>
                                    <form action="" method="post">

                                        <p><input type="password" name="old_password" class="form-control" placeholder="Old Password" required=""></p>

                                        <p><input type="password" name="new_password" class="form-control" placeholder="New Password" required=""></p>

                                        <p><input type="password" name="con_password" class="form-control" placeholder="Conform Password" required=""></p>

                                        <footer class="panel_hwc_modal-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" name="change_pwd" class="btn btn-primary"> Change Password </button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </footer>
                                    </form>
                                </div>

                            </div>
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

    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/session_log.js"></script>
</body>

</html>