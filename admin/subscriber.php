
<?php
include('config_session.php');
include 'all_functions.php';
$page = 'index';
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $to_delete = mysql_query("SELECT * FROM message WHERE id='$id' ") or die(mysql_error());
    $row = mysql_fetch_object($to_delete);
    $name = $row->name;

    $delete = mysql_query("DELETE FROM message WHERE id = $id") or die(mysql_error());
    if ($delete) {
        store_log($user_id, $user_fullname.' deleted message of  '.$name);
    }
   header('location:subscriber.php');
    exit;
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
    
    <!-- Add Page -->
    <div  id="page_modal" class="modal-block modal-header-color modal-block-primary mfp-hide">
        <section class="panel_hwc_modal">
        </section>
    </div>
    <!-- Add Page -->

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
                                <li class="breadcrumb-item active" aria-current="page">Subscription Management</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Subscription Management </h5>
                                        
                                    </div>
                                    <!-- Modal Primary -->

                                    <!-- Ibox Content -->
                                    <div class="ibox-content">
                                        <!-- Table Responsive -->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">ID</th>
                                                        <th>Email</th>
                                                        <th width="10%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i =1;
                                                        $sql = mysql_query("SELECT * FROM message WHERE msg_type='Subscribe' ORDER BY id DESC ") or die(mysql_error());
                                                        while ($row = mysql_fetch_object($sql)) {
                                                    ?>
                                                        <tr class="grade">
                                                            <td><?php print $i++; ?></td>
                                                            <td><?php print $row->email; ?></td>
                                                            <td class="center"> 
                                                                <a class="simple-ajax-popup" href="ajax.php?view_subscriber=<?php print $row->id; ?>"> <i class="fa fa-eye"></i> </a>
                                                                   <a onclick="confirm_delete(<?php print $row->id; ?>)"> <i class="fa fa-trash"></i> </a> 
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Heading</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
                                    <button class="btn btn-success modal-dismiss">Okay</button>
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
    <!-- <script src="assets/js/jquery/summernote.js"></script> -->
    <!-- Active js -->
    <!-- tinymcejs -->
    
    <script src="js/active.js"></script>
    <script src="js/session_log.js"></script>
    <script>

        $(function() {
            $('.select').select2();
        });
       $('.popup_edit').click(function(){
            var id =  this.id;
            $.ajax({
                    url: 'ajax.php',
                    type: 'GET',
                    data: 'edit_page_slider='+id,
                    success:function(data){
                        console.log(data);
                        $('.simple-ajax-popup').magnificPopup('close');
                        $('#page_modal .panel_hwc_modal').html(data);
                        $.magnificPopup.open({
                            items: {
                                src: '#page_modal'
                            },
                              type: 'inline',
                                preloader: false,
                                modal: true
                        });

                    }
                });
        });
         $('.simple-ajax-popup').magnificPopup({
            type: 'ajax'
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
    <script>
        function confirm_delete(id)
        {
            var id = id;
            console.log(id);
            var link = '?del='+id;
            $('.delete_id').attr('href',link);
            $.magnificPopup.open({
                    items: {
                        src: '#confirm_delete'
                    },
                      type: 'inline',
                      preloader: false,
                      modal: true
                });
        }
    </script>
</body>


</html>