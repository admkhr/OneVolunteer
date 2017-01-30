<?php
    include 'core/init.php';
    $user = $_SESSION['user_id'];
    $res = vol_event($user);
?>
<?php
                            $row=mysql_fetch_array($res);
                            if (!$row){ ?><?php echo 'You have not registered to help for any events yet.';?>
                            
                        <?php }
                        else{
                            while ($row){?>
                                        <?php 
                                            $res1 = each_event($row['eid']);
                                            $row1=mysql_fetch_array($res1);
                                        ?>
                                        <h3><?php echo $row1['name'];?></h3>
                                        <h4 style="color: black;"><?php echo $row1['date'];?></h4>
                                        <h4 style="color: black;"><?php echo $row1['category'];?></h4>
                                        <h4 style="color: black;"><?php echo $row1['location'];?></h4>
                                        <p style="color: black;"><?php echo $row1['description'];?></p>
                                    
                                <br><br>
                        <?php
                                $row=mysql_fetch_array($res);
                            }
                        }
                        ?>