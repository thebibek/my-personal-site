<?php 
session_start();
include 'config.php';
include 'all_functions.php';
if (isset($_SESSION["cms_user_id"])) {
   header("Location:index.php");
   exit;
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != '' && $password != '') {
        $password = md5($password);
        $sql = mysql_query("SELECT * FROM team WHERE username = '$username' LIMIT 1") or die(mysql_error());
        $row = mysql_fetch_assoc($sql);
        if (mysql_num_rows($sql) == 1) {
            if ($row['password'] == $password) {
                if($row['user_status'] == 1){
                    $_SESSION["cms_user_name"]=$row['username'];
                    $_SESSION["cms_user_id"]=$row['id'];
                    $_SESSION["cms_user_fullname"]=$row['name'];
                    $_SESSION["cms_usergender"]=$row['gender'];
                    $_SESSION["cms_useremail"]=$row['email'];
                    $_SESSION['loggedin_time'] = time();

                    store_log($row['id'],$row['name'].' Logged in.');
                    header("Location:index.php");
                    exit;
                }
                else{
                    $error = '<p><strong style="color: red;">Your account is not active.<br/>Please contact admin for your issues</strong></p>';
                }
            }
            else{
                $error = '<p><strong style="color: red;">Password not match</strong></p>';
            }
        }
        else{
            $error = '<p><strong style="color: red;">Invalid username/password</strong></p>';
        }
    }
    else{
        $error = '<p><strong style="color: red;">Enter username and password</strong></p>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Login | HWC - CMS</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <div class="page-wrapper bg-img" style="background-image: url(img/thumbnails-img/bg-5.jpg);">
        <!-- Wrapper -->
        <div class="wrapper wrapper-content---">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Middle Box -->
                        <div class="middle-box bg-boxshadow text-center">
                            <h6 class="mb-30">Login to your Account</h6>
                            <center> 
                                <h5 style="color: red;">
                                    <?php 
                                    if(isset($error))
                                        print $error;
                                    elseif(isset($_GET['error']))
                                    print $_GET['error'];
                                    if (isset($_GET['session_expired'])) {
                                        print '<p><strong>Your session has been expired</strong></p>';
                                    }
                                    ?>
                                </h5>
                            </center>
                            <!-- Form -->
                            <form class="#" action="" method="POST">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="User Name" required="">
                                </div>

                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                </div>

                                <button type="submit" class="btn btn-primary register" name="login">Login</button>
                                <a class="forgot_pass" href="#"><small>Forgot password?</small></a>
                                <p class="text-center"><small>Do not have an account? Please!! contact super admin.</small></p>
                            </form>
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

    <!-- Active js -->
    <script src="js/active.js"></script>

</body>


<!-- Mirrored from demo.designing-world.com/rubix-v2/theme/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Nov 2018 10:31:49 GMT -->
</html>