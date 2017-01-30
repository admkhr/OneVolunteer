<?php
    include 'core/init.php';
    $user = $_SESSION['user_id'];
    $res = get_events($user);

    if (isset($_GET['del'])){
        $del = $_GET['del'];
        mysql_query("DELETE FROM `events` WHERE `user_id` = '$del'");
        header ("Location: ngo.php");
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
                            <li><a href="ngo.php">NGO</a></li>
                            <li><a href="my_account.php">My Profile</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <div id="clients">
            <div class="section secondary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <p style="font-size: 20px; color: black;">Do you want to register a new event? Add it here.<button style="float: right;" class="message-btn" id="add_button" onclick="showDiv()">Add Event</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contact" class="contact" style="display:none;">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Add Event</h1>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span3"></div>
                            <div class="span6 contact-form centered">
                                <form action="add_event.php" method="post">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" name="event_name" id="email" placeholder="* Your Event name..." />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" name="event_date" id="email" placeholder="* Your Event Date..."   required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" name="event_desc" id="email" placeholder="* Your Event Description..."   required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" name="location" id="email" placeholder="* Your Event Location..."   required/>
                                        </div>
                                    </div>
                                    <p style="color: grey;">Select Category</p>
                                    <div class="control-group">
                                        <div class="controls">
                                            <select name="option">
                                                <option value = "Animals">Animals</option>
                                                <option value = "Children & Youth">Children & Youth</option>
                                                <option value = "Education">Education</option>
                                                <option value = "Health">Health</option>
                                                <option value = "Seniors">Seniors</option>
                                                <option value = "Disaster Relief">Disaster Relief</option>
                                                <option value = "Hunger">Hunger</option>
                                                <option value = "Justice & Legal">Justice & Legal</option>
                                                <option value = "Women">Women</option>
                                                <option value = "Environment">Environment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="message-btn">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="clients">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>Events You Have Registered</h1>
                    </div>
                </div>
                <div class="container">
                        <?php
                            $row=mysql_fetch_array($res);
                            if (!$row){ ?>
                        <div class="row-fluid">
                            <div class="span12 contact-form centered">
                                <h3><?php echo 'You have not registered any events yet.';?></h3>
                            </div>
                        </div>
                        <?php }
                        else{
                            while ($row){?>
                                <div class="row-fluid">
                                    <div class="span12 contact-form centered">
                                        <h3><?php echo $row['name'];?></h3>
                                        <h4 style="color: black;"><?php echo $row['date'];?></h4>
                                        <h4 style="color: black;"><?php echo $row['category'];?></h4>
                                        <h4 style="color: black;"><?php echo $row['location'];?></h4>
                                        <p style="color: black;"><?php echo $row['description'];?></p>
                                        <p style="color: black;">People who have volunteered to help for this event.</p>
                                        <?php
                                            $res1 = get_vol($row['user_id']);
                                            $row1 = mysql_fetch_array($res1);
                                            if (!$row1){?>
                                                <p>No one has registered to help yet.</p>
                                            <?php
                                            }
                                            else{
                                                while ($row1){
                                                    $res2 = get_profile1($row1['vid']);
                                                    $row2 = mysql_fetch_array($res2);?>
                                                    <p style="color: black;">Name: <?php echo $row2['name']; ?><?php echo ' ,  '; ?>Contact no:<?php echo $row2['phone'];?></p>
                                                <?php
                                                    $row1 = mysql_fetch_array($res1);
                                                }
                                            }
                                        ?>
                                        <?php echo "<b><a href=\"ngo.php?del={$row['user_id']}\" class = \"btn btn-danger\" style=\"font-size:17px;\">Delete</a></b>"; ?>
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