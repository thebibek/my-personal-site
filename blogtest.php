﻿<?php
    include('config.php');
?>

<!-- Testing thye push commit -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
     <?php
            $sql = mysql_query("SELECT * FROM site") or die(mysql_error());
            while($row=mysql_fetch_object($sql)){
         ?>
         <title>Blog | <?php print $row->title; ?></title>
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

<body class="blog">
<!-- Header Starts -->
<?php 
    include('header.php')
?>


<!-- Header Ends -->
<!-- Page Title Starts -->
<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>my <span>blog</span></h1>
    <span class="title-bg">posts</span>
</section>
<!-- Page Title Ends -->
<!-- Main Content Starts -->
<section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
       
        <!-- Articles Starts -->
        <div class="row">
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                    <?php
                            $sql = mysql_query("SELECT * FROM blog ORDER BY blog_id DESC LIMIT 8") or die(mysql_error());
                            while ($row = mysql_fetch_object($sql)) {
                        ?>


                <article class="post-container">
                    <div class="post-thumb">
                        <a href="post-<?php print $row->url; ?>" class="post-thumb">
                              <img src="img/blog/<?php print $row->image; ?>" alt="<?php print $row->blog_name; ?>" class="img-fluid">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                                 <div class="entry-content open-sans-font">
                            <h3><h2><a href="post-<?php print $row->url; ?>"> <?php print $row->blog_name; } ?></a></h2></h3> 
                        </div>
                       
                              </div>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="blog-post.html" class="d-block position-relative overflow-hidden">
                            <img src="img/blog/blog-post-2.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Top 10 Toolkits for Deep Learning in 2020</a></h3>
                        </div>
                        <div class="entry-content open-sans-font">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="blog-post.html" class="d-block position-relative overflow-hidden">
                            <img src="img/blog/blog-post-3.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Everything You Need to Know About Web Accessibility</a></h3>
                        </div>
                        <div class="entry-content open-sans-font">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="blog-post.html" class="d-block position-relative overflow-hidden">
                            <img src="img/blog/blog-post-4.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">How to Inject Humor & Comedy Into Your Brand</a></h3>
                        </div>
                        <div class="entry-content open-sans-font">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="blog-post.html" class="d-block position-relative overflow-hidden">
                            <img src="img/blog/blog-post-5.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Women in Web Design: How To Achieve Success</a></h3>
                        </div>
                        <div class="entry-content open-sans-font">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Article Starts -->
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                <article class="post-container">
                    <div class="post-thumb">
                        <a href="blog-post.html" class="d-block position-relative overflow-hidden">
                            <img src="img/blog/blog-post-6.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-header">
                            <h3><a href="blog-post.html">Evergreen versus topical content: An overview</a></h3>
                        </div>
                        <div class="entry-content open-sans-font">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore...
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <!-- Article Ends -->
            <!-- Pagination Starts -->
            <div class="col-12 mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination Ends -->
        </div>
        <!-- Articles Ends -->
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
