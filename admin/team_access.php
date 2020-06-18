<?php
include('config_session.php');
$page = 'team';
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
    <link rel="stylesheet" href="assets/magnific-popup/magnific-popup.css">

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="assets/select2/select2.css">
    <link rel="stylesheet" href="assets/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    
    <!-- Content Editor -->
    <link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />

    <style type="text/css">
        .form-bordered .form-group {
            border-bottom: 1px solid #eff2f7;
            padding-bottom: 15px;
            margin-bottom: 15px;
            display: inline-flex;
            width: 100%;
        }
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page">Menu Postion</li>
                                <li class="breadcrumb-item active" aria-current="page">Team Access</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox bg-boxshadow mb-30">


                                    <!-- Ibox Content -->
                                    <div class="ibox-content">
                                    <div class="panel-body">
                                        <form class="form-horizontal form-bordered" action="" method="post">
                                        <?php 
                                        $id = $_GET['id'];

                                        $sql = mysql_query("SELECT * FROM admin where id =$id");
                                        while ($row = mysql_fetch_object($sql)) {?>
                                            <div class="form-group">
                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Site Setting</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->site==1){ print 'checked="checked"';} ?> id="site" class="access" onchange="f1('site')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            
                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Slider Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->slider==1){ print 'checked="checked"';} ?> id="slider" class="access" onchange="f1('slider')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">News Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->news==1){ print 'checked="checked"';} ?> id="news" class="access" onchange="f1('news')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>

                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Event Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->event==1){ print 'checked="checked"';} ?> id="event" class="access" onchange="f1('event')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">About Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->menu_access ==1){ print 'checked="checked"';} ?> id="menu_access" class="access" onchange="f1('menu_access')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>

                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Team Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->team ==1){ print 'checked="checked"';} ?> id="team" class="access" onchange="f1('team')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Gallery Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->gallery ==1){ print 'checked="checked"';} ?> id="gallery" class="access" onchange="f1('gallery')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>

                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Brochure Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->service ==1){ print 'checked="checked"';} ?> id="service" class="access" onchange="f1('service')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Job Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->package ==1){ print 'checked="checked"';} ?> id="package" class="access" onchange="f1('package')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>

                                                <label class="control-label col-md-1"></label>
                                                <label class="col-md-3">Agency & Business Management</label>
                                                <div class="col-md-2" style="text-align: center;">
                                                    <label class="control-label switch">
                                                        <input  type="checkbox" name="switch" data-plugin-ios-switch <?php if($row->smenu ==1){ print 'checked="checked"';} ?> id="smenu" class="access" onchange="f1('smenu')"/>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery/jquery.2.2.4.min.js"></script>
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
     <script src="assets/magnific-popup/magnific-popup.js"></script>
    <script src="assets/magnific-popup/examples.modals.js"></script>
    <script src="js/plugins-js/menu-active.js"></script>
    <script src="assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
     <script src="assets/select2/select2.js"></script>
     <script type="text/javascript" src="js/widgEditor.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/session_log.js"></script>
    <script>
        $('.simple-ajax-popup').magnificPopup({
            type: 'ajax',
            overflowY: 'scroll'
        });
        <?php if (isset($message)) { 
        ?>
        $(window).load(function () {
            $.magnificPopup.open({
                items: {
                    src: '#Success'
                },
                  type: 'inline',
                    preloader: false,
                    modal: true
            });
        });
    <?php } ?>
    <?php if (isset($error)) { 
        ?>
        $(window).load(function () {
            $.magnificPopup.open({
                items: {
                    src: '#Error'
                },
                  type: 'inline',
                    preloader: false,
                    modal: true
            });
        });
    <?php } ?>

    function confirm_delete(id)
    {
        var id = id;
        console.log(id);
        var link = '?del='+id;
        $('.delete_id').attr('href','?del='+id);
        $.magnificPopup.open({
                items: {
                    src: '#confirm_delete'
                },
                  type: 'inline',
                  preloader: false,
                  modal: true
            });
    }
        function f1(id){
            var access_field = id;
            var value = $('#'+id).is(':checked');
            var id = <?php print $_GET['id']; ?>;
            if(value == true){
                value =1;
            }
            else{
                value = 0;
            }
            console.log(value+' '+id+' '+access_field);
            $.ajax({
            url: "access_control.php",
            data:'value='+value+'&access_field='+access_field+'&id='+id,
            type: "GET",
            success: function(data){
            }
            });
        }
    </script>
</body>
</html>