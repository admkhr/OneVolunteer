<?php
include 'core/init.php';
$loc = $_SESSION['loc'];
$filter = $_POST['option'];
$res = get_filter_search($loc, $filter);

if (isset($_GET['id'])){
    if (logged_in1() === true){
        $eid = $_GET['id'];
        $vid = $_SESSION['user_id'];
        $eid = sanitize($eid);
        $vid = sanitize($vid);
        mysql_query("INSERT INTO `vol_table` (`eid`, `vid`) VALUES ('$eid', '$vid')");?>
    <html>
        <script>
            window.alert("Successfully listed for helping.");
            window.location = "account1.php";
        </script>
    </html>
    <?php    
    }
    else{?>
    <html>
        <script>
            window.alert("Login to help.");
            window.location = "login1.php";
        </script>
    </html>
        
    <?php
    }
}
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
        <style>
            #res_scroll{
                position: fixed;
            }
            @media only screen and (max-width: 500px) {
                #res_scroll{
                    position: absolute;
                }
            }
            @media only screen and (min-width: 500px) {
                .adjust{
                    display: none;
                }
            }
        </style>
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
                            <li><a href="login.php">NGO</a></li>
                            <li><a href="login1.php">Volunteer</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Newsletter section start -->
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Filter Search by Category</h3>
                        </div>
                        <div class="control-group">
                            <form action="search_cat.php" method="post">
                                <div class="controls">
                                    <select name="option" required>
                                        <option value = "animal">Animals</option>
                                        <option value = "animal">Children & Youth</option>
                                        <option value = "animal">Education</option>
                                        <option value = "animal">Health</option>
                                        <option value = "animal">Seniors</option>
                                        <option value = "animal">Disaster Relief</option>
                                        <option value = "animal">Hunger</option>
                                        <option value = "animal">Justice & Legal</option>
                                        <option value = "animal">Women</option>
                                        <option value = "animal">Environment</option>
                                    </select>
                                </div>
                                <div class="controls">
                                    <button type="submit" class="message-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row-fluid">
                    <div class="span2" id = "res_scroll">
                    </div>
                    <div class="adjust">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    <div class="span2">
                    </div>
                    <div class="container">
                        <?php
                            $row=mysql_fetch_array($res);
                            if (!$row){ ?>
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <h3><?php echo 'No results to display matching your filter criteria.';?></h3>
                            </div>
                        </div>
                        <?php }
                        else{
                            while ($row){?>
                                <div class="row-fluid">
                                    <div class="span12 contact-form centered">
                                        <h3><?php echo $row['name'];?></h3>
                                        <h4 style="color: black;">Date: <?php echo $row['date'];?></h4>
                                        <h4 style="color: black;">Category: <?php echo $row['category'];?></h4>
                                        <h4 style="color: black;">Location: <?php echo $row['location'];?></h4>
                                        <p style="color: black;"><?php echo $row['description'];?></p>
                                        <?php echo "<b><a href=\"search_cat.php?id={$row['user_id']}\" class = \"btn btn-info\" style=\"font-size:17px;\">Help</a></b>"; ?>
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
        </div>
        <div class="footer">
            <p>Designed and Developed by <a href="https://in.linkedin.com/in/tanmoy56">Tanmoy Mukherjee</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
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