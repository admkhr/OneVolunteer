<?php
    include 'core/init.php';
    $user = $_SESSION['user_id'];
    $res = vol_event($user);
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
                            <li><a href="my_account1.php">My Profile</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <div id="clients">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>Events You Have Registered to help.</h1>
                    </div>
                </div>
                <div class="container">
                        <?php
                            $row=mysql_fetch_array($res);
                            if (!$row){ ?>
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <h3><?php echo 'You have not registered to help for any events yet.';?></h3>
                            </div>
                        </div>
                        <?php }
                        else{
                            while ($row){?>
                                <div class="row-fluid">
                                    <div class="span12 contact-form centered">
                                        <?php 
                                            $res1 = each_event($row['eid']);
                                            $row1=mysql_fetch_array($res1);
                                        ?>
                                        <h3><?php echo $row1['name'];?></h3>
                                        <h4 style="color: black;"><?php echo $row1['date'];?></h4>
                                        <h4 style="color: black;"><?php echo $row1['category'];?></h4>
                                        <h4 style="color: black;"><?php echo $row1['location'];?></h4>
                                        <?php
                                            $id = user_id_from_username($row1['email']);
                                            $res2 = get_profile($id);
                                            $row2 = mysql_fetch_array($res2);
                                        ?>
                                        <h4 style="color: black;">Contact Number of Event Holder: <?php echo $row2['contact_no'];?></h4>
                                        <p style="color: black;"><?php echo $row1['description'];?></p>
                                    </div>
                                </div>
                                <br><br>
                        <?php
                                $row=mysql_fetch_array($res);
                            }
                        }
                        ?>
                        
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
        <script>
            function showDiv() {
                document.getElementById('contact').style.display = "block";
            }
        </script>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
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