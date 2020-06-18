<?php
include('config_session.php');
include 'all_functions.php';
$page = 'events';
if (isset($_POST['add_service'])) {
    $page_heading = $_POST['page_heading'];
    $sql = mysql_query("SELECT page_heading FROM event WHERE page_heading = '$page_heading'") or die(mysql_error());

    $page_full = addslashes($_POST['page_full']);
    $page_title = $_POST['page_heading'];
    $page_keyword = $_POST['page_heading'];
    $page_description = $_POST['page_heading'];
    $event_date = $_POST['event_date'];
    $image_name='ids-event-';


    $url1 = str_replace(" ", "-", strtolower($page_heading));
    $url2 = str_replace("(", "-", strtolower($url1));
    $url3 = str_replace(")", "1", strtolower($url2));
    $url4 = str_replace('"', "-", strtolower($url3));
    $url5 = str_replace(',', "-", strtolower($url4));
    $url = str_replace('&', "-", strtolower($url5));

    if(mysql_num_rows($sql) > 0)
    {
        $error = 'Change Event Title';
    }
    else
    {
        if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $image_name).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../images/news&events/'. $image);
        }
        else
        {
            $image = '';
        }
        $insert = mysql_query("INSERT INTO event (page_heading,page_title,page_keyword,page_description,page_full,page_type,post_date,post_time,post_by,image,url,event_date) VALUES ('$page_heading','$page_title','$page_keyword','$page_description','".$page_full."','event',CURDATE(),CURTIME(),'$user_id','$image','$url','$event_date')") or die(mysql_error());
        if ($insert) {
            store_log($user_id, $user_fullname.' added event '.$page_heading);
            $message = 'Event has been Added.';
        }
        else
        {
            $error = 'Event Can\'t be save Try again!!!';
        } 
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
    <!-- <link rel="stylesheet" href="assets/css/summernote.css" /> -->
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">
    <!-- Data Table Stylesheet -->
    <link rel="stylesheet" href="css/plugins/data-table-css/datatables.min.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="assets/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/select2/select2.css">
    <link rel="stylesheet" href="assets/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    
    <!-- Content Editor -->
    <link rel="stylesheet" type="text/css" href="css/widgEditor.css"  />
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
                                <li class="breadcrumb-item"><a href="event.php">Event Management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Event</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Add Event</h5>
                                        
                                    </div>
                                    <!-- Modal Primary -->

                                    <!-- Ibox Content -->
                                    <div class="ibox-content">
                                        <!-- Table Responsive -->
                                        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                            <div class="panel_hwc_modal-body">
                                                <div class="modal-wrapper">
                                                    <div class="ibox-content">
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Event Title</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <input type="text" class="form-control" name="page_heading" required="" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Description</label>
                                                            <div class="col-sm-10 pull-right">
                                                               <textarea  id="add_descripton"  class="form-control  nothing" name="page_full"></textarea>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <!-- <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Type</label>
                                                            <div class="col-sm-10 pull-right">
                                                               <select class="form-control" name="type">
                                                                   <option value="">Choose Type</option>
                                                                   <option value="news">News</option>
                                                                   <option value="event">Event</option>
                                                               </select>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div> -->
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Event Date</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <input type="date" class="form-control" name="event_date" required="" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label class="col-sm-2 pull-left control-label">Upload Image</label>
                                                            <div class="col-sm-10 pull-left">
                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="input-append">
                                                                        <div class="uneditable-input">
                                                                            <i class="fa fa-file fileupload-exists"></i>
                                                                            <span class="fileupload-preview"></span>
                                                                        </div>
                                                                        <span class="btn btn-hwc btn-primary btn-file">
                                                                            <span class="fileupload-exists">Change</span>
                                                                            <span class="fileupload-new">Select Image</span>
                                                                            <input type="file" name="image" />
                                                                        </span>
                                                                        <a href="#" class="btn btn-hwc btn-warning fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel_hwc_modal-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" name="add_service" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Add Event</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </footer>
                                            <div class="clearfix"></div>
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
        <?php if (isset($message)): ?>
            <div id="Success" class="modal-block modal-header-color modal-block-success mfp-hide">
                <section class="panel_hwc_modal">
                    <header class="panel_hwc_modal-heading">
                        <h2 class="panel_hwc_modal-title">Success</h2>
                    </header>
                    <form action="" method="post" accept-charset="utf-8">
                        <div class="panel_hwc_modal-body pb_0">
                            <div class="modal-wrapper">
                                <div class="ibox-content">
                                    <div class="col-sm-12">
                                        <div class="modal-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="modal-text">
                                            <p class="text-dark"><?php echo $message; ?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel_hwc_modal-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="event.php" class="btn btn-success">Okay</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </footer>
                        <div class="clearfix"></div>
                    </form>
                </section>
            </div>
        <?php endif ?>
        <?php if (isset($error)): ?>
            <div id="Error" class="modal-block modal-header-color modal-block-danger mfp-hide">
                <section class="panel_hwc_modal">
                    <header class="panel_hwc_modal-heading">
                        <h2 class="panel_hwc_modal-title">Error</h2>
                    </header>
                    <form action="" method="post" accept-charset="utf-8">
                        <div class="panel_hwc_modal-body pb_0">
                            <div class="modal-wrapper">
                                <div class="ibox-content">
                                    <div class="col-sm-12">
                                        <div class="modal-icon">
                                            <i class="fa fa-times-circle"></i>
                                        </div>
                                        <div class="modal-text">
                                            <p class="text-dark"><?php echo $error; ?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="panel_hwc_modal-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-danger modal-dismiss">Okay</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </footer>
                        <div class="clearfix"></div>
                    </form>
                </section>
            </div>
        <?php endif ?>
        <div id="confirm_delete" class="modal-block modal-header-color modal-block-danger mfp-hide">
            <section class="panel_hwc_modal">
                <header class="panel_hwc_modal-heading">
                    <h2 class="panel_hwc_modal-title">Confirmation!!!</h2>
                </header>
                <form action="" method="post" accept-charset="utf-8">
                    <div class="panel_hwc_modal-body pb_0">
                        <div class="modal-wrapper">
                            <div class="ibox-content">
                                <div class="col-sm-12">
                                    <div class="modal-icon">
                                        <i class="fa fa-warning"></i>
                                    </div>
                                    <div class="modal-text">
                                        <p class="text-dark">Do you Really Want to delete this data ?</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel_hwc_modal-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-danger delete_id">Delete</a>
                                <button class="btn btn-default modal-dismiss">Cancel</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </footer>
                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    <!-- jQuery 2.2.4 -->
    <script src="assets/js/jquery/jquery.2.2.4.min.js"></script>
    <!-- Bootsrap js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/magnific-popup/magnific-popup.js"></script>
    <script src="assets/magnific-popup/examples.modals.js"></script>
    <script src="js/plugins-js/menu-active.js"></script>
    
    <!-- Data Table js -->
    <script src="js/plugins-js/data-table-js/data-table.bootstrap.min.js"></script>
    <script src="js/plugins-js/data-table-js/data-table.min.js"></script>
    <script src="js/plugins-js/data-table-js/data-table-active.js"></script>
    <script src="assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
     <script src="assets/select2/select2.js"></script>
     <script type="text/javascript" src="js/widgEditor.js"></script>
    <!-- <script src="assets/js/jquery/summernote.js"></script> -->
    <!-- Active js -->
    <!-- tinymcejs -->
    
    <script src="js/active.js"></script>
    <script src="js/session_log.js"></script>
    <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#add_descripton',
        width: '100%',
        height:  270,
        auto_focus : "#add_descripton"
      });
      </script>
    <script>

        $(function() {
            $('.select').select2();
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
    </script>
</body>


</html>s