<?php
include('config_session.php');
include 'all_functions.php';
$page = 'page';
if (isset($_POST['add_page'])) {
    $link = $_POST['link'];
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
    if ($_POST['contentname']=='Services'){
        $price1 = $_POST['price1'];
        $price2 = $_POST['price2'];
        $price3 = $_POST['price3'];
        $insert = mysql_query("INSERT INTO content (heading,description,image,parent_id,post_date,post_time,post_by,meta_title,meta_keyword,meta_description,caption,url,price1,price2,price3) VALUES ('$heading','".$description."','$image','$parent_id',CURDATE(),CURTIME(),'$user_id','$meta_title','$meta_keyword','$meta_description','$caption','$link','$price1','$price2','$price3')") or die(mysql_error());          
    }
    else{
        $insert = mysql_query("INSERT INTO content (heading,description,image,parent_id,post_date,post_time,post_by,meta_title,meta_keyword,meta_description,caption,url) VALUES ('$heading','".$description."','$image','$parent_id',CURDATE(),CURTIME(),'$user_id','$meta_title','$meta_keyword','$meta_description','$caption','$link')") or die(mysql_error());  
    }
    
    if ($insert) {
        store_log($user_id, $user_fullname.' Added Page '.$heading);
        $message = 'Page has been Added.';
    }
    else
    {
        $error = 'Page Can\'t be saved Try again!!!';
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
                                <li class="breadcrumb-item"><a href="page.php">Page Management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Page</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Ibox -->
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h5 class="mb-30">Add Page</h5>
                                        
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
                                                            <label class="col-sm-2 col-form-label pull-left">Heading</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <input type="text" class="form-control" name="heading" required="" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Description</label>
                                                            <div class="col-sm-10 pull-right">
                                                               <textarea  id="add_descripton"  class="form-control  nothing" name="description"></textarea>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Parent</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <select id="select" class="select form-control" name="parent_id">
                                                                    <option value="">None</option>
                                                                    <?php
                                                                        $sql_parent = mysql_query("SELECT heading, content_id FROM content");
                                                                        while ($row_parent = mysql_fetch_object($sql_parent)) {
                                                                    ?>
                                                                        <option value="<?php echo $row_parent->content_id; ?>" contentname="<?php echo $row_parent->heading; ?>"><?php echo $row_parent->heading; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <input type="hidden" name="contentname">
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-sm-12 form-group price" style="padding: 0;display: none;">
                                                            <div class="col-sm-12">
                                                                <label class="col-sm-2 col-form-label pull-left">Price for 60 min</label>
                                                                <div class="col-sm-10 pull-right">
                                                                    <input type="text" class="form-control" name="price1"/>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="col-sm-12 mar-top">
                                                                <label class="col-sm-2 col-form-label pull-left">Price for 90 min</label>
                                                                <div class="col-sm-10 pull-right">
                                                                    <input type="text" class="form-control" name="price2"/>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="col-sm-12 mar-top">
                                                                <label class="col-sm-2 col-form-label pull-left">Price for 120 min</label>
                                                                <div class="col-sm-10 pull-right">
                                                                    <input type="text" class="form-control" name="price3"/>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
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
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Image Caption </label>
                                                            <div class="col-sm-10 pull-right">
                                                                <textarea class="form-control" name="caption"></textarea>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Link</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <input type="text" class="form-control" name="link" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Meta Title</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <input type="text" class="form-control" name="meta_title" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                         <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Meta Keyword</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <input type="text" class="form-control" name="meta_keyword" />
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                         <div class="col-sm-12 form-group">
                                                            <label class="col-sm-2 col-form-label pull-left">Meta Description</label>
                                                            <div class="col-sm-10 pull-right">
                                                                <textarea class="form-control" name="meta_description"></textarea>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel_hwc_modal-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" name="add_page" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Add Page</button>
                                                       <a href="page.php"><button class="btn btn-default">Cancel</button></a>
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
                                    <a href="page.php" class="btn btn-success">Okay</a>
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