<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <title>Time Tracker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/bootsnav.css">
        <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo $basePath; ?>/assets/css/responsive.css" />

    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">
        <input type="hidden" id="basePath" value="<?php echo $basePath; ?>">
        <?php
        include_once 'header.php';
        include_once $page;
        include_once 'footer.php';
        ?>
    </div>

    <!-- JS includes -->

    <script src="<?php echo $basePath; ?>/assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/bootsnav.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/main.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/jquery.md5.js"></script>
    <script src="<?php echo $basePath; ?>/assets/js/businesslogic.js"></script>

</body>
</html>
