                    <?php
                        include('config.php')
                    ?>

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



<body>
    <div class="about">
        this a asajkhdjh
    </div>
</body>






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

