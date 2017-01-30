<?php
    include 'core/init.php';
    $user = $_SESSION['user_id'];

    if ($_POST['event_name']){
        $event_name = $_POST['event_name'];
        $event_date = $_POST['event_date'];
        $event_desc = $_POST['event_desc'];
        $event_cat = $_POST['option'];

        $email = get_email($user);

        $event_name = sanitize($event_name);
        $email      = sanitize($email);
        $event_date = sanitize($event_date);
        $event_desc = sanitize($event_desc);
        $event_cat  = sanitize($event_cat);

        mysql_query("INSERT INTO `events` (`name`, `email`, `date`, `description`, `category`) VALUES ('$event_name', '$email', '$event_date','$event_desc', '$event_cat')");

        header ("Location: ngo.php");
    }
?>