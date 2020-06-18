<?php
include('config_session.php');
include 'all_functions.php';
$page = 'about';
if (isset($_POST['update_about'])) {
    $menu_name = $_POST['menu_name'];
    $menu_full = addslashes($_POST['menu_full']);
    $menu_title = $_POST['menu_title'];
    $menu_keyword = $_POST['menu_keyword'];
    $menu_des = addslashes($_POST['menu_des']);

        $insert = mysql_query("UPDATE menu SET menu_name='$menu_name', menu_full='".$menu_full."',menu_title='$menu_title',menu_keyword='$menu_keyword',menu_des='".$menu_des."' WHERE menu_id=2") or die(mysql_error()); 

    if ($insert) {
        store_log($user_id, $user_fullname.' Edited About '.$menu_name);
        $message = 'About has been Edited.';
    }
    else
    {
        $error = 'About Can\'t be edited Try again!!!';
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
                                <li class="breadcrumb-item"><a>About Management</a></li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">About Us</h5>
                                        
                                    </div>
                                    <!-- Modal Primary -->

                                    <!-- Ibox Content -->
                                    <div class="ibox-content">
                                        <!-- Table Responsive -->
                                        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                                          <?php
                                             $sql = mysql_query("SELECT * FROM menu WHERE menu_id =2 ORDER BY menu_id DESC LIMIT 1") or die(mysql_error());
                                             while ($row = mysql_fetch_object($sql)) {
                                             ?>
                                            <div class="panel_hwc_modal-body">
                                                <div class="modal-wrapper">
                                                    <div class="ibox-content">

                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-12 col-form-label pull-left"><b>Menu Name</b></label>
                                                            <div class="col-sm-12 pull-right">
                                                                <input type="text" class="form-control" name="menu_name" required="" / value="<?php print $row->menu_name; ?>">
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <div class="col-sm-12 pull-right">
                                                               <textarea class="form-control widgEditor  nothing" name="menu_full"><?php print $row->menu_full; ?></textarea>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-12 col-form-label pull-left"><b>Menu Title</b></label>
                                                            <div class="col-sm-12 pull-right">
                                                                <input type="text" class="form-control" name="menu_title" required="" / value="<?php print $row->menu_title; ?>">
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-12 col-form-label pull-left"><b>Menu Keyword</b></label>
                                                            <div class="col-sm-12 pull-right">
                                                                <input type="text" class="form-control" name="menu_keyword" required="" / value="<?php print $row->menu_keyword; ?>">
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-12 col-form-label pull-left"><b>Menu Description</b></label>
                                                            <div class="col-sm-12 pull-right">
                                                                <input type="text" class="form-control" name="menu_des" required="" / value="<?php print $row->menu_des; ?>">
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <?php } ?>
                                            <footer class="panel_hwc_modal-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" name="update_about" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Update</button>
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
                                    <a href="about.php" class="btn btn-success">Okay</a>
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

        $('#select').change(function(){
            var select = $('option:selected', this).attr('contentname');
            $('input[name="contentname"]').val(select);
            console.log(select);
            if (select=="Services") {
                $('.price').css('display', 'block');
                $('input[name="price"]').attr('required','required');
            }else{
                $('.price').css('display', 'none');
                $('input[name="price"]').removeAttr('required','required');
            }
            })

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


</html>