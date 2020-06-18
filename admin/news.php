<?php
include('config_session.php');
include 'all_functions.php';
$page = 'news';
if (isset($_GET['del'])) {
    $page_id = $_GET['del'];
    $to_delete = mysql_query("SELECT * FROM page WHERE page_id='$page_id' ") or die(mysql_error());
    $row = mysql_fetch_object($to_delete);
    $name = $row->page_heading;

    $delete = mysql_query("DELETE FROM page WHERE page_id = $page_id") or die(mysql_error());
    if ($delete) {
        store_log($user_id, $user_fullname.' deleted news '.$name);
    }
   header('location:news.php');
    exit;
}
if (isset($_POST['edit_news'])) {
    $page_id=$_POST['page_id'];
    $page_heading = $_POST['page_heading'];
    $page_full = addslashes($_POST['page_full']);
    $page_title = $_POST['page_heading'];
    $url_user = $_POST['url'];
    $page_keyword = $_POST['page_heading'];
    $page_description = $_POST['page_heading'];

    $url1 = str_replace(" ", "-", strtolower($url_user));
    $url2 = str_replace("(", "-", strtolower($url1));
    $url3 = str_replace(")", "1", strtolower($url2));
    $url4 = str_replace('"', "-", strtolower($url3));
    $url5 = str_replace(',', "-", strtolower($url4));
    $url = str_replace('&', "-", strtolower($url5));

    $insert = mysql_query("UPDATE page SET page_title='$page_title' ,url='$url',page_keyword='$page_title',page_description='$page_description', page_heading='$page_heading',page_full='".$page_full."' WHERE page_id=$page_id ") or die(mysql_error());

    if ($insert) {
        store_log($user_id, $user_fullname.' edited news '.$page_heading);
        $message = 'News has been Edited.';
    }
    else
    {
        $error = 'News didn\'t Edit Try again!!!';
    }
}
if (isset($_POST['edit_news_image'])) {
    $page_id = $_POST['page_id'];
    $to_edit = mysql_query("SELECT * FROM page WHERE page_id='$page_id' ") or die(mysql_error());
    $row = mysql_fetch_object($to_edit);
    $image_name='ids-news-';
    $name = $row->page_heading;
    if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $image_name).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../images/news&events/' . $image);
    }
    else
    {
        $image = 'logo.png';
    }
    $update =mysql_query("UPDATE page SET image = '$image' WHERE page_id = '$page_id'") or die(mysql_error());
    if ($update) {
        store_log($user_id, $user_fullname.' edited image of '.$name);
        $message = 'News Image has been Edited.';
    }
    else
    {
        $error = 'News Can\'t be Update Image Please Try again!!!';
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
                                <li class="breadcrumb-item active" aria-current="page">News Management</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">News Management <a class=" btn btn-primary f-right" href="add_news.php">Add News</a></h5>
                                        
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
                                                        <th>Heading</th>
                                                        <th class="text-center" width="10%">Image</th>
                                                        <th width="15%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i =1;
                                                        $sql = mysql_query("SELECT * FROM page WHERE page_type='news' ORDER BY page_id DESC") or die(mysql_error());
                                                        while ($row = mysql_fetch_object($sql)) {
                                                    ?>
                                                        <tr class="grade">
                                                            <td><?php print $i++; ?></td>
                                                            <td><?php print $row->page_heading; ?></td>
                                                            <td>
                                                                <?php 
                                                                    if($row->image == '' || $row->image == NULL)
                                                                    {
                                                                        print 'Image Not uploaded';

                                                                    } else
                                                                    {
                                                                ?> 
                                                                        <img style="width: 50px; height: 50px; object-fit: cover;" src="../images/news&events/<?php echo $row->image ?>" alt="<?php echo $row->image ?>"> 
                                                                <?php
                                                                    }
                                                                ?>
                                                                        
                                                            </td>
                                                            <td class="center"> 
                                                                <a class="simple-ajax-popup" href="ajax.php?view_news=<?php print $row->page_id; ?>&type=news"> <i class="fa fa-eye"></i> </a> 
                                                                <a class="popup_edit" id="<?php print $row->page_id; ?>"> <i class="fa fa-pencil"></i> </a> 
                                                                   <a onclick="confirm_delete(<?php print $row->page_id; ?>)"> <i class="fa fa-trash"></i> </a> 
                                                                <a class="simple-ajax-popup" href="ajax.php?edit_news_image=<?php print $row->page_id; ?>"> <i class="fa fa-image"></i> </a>
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
                                                        <th>Image</th>
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
    <script src="assets/js/jquery/tiny/tinymce.min.js"></script>
    <script>

        $(function() {
            $('.select').select2();
        });
        $('.popup_edit').click(function(){
            var id =  this.id;
            $.ajax({
                    url: 'ajax.php',
                    type: 'GET',
                    data: 'edit_news='+id+'&type=news',
                    success:function(data){
                        console.log(data);
                        $('#page_modal .panel_hwc_modal').html(data);
                        $.magnificPopup.open({
                            items: {
                                src: '#page_modal'
                            },
                              type: 'inline',
                                preloader: false,
                                modal: true
                        });
                        tinymce.remove();
                        tinymce.init({
                            selector: '#edit_descripton',
                            width: '100%',
                            height:  270,
                            setup: function (editor) {
                               editor.on('change', function () {
                                   // This will print out all your content in the tinyMce box
                                   console.log('the content '+editor.getContent());
                                    // Your text from the tinyMce box will now be passed to your  text area ...
                                   $("#edit_descripton").text(editor.getContent());
                               });

                           }
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