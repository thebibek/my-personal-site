<?php
include('config_session.php');
include 'all_functions.php';
$page = 'page';
if (isset($_GET['del'])) {
    $content_id = $_GET['del'];
    $delete = mysql_query("DELETE FROM content WHERE content_id = $content_id") or die(mysql_error());
   header('location:page.php');
    exit;
}
if (isset($_POST['edit_page'])) {
    $content_id = $_POST['content_id'];
    $heading = $_POST['heading'];
    $description = addslashes($_POST['description']);
    $parent_id = $_POST['parent_id'];
    if ($parent_id != '') {
       $parent_id =$parent_id;
    }
    else
    {
        $parent_id = '';
    }
    $meta_title = $_POST['meta_title'];
    $meta_keyword = $_POST['meta_keyword'];
    $meta_description = $_POST['meta_description'];
    $insert = mysql_query("UPDATE content SET heading = '$heading', description = '".$description."', parent_id = '$parent_id', meta_title = '$meta_title', meta_keyword = '$meta_keyword', meta_description = '$meta_description' WHERE content_id = '$content_id'") or die(mysql_error());
    if ($insert) {
        store_log($user_id, $user_fullname.' Edited Page '.$heading);
        $message = 'Page has been Edited.';
    }
    else
    {
        $error = 'Page didn\'t Edit Try again!!!';
    }
}
if (isset($_POST['edit_page_image'])) {
    $content_id = $_POST['content_id'];
    $caption = $_POST['caption'];
    $heading = $_POST['heading'];
    if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $heading).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/'. $image);
    }
    else
    {
        $image = '';
    }
    $update =mysql_query("UPDATE content SET caption = '$caption', image = '$image' WHERE content_id = '$content_id'") or die(mysql_error());
    if ($update) {
        store_log($user_id, $user_fullname.' Added Page '.$heading);
        $message = 'Page Image has been Edited.';
    }
    else
    {
        $error = 'Page Can\'t be Update Image Please Try again!!!';
    }
}
if (isset($_POST['add_page'])) {
   
    $heading = $_POST['heading'];
    $description = addslashes($_POST['description']);
    $parent_id = $_POST['parent_id'];
    if ($parent_id != '') {
       $parent_id =$parent_id;
    }
    else
    {
        $parent_id = '';
    }
    $caption = $_POST['caption'];
    $meta_title = $_POST['meta_title'];
    $meta_keyword = $_POST['meta_keyword'];
    $meta_description = $_POST['meta_description'];
   if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $heading).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/' . $image);
    }
    else
    {
        $image = '';
    }
    $insert = mysql_query("INSERT INTO content (heading,description,image,parent_id,post_date,post_time,post_by,meta_title,meta_keyword,meta_description,caption) VALUES ('$heading','".$description."','$image','$parent_id',CURDATE(),CURTIME(),'$user_id','$meta_title','$meta_keyword','$meta_description','$caption')") or die(mysql_error());
    if ($insert) {
        store_log($user_id, $user_fullname.' Added Page '.$heading);
        $message = 'Page has been Added.';
    }
    else
    {
        $error = 'Page Can\'t be save Try again!!!';
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
                                <li class="breadcrumb-item active" aria-current="page">Page Management</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Page Management <a class=" btn btn-primary f-right" href="add_page.php">Add Page</a></h5>
                                        
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
                                                        <th width="10%" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i =1;
                                                        $sql = mysql_query("SELECT heading, image, content_id FROM content WHERE parent_id = 0 ORDER BY level") or die(mysql_error());
                                                        while ($row = mysql_fetch_object($sql)) {
                                                             $sql1 = mysql_query("SELECT heading, image, content_id FROM content WHERE parent_id = ".$row->content_id." ORDER BY level") or die(mysql_error());
                                                    ?>
                                                        <tr class="grade">
                                                            <td><?php print $i++; ?></td>
                                                            <td><?php print $row->heading; ?></td>
                                                            <td>
                                                                <?php 
                                                                    if($row->image == '' || $row->image == NULL)
                                                                    {
                                                                        print 'Image Not uploaded';

                                                                    } else
                                                                    {
                                                                ?> 
                                                                        <img style="width: 50px; height: 50px; object-fit: cover;" src="../uploads/<?php echo $row->image ?>" alt="<?php echo $row->image ?>"> 
                                                                <?php
                                                                    }
                                                                ?>
                                                                        
                                                            </td>
                                                            <td class="center"> 
                                                                <a class="simple-ajax-popup" href="ajax.php?view_page=<?php print $row->content_id; ?>"> <i class="fa fa-eye"></i> </a> 
                                                                <a class="popup_edit" id="<?php print $row->content_id; ?>"> <i class="fa fa-pencil"></i> </a> 
                                                                <?php if (mysql_num_rows($sql1)==0) {
                                                                   ?>
                                                                   <a onclick="confirm_delete(<?php print $row->content_id; ?>)"> <i class="fa fa-trash"></i> </a> 
                                                                   <?php
                                                                } ?>
                                                                <a class="simple-ajax-popup" href="ajax.php?edit_page_image=<?php print $row->content_id; ?>"> <i class="fa fa-image"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            while ($row1 = mysql_fetch_object($sql1)) {
                                                                $sql2 = mysql_query("SELECT heading, image, content_id FROM content WHERE parent_id = ".$row1->content_id." ORDER BY level") or die(mysql_error());
                                                        ?>
                                                        <tr class="grade">
                                                            <td><?php print $i++; ?></td>
                                                            <td class="child">- <?php print $row1->heading; ?></td>
                                                            <td>
                                                                <?php 
                                                                    if($row1->image == '' || $row1->image == NULL)
                                                                    {
                                                                        print 'Image Not uploaded';

                                                                    } else
                                                                    {
                                                                ?> 
                                                                        <img style="width: 50px; height: 50px; object-fit: cover;" src="uploads/<?php echo $row1->image ?>" alt="<?php echo $row1->image ?>"> 
                                                                <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td class="center"> 
                                                                <a class="simple-ajax-popup" href="ajax.php?view_page=<?php print $row1->content_id; ?>"> <i class="fa fa-eye"></i> </a> 
                                                                <a class="popup_edit" id="<?php print $row1->content_id; ?>"> <i class="fa fa-pencil"></i> </a> 
                                                                <?php if (mysql_num_rows($sql2)==0) {
                                                                   ?>
                                                                   <a onclick="confirm_delete(<?php print $row1->content_id; ?>)"> <i class="fa fa-trash"></i> </a> 
                                                                   <?php
                                                                } ?> 
                                                                <a  class="simple-ajax-popup" href="ajax.php?edit_page_image=<?php print $row1->content_id; ?>"> <i class="fa fa-image"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            while ($row2 = mysql_fetch_object($sql2)) {
                                                                ?>
                                                                <tr class="grade">
                                                                    <td><?php print $i++; ?></td>
                                                                    <td class="sub-child">- <?php print $row2->heading; ?></td>
                                                                    <td>
                                                                        <?php 
                                                                            if($row2->image == '' || $row2->image == NULL)
                                                                            {
                                                                                print 'Image Not uploaded';

                                                                            } else
                                                                            {
                                                                        ?> 
                                                                                <img style="width: 50px; height: 50px; object-fit: cover;" src="uploads/<?php echo $row2->image ?>" alt="<?php echo $row2->image ?>"> 
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <a class="simple-ajax-popup" href="ajax.php?view_page=<?php print $row2->content_id; ?>"> <i class="fa fa-eye"></i> </a> 
                                                                        <a class="popup_edit" id="<?php print $row2->content_id; ?>"> <i class="fa fa-pencil"></i> </a>  
                                                                        <a onclick="confirm_delete(<?php print $row2->content_id; ?>)"> <i class="fa fa-trash"></i> </a> 
                                                                        <a  class="simple-ajax-popup" href="ajax.php?edit_page_image=<?php print $row2->content_id; ?>"> <i class="fa fa-image"></i> </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                }
                                                            }
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
                    <h2 class="panel_hwc_modal-title">Conformation!!!</h2>
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
                    data: 'edit_page='+id,
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