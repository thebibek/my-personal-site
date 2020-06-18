<?php
include('config_session.php');
include 'all_functions.php';
$page = 'setting';

if (isset($_POST['submit_setting'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $title = $_POST['title'];
    $keyword = $_POST['keyword'];
    $des = addslashes($_POST['des']);

    $icon = $_POST['icon'];
    $social = $_POST['social'];

    $icon1 = $_POST['icon1'];
    $social1 = $_POST['social1'];

    $icon2 = $_POST['icon2'];
    $social2 = $_POST['social2'];

    $icon3 = $_POST['icon3'];
    $social3 = $_POST['social3'];

    $icon4 = $_POST['icon4'];
    $social4 = $_POST['social4'];

    $insert = mysql_query("UPDATE site SET name='$name', address='$address', phone='$phone', email='$email', title='$title', keyword='$keyword', des='".$des."', icon='$icon', social='$social', icon1='$icon1', social1='$social1', icon2='$icon2', social2='$social2', icon3='$icon3', social3='$social3', icon4='$icon4', social4='$social4'") or die(mysql_error());
    if ($insert) {
        store_log($user_id, $user_fullname.' Edited Site Setting');
        $message = 'Page has been Edited.';
    }
    else
    {
        $error = 'Page didn\'t Edit Try again!!!';
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
                                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                                </ol>
                            </nav>

                            <div class="row">
                                <div class="col-12">
                                    <div class="controls--area bg-boxshadow">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Card -->
                                                <form action="" method="post">
                                                    <div class="card mb-4">
                                                        <h3 class="card-header">Setting <button class="mb-xs mt-xs mr-xs modal-basic btn btn-primary f-right" name="submit_setting">Submit</button> </h3>
                                                        <!-- Card Body -->
                                                        
                                                        <div class="card-body">
                                                            <?php
                                                            $sql = mysql_query("SELECT * FROM site") or die(mysql_error());
                                                            while ($row = mysql_fetch_object($sql)) {
                                                            $phone = explode(',', $row->phone);
                                                            $email = explode(',', $row->email);
                                                            ?>
                                                            <h5>Website Information</h5>
                                                            <hr>
                                                            <p>
                                                                <b>Full Name</b>
                                                                <input type="text" class="form-control" placeholder="Full Name" name="name" required="" value="<?php print $row->name; ?>">
                                                            </p>
                                                            <p>
                                                                <b>Mobile Number</b>
                                                                <input type="text" class="form-control" placeholder="Mobile Number" name="phone" required="" value="<?php print $row->phone; ?>">
                                                            </p>
                                                            <p>
                                                                <b>Email</b>
                                                                <input type="text" class="form-control" placeholder="Email" name="email" required="" value="<?php print $row->email; ?>">
                                                            </p>
                                                            <p>
                                                                <b>Location</b>
                                                                <input type="text" class="form-control" placeholder="Location" name="address" required="" value="<?php print $row->address; ?>">
                                                            </p>
                                                            <hr>

                                                            <h5>Search Engine Optimization Meta</h5>
                                                            <hr>
                                                            <p>
                                                                <b>Meta Title</b>
                                                                <input type="text" class="form-control" placeholder="Meta Title" name="title" value="<?php print $row->title; ?>">
                                                            </p>
                                                            <p>
                                                                <b>Meta Keyword</b>
                                                                <input type="text" class="form-control" placeholder="Meta Keyword" name="keyword" value="<?php print $row->keyword; ?>">
                                                            </p>
                                                            <p>
                                                                <b>Meta Description</b>
                                                                <textarea class="form-control" placeholder="Meta Description" name="des"><?php print $row->des; ?></textarea>
                                                            </p>
                                                            <hr>

                                                            <h5>Social Media</h5>
                                                            <hr>
                                                            <p>
                                                                <input type="text" class="form-control col-md-2" placeholder="Icon" style="float: left;" name="icon" value="<?php print $row->icon; ?>">
                                                                <input type="text" class="form-control col-md-10" placeholder="Social Media Url" style="float: right;" name="social" value="<?php print $row->social; ?>">
                                                            </p>
                                                            <div class="clearfix" style="margin-bottom: 1%;"></div>
                                                            <p>
                                                                <input type="text" class="form-control col-md-2" placeholder="Icon" style="float: left;" name="icon1" value="<?php print $row->icon1; ?>">
                                                                <input type="text" class="form-control col-md-10" placeholder="Social Media Url" style="float: right;" name="social1" value="<?php print $row->social1; ?>">
                                                            </p>
                                                            <div class="clearfix" style="margin-bottom: 1%;"></div>
                                                            <p>
                                                                <input type="text" class="form-control col-md-2" placeholder="Icon" style="float: left;" name="icon2" value="<?php print $row->icon2; ?>">
                                                                <input type="text" class="form-control col-md-10" placeholder="Social Media Url" style="float: right;" name="social2" value="<?php print $row->social2; ?>">
                                                            </p>
                                                            <div class="clearfix" style="margin-bottom: 1%;"></div>
                                                            <p>
                                                                <input type="text" class="form-control col-md-2" placeholder="Icon" style="float: left;" name="icon3" value="<?php print $row->icon3; ?>">
                                                                <input type="text" class="form-control col-md-10" placeholder="Social Media Url" style="float: right;" name="social3" value="<?php print $row->social3; ?>">
                                                            </p>
                                                            <div class="clearfix" style="margin-bottom: 1%;"></div>
                                                            <p>
                                                                <input type="text" class="form-control col-md-2" placeholder="Icon" style="float: left;" name="icon4" value="<?php print $row->icon4; ?>">
                                                                <input type="text" class="form-control col-md-10" placeholder="Social Media Url" style="float: right;" name="social4" value="<?php print $row->social4; ?>">
                                                            </p>
                                                            <div class="clearfix"></div>
                                                            <hr>

                                                            <!-- <h5>Website Setting</h5>
                                                            <hr>
                                                            <p><input type="text" class="form-control" placeholder="Meta Keyword" name=""></p> -->

                                                            <footer class="panel_hwc_modal-footer">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="submit" name="submit_setting" class="btn btn-primary"> Submit Setting</button>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </footer>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Card -->
                                            </div>
                                            <!-- / Content -->
                                        </div>
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var max_fields      = 11;
                var wrapper         = $(".container1");
                var add_button      = $(".add_form_field1");

                var x = 1;
                $(add_button).click(function(e){
                    e.preventDefault();
                    if(x < max_fields){
                        x++;
                        $(wrapper).append('<div style="margin-bottom: 10px !important;"><input type="email" name="email" class="form-control" style="width: 80%; float: left;"/><a href="#" class="delete" style="width: 10%; float: left;">Delete</a><p style=clear: both;></p></div>'); //add input box
                    }
                  else
                  {
                  alert('You Reached the limits')
                  }
                });

                $(wrapper).on("click",".delete", function(e){
                    e.preventDefault(); $(this).parent('div').remove(); x--;
                })
            });
            $('.add_details').click(function(){
                if ($(this).hasClass('email')) {
                    $('.email_details').append('<p><input type="email" class="form-control" placeholder="Email Address" name="email[]" required="" ></p>');
                }
                else if ($(this).hasClass('phone')) {
                    $('.phone_details').append('<p><input type="text" class="form-control" placeholder="Telephone / Mobile" name="phone[]" required=""></p>');
                }
            });
            $('.delete_details').click(function(){
                var id = this.id;
                if ($(this).hasClass('email')) {
                    $('.'+id).empty();
                }
                else if ($(this).hasClass('phone')) {
                    $('.'+id).empty();
                }
            });
        </script>
    </body>
</html>