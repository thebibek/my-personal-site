<?php
include('config_session.php');
include 'all_functions.php';
$page = 'events';
if (isset($_GET['del'])) {
    $blog_id = $_GET['del'];
    $to_delete = mysql_query("SELECT * FROM blog WHERE blog_id='$blog_id' ") or die(mysql_error());
    $row = mysql_fetch_object($to_delete);
    $name = $row->blog_name;

    $delete = mysql_query("DELETE FROM blog WHERE blog_id = $blog_id") or die(mysql_error());
    if ($delete) {
        store_log($user_id, $user_fullname.' deleted blog '.$name);
    }
   header('location:blog.php');
    exit;
}
if (isset($_POST['edit_event'])) {
    $blog_id=$_POST['blog_id'];
    $blog_name = $_POST['blog_name'];
    $blog_short = addslashes($_POST['blog_short']);
    $blog_full = addslashes($_POST['blog_full']);
    $video = $_POST['video'];

    $title = $_POST['title'];
    $keyword = $_POST['keyword'];
    $des = $_POST['des'];

    $post_date = $_POST['post_date'];
    $url_user = $_POST['url'];

    $url1 = str_replace(" ", "-", strtolower($url_user));
    $url2 = str_replace("(", "-", strtolower($url1));
    $url3 = str_replace(")", "1", strtolower($url2));
    $url4 = str_replace('"', "-", strtolower($url3));
    $url5 = str_replace(',', "-", strtolower($url4));
    $url = str_replace('&', "-", strtolower($url5));

    $insert = mysql_query("UPDATE blog SET blog_name='$blog_name',blog_short='".$blog_short."',blog_full='".$blog_full."',video='$video',title='$title',keyword='$keyword',des='$des',post_date='$post_date' WHERE blog_id=$blog_id") or die(mysql_error());

    if ($insert) {
        store_log($user_id, $user_fullname.' edited blog '.$blog_name);
        $message = 'Blog has been Edited.';
    }
    else
    {
        $error = 'Blog didn\'t Edit Try again!!!';
    }
}
if (isset($_POST['edit_event_image'])) {
    $blog_id = $_POST['blog_id'];
    $to_edit = mysql_query("SELECT * FROM blog WHERE blog_id='$blog_id' ") or die(mysql_error());
    $row = mysql_fetch_object($to_edit);
    $image_name='blog-';
    $name = $row->blog_name;
    if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $image_name).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../assets/img/blog/' . $image);
    }
    else
    {
        $image = '';
    }
    $update =mysql_query("UPDATE blog SET image = '$image' WHERE blog_id = '$blog_id'") or die(mysql_error());
    if ($update) {
        store_log($user_id, $user_fullname.' edited image of '.$name);
        $message = 'Blog Image has been Edited.';
    }
    else
    {
        $error = 'Blog Can\'t be Update Image Please Try again!!!';
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
                                <li class="breadcrumb-item active" aria-current="page">Blog Management</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Blog Management <a class=" btn btn-primary f-right" href="add_blog.php">Add Blog</a></h5>
                                        
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
                                                        $sql = mysql_query("SELECT * FROM blog ORDER BY blog_id DESC") or die(mysql_error());
                                                        while ($row = mysql_fetch_object($sql)) {
                                                    ?>
                                                        <tr class="grade">
                                                            <td><?php print $i++; ?></td>
                                                            <td><?php print $row->blog_name; ?></td>
                                                            <td>
                                                                <?php 
                                                                    if($row->image == '' || $row->image == NULL)
                                                                    {
                                                                        print 'Image Not uploaded';
                                                                    } else
                                                                    {
                                                                ?> 
                                                                        <img style="width: 50px; height: 50px; object-fit: cover;" src="../assets/img/blog/<?php echo $row->image ?>" alt="<?php echo $row->image ?>">
                                                                <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td class="center">
                                                                
                                                                <a class="simple-ajax-popup" href="ajax.php?edit_member=<?php print $row->blog_id; ?>" id="<?php print $row->blog_id; ?>" title="Edit Blog"> <i class=" fa fa-comment-o"></i> </a> 

                                                                <a class="simple-ajax-popup" href="ajax.php?edit_event_image=<?php print $row->blog_id; ?>"> <i class="fa fa-image"></i> </a>
                                                                <a onclick="confirm_delete(<?php print $row->blog_id; ?>)"> <i class="fa fa-trash"></i> </a>  
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
                    data: 'edit_event='+id,
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