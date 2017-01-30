<?php
    include 'core/init.php';
    $user_id = $_SESSION['user_id'];
    $res = get_profile1($user_id);
?>


<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Company Name</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="event.html">Event Calendar</a></li>
                            <li><a href="vol.php">Volunteer</a></li>
                            <li><a href="my_account1.php">My Profile</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <?php $name = name_return1(); ?>
                    <p style = "font-size: 20px;">Hello, <a href="my_account.php" style = "color: white;"><?php echo $name;?></a>!
                        <a href = "logout1.php" style = "font-size: 17px; color: white; float: right;">Logout</a></p>
                    
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <?php $row=mysql_fetch_array($res);?>
        <div id="contact">
            <div class="section secondary-section">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Name: <?php echo $row['name']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Email: <?php echo $row['email']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Contact Number: <?php echo $row['phone']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Address: <?php echo $row['address']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Name of President: <?php echo $row['president']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Date of birth: <?php echo $row['dob']?></p>
                            </div>
                        </div>
                    </div>
                <div class="container">
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Catgeory of work: <?php echo $row['category']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row-fluid">
                            <h2>Events that you have committed to help. </h2>
                            
                            <div class="span12 contact-form centered">
                                <p style="color:black; float:left;">Date of birth: <?php echo $row['dob']?></p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="footer">
            <p>Designed and Developed by <a href="https://in.linkedin.com/in/tanmoy56">Tanmoy Mukherjee</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open" style="color: black;"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>