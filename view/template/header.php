<!-- Preloader -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
        </div>
    </div>
</div><!--End off Preloader -->


<div class="culmn">
    <!--Home page style-->


    <nav class="navbar navbar-default bootsnav navbar-fixed">


        <div class="container"> 

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#brand">
                    <img src="<?php echo $basePath; ?>/assets/images/logo.png" class="logo" alt="">
                </a>

            </div>
            <!-- End Header Navigation -->

            <!-- navbar menu -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $basePath; ?>">Home</a></li>  

                    <?php

                    $authText = "Login";
                    $authUrl = "/login";
                    if (isset($_SESSION['username'])) {
                        $authText = "Logout (" . ucfirst($_SESSION['username']) . ")";
                        $authUrl = "/logout";
                        ?>
                        <li><a href="<?php echo $basePath; ?>/dashboard">Dashboard</a></li>  
                        <li><a href="<?php echo $basePath; ?>/emplist">Employee List</a></li>  
                        <li><a href="<?php echo $basePath; ?>/latecountreport">Late Count Report</a></li>  
                        <?php
                    }
                    ?>

                    <li><a href="<?php echo $basePath; ?>/register">Registration</a></li>  
                    <li><a href="<?php echo $basePath . $authUrl; ?>"><?php echo $authText; ?></a></li>  
                </ul>
            </div><!-- /.navbar-collapse -->
        </div> 

    </nav>