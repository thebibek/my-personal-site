<!DOCTYPE html>

<?php 
$page = 'contact';
include 'config.php';

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $sbuject = $_POST['subject'];
   $message = addslashes($_POST['message']);

      $to = "kebibesilahc@gmail.com";
     $from = ''.$email.''; //the email address you want it from (the address does not have to exist to work)
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';
     $headers[] = "Contact Message";
     $subject = "Contact Message";

     $message1= '<html><br/>Contact Message<br/><b>Name: </b>'.$name.' <br/><b>Email:</b> '.$email.'<br/><b>Phone: </b>'.$phone.' <br/><b>Message: </b>'.$message.' <br/></html>';
     $mail =  mail($to,$subject,$message1, implode("\r\n", $headers));

   $sql = mysql_query("INSERT INTO message(name,email,message,curdate,curtime) VALUES('$name','$email','$subject','".$message."','Contact',curdate(),curtime())") OR die(mysql_error());
   $status3=1;
}

?>


<html lang="en">

<head>
    <meta charset="utf-8">
         <?php
            $sql = mysql_query("SELECT * FROM site") or die(mysql_error());
            while($row=mysql_fetch_object($sql)){
         ?>
         <title>Contact | <?php print $row->title; ?></title>
         <meta name="description" content="<?php print $row->des; ?>">
         <meta name="keywords" content="<?php print $row->keyword; ?>">
         <?php } ?>
         
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700" rel="stylesheet">

    <!-- Template CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/preloader.min.css" rel="stylesheet">
    <link href="css/circle.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/fm.revealator.jquery.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- CSS Skin File -->
    <link href="css/skins/yellow.css" rel="stylesheet">

   
    <!-- Modernizr JS File -->
    <script src="js/modernizr.custom.js"></script>
</head>

<body class="contact">

<!-- Header Starts -->
<?php
    include('header.php')
?>
<!-- Header Ends -->
<!-- Page Title Starts -->
<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>get in <span>touch</span></h1>
    <span class="title-bg">contact</span>
</section>
<!-- Page Title Ends -->
<!-- Main Content Starts -->
<section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
        <div class="row">
            <!-- Left Side Starts -->
            <div class="col-12 col-lg-4">
                <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">Don't be shy !</h3>
                <p class="open-sans-font mb-3">Feel free to get in touch with me. I am always open to discussing new projects, creative ideas or opportunities to be part of your visions.</p>
                <p class="open-sans-font custom-span-contact position-relative">
                    <i class="fa fa-envelope-open position-absolute"></i>
                    <span class="d-block">mail me</span>bibek@helloworldcorp.com.np
                </p>
                <p class="open-sans-font custom-span-contact position-relative">
                    <i class="fa fa-phone-square position-absolute"></i>
                    <span class="d-block">call me</span>+977 9801064978
                </p>
                <ul class="social list-unstyled pt-1 mb-5">
                    <li class="facebook"><a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="twitter"><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="youtube"><a title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li class="dribbble"><a title="Dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul>
            </div>
            <!-- Left Side Ends -->
            <!-- Contact Form Starts -->
            <div class="col-12 col-lg-8">
                <form class="contactform" method="post" action="">
                    <div class="contactform">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <input type="text" name="name" value="" id="input-name" class="form-control" placeholder="Enter your name"/>
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="email" name="email" value="" id="input-name" class="form-control" placeholder="YOUR EMAIL">
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="text" name="subject" value="" id="input-name" class="form-control" placeholder="YOUR SUBJECT">
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="input-enquiry" class="form-control" placeholder="YOUR MESSAGE"></textarea>
                                <button type="submit" name="submit" class="btn btn-contact">Send Message</button>
                            </div>
                            <div class="col-12 form-message">
                                <span class="output_message text-center font-weight-600 text-uppercase"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Contact Form Ends -->
        </div>
    </div>

</section>
<!-- Template JS Files -->
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/styleswitcher.js"></script>
<script src="js/preloader.min.js"></script>
<script src="js/fm.revealator.jquery.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpGridGallery.js"></script>
<script src="js/jquery.hoverdir.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>

</body>

</html>
