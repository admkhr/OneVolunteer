<?php
    include 'core/init.php';
    $user = $_SESSION['user_id'];

    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_desc = $_POST['event_desc'];
    $event_cat = $_POST['option'];
    $location = $_POST['location'];

    $email = get_email($user);

    $event_name = sanitize($event_name);
    $email      = sanitize($email);
    $event_date = sanitize($event_date);
    $event_desc = sanitize($event_desc);
    $event_cat  = sanitize($event_cat);
    $location   = sanitize($location);

    mysql_query("INSERT INTO `events` (`name`, `email`, `date`, `description`, `category`, `location`) VALUES ('$event_name', '$email', '$event_date','$event_desc', '$event_cat', '$location')");

    header ("Location: ngo.php");
?>