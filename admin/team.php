<?php 
    include('config_session.php');
    include 'all_functions.php';
    $page = 'team';
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $delete = mysql_query("DELETE FROM admin WHERE id = $id") or die(mysql_error());
        header('location:team.php');
            exit;
        }
if (isset($_POST['edit_team'])) {
    $member_id = $_POST['member_id'];
    $name = $_POST['name'];
    $address = addslashes($_POST['address']);
    $gender = $_POST['gender'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $email = $_POST['email'];
    $insert = mysql_query("UPDATE admin SET name = '$name', gender = '$gender', address = '$address', email = '$email',facebook='$facebook',instagram='$instagram',twitter='$twitter',linkedin='$linkedin'  WHERE id = '$member_id'") or die(mysql_error());
    if ($insert) {
        $_SESSION["cms_user_fullname"]=$_POST['name'];
        $_SESSION["cms_usergender"]=$_POST['gender'];
        $_SESSION["cms_useremail"]=$_POST['email'];
        store_log($user_id, $user_fullname.' Edited member '.$name);
        $message = 'Member has been Edited.';
    }
    else
    {
        $error = 'Member detail didn\'t edited Try again!!!';
    }
}
if (isset($_POST['edit_test_image'])) {
    $id = $_POST['id'];
    $sql_user = mysql_query("SELECT username FROM admin WHERE id='$id' ") or die(mysql_error());
    $row_user = mysql_fetch_object($sql_user);
    $username = $row_user->username;
    $image_name = 'team-';
   if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $image_name).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../images/team/' . $image);
    }
    else
    {
        $image = '';
    }

        $insert = mysql_query("UPDATE admin SET image='$image' WHERE id='$id' ") or die(mysql_error()); 

    if ($insert) {
        store_log($user_id, $user_fullname.' Edited image of '.$username);
        $message = 'Image has been Edited.';
    }
    else
    {
        $error = 'Image Can\'t be edited Try again!!!';
    }
}
if (isset($_POST['update-password'])) {
    $member_id = $_POST['member_id'];
    $password = $_POST['password'];
    if ($password != '') {
        $password = md5($password);
        $update = mysql_query("UPDATE admin SET password = '$password'  WHERE id = '$member_id'") or die(mysql_error());
         if ($update) {    
            store_log($user_id, $user_fullname.' Edited member password');
            $message = 'Member\'s password has been Edited.';
        }
        else
        {
            $error = 'Password didn\'t Edit Try again!!!';
        }
    }
}
if (isset($_POST['update-username'])) {
    $member_id = $_POST['member_id'];
    $username = $_POST['username'];
    $pusername = $_POST['pusername'];
    $usernamearray = array();
    if ($username != '') {
        if ($username != $pusername) {
            $sql = mysql_query("SELECT username FROM admin") or die(mysql_error());
            while ($row = mysql_fetch_object($sql)) {
                $usernamearray[] = $row->username;
            }
            if (!in_array($username, $usernamearray)) {
                $update = mysql_query("UPDATE admin SET username = '$username'  WHERE id = '$member_id'") or die(mysql_error());
                if ($update) {    
                    store_log($user_id, $user_fullname.' Edited member username from '.$pusername.' to '.$username);
                    $message = 'Member\'s username has been Edited.';
                }
                else
                {
                    $error = 'Username didn\'t Edit Try again!!!';
                }
            }
            else{
                $error = 'Username already exists<br/><a class="simple-ajax-popup" href="ajax.php?edit_member_pwd='.$member_id.'"  title="Edit password and username"> <i class="icon-key"></i> </a>';
            }
        }
        else{
            $message = 'No change made';
        }
    }
}
if (isset($_POST['add_team'])) {
   
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if (!empty( $_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];   
        $image = str_replace(' ', '-', $name).uniqid().str_replace(' ', '-', $image);
        move_uploaded_file($_FILES["image"]["tmp_name"], '../images/team/' . $image);
    }
    else
    {
        $image = '';
    }
    $insert = mysql_query("INSERT INTO admin (name, image, gender, address, email, username, password, user_status,type ) VALUES ('$name','$image','$gender','$address','$email','$username','$password', 1,'staff')") or die(mysql_error());
    if ($insert) {
        store_log($user_id, $user_fullname.' Added staff '.$name);
        $message = 'Staff has been Added.';
    }
    else
    {
        $error = 'Staff Can\'t be save Try again!!!';
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
    <link rel="stylesheet" href="assets/magnific-popup/magnific-popup.css">

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
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
                                <li class="breadcrumb-item active" aria-current="page">Menu Postion</li>
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox bg-boxshadow mb-30">
                                    <div class="ibox-title">
                                        <h3 class="mb-30">Team Management <a class="mb-xs mt-xs mr-xs btn btn-primary f-right" href="add_team.php">Add Team Member</a><a style="margin-right: 10px;" class="mb-xs mt-xs mr-xs modal-basic btn btn-primary f-right" href="#add_team">Add Staff Member</a></h3>
                                    </div>

                                    <!-- Ibox Content -->
                                    <div class="ibox-content">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysql_query("SELECT * FROM admin") or die(mysql_error()); 
                                                $i = 1;
                                                while ($row = mysql_fetch_object($sql)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php print $i++; ?></td>
                                                        <td><?php print $row->name; ?></td>
                                                        <td><?php print $row->type; ?></td>
                                                        <td class="center"> 
                                                            <a class="simple-ajax-popup" href="ajax.php?edit_member=<?php print $row->id; ?>" id="<?php print $row->id; ?>" title="Edit Member"> <i class=" fa fa-comment-o"></i> </a> 
                                                            <a class="simple-ajax-popup" href="ajax.php?edit_image_member=<?php print $row->id; ?>" id="<?php print $row->id; ?>" title="Edit Image"> <i class=" fa fa-image"></i> </a>
                                                            <a class="" href="team_access.php?id=<?php print $row->id;?>" id="<?php print $row->id; ?>"> <i class="fa fa-gear"></i> </a>
                                                            <a class="simple-ajax-popup" href="ajax.php?edit_member_pwd=<?php print $row->id; ?>" id="<?php print $row->id; ?>" title="Edit password and username"> <i class="icon-key"></i> </a>
                                                            <?php if($row->username!='developer'){ ?>
                                                             <a id="<?php print $row->id; ?>" onclick="confirm_delete(<?php print $row->id; ?>)" title="Delete Team Member"> <i class="fa fa-trash"></i></a>
                                                            <?php }else{} ?> 
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } ?>
                                            </tbody>
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
    <!-- Add Page -->
    <div id="add_team" class="modal-block modal-header-color modal-block-primary mfp-hide">
        <section class="panel_hwc_modal">
            <header class="panel_hwc_modal-heading">
                <h2 class="panel_hwc_modal-title">Add Team Member</h2>
            </header>
            <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="panel_hwc_modal-body">
                    <div class="modal-wrapper">
                        <div class="ibox-content">
                            <div class="col-sm-12 form-group"><h3>General Info:</h3></div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Name</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="name" required/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Address</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="address" required />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                             <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">E-mail</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="email" class="form-control" name="email" required />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Gender</label>
                                <div class="col-sm-10 pull-right">
                                    <select class="select form-control" name="gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Fe-Male</option>
                                        <option value="other">Other</option>
                                    </select>
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
                             <div class="col-sm-12 form-group"><h3>Account Info:</h3></div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Username</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="text" class="form-control" name="username" required />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-2 col-form-label pull-left">Password</label>
                                <div class="col-sm-10 pull-right">
                                    <input type="password" class="form-control" name="password" required />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="panel_hwc_modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" name="add_team" class="btn btn-primary "><i class="fa fa-plus text-white"></i> Add Member</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </footer>
                <div class="clearfix"></div>
            </form>
        </section>
    </div>
    <!-- Add Page -->
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
    </script>
</body>
</html>