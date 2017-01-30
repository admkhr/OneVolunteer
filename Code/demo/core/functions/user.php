<?php
    function logged_in(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }

    function logged_in1(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }
    
    function name_return(){
        $name = $_SESSION['user_id'];
        return (mysql_result(mysql_query("SELECT `user_name` FROM users WHERE `user_id` = '$name'"), 0));
    }

    function name_return1(){
        $name = $_SESSION['user_id'];
        return (mysql_result(mysql_query("SELECT `name` FROM vol WHERE `id` = '$name'"), 0));
    }
    
    function user_exists($email){
        $email = sanitize($email);
        $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    function user_exists1($email){
        $email = sanitize($email);
        $query = mysql_query("SELECT COUNT(`id`) FROM `vol` WHERE `email` = '$email'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    function user_id_from_username($email){
        $email = sanitize($email);
        return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"), 0, 'user_id');
    }

    function user_id_from_username1($email){
        $email = sanitize($email);
        return mysql_result(mysql_query("SELECT `id` FROM `vol` WHERE `email` = '$email'"), 0, 'id');
    }
    
    function login($email, $password){
        $user_id = user_id_from_username($email);
        
        $email = sanitize($email);
        $password = md5($password);
        
        return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM users WHERE `email` = '$email' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
    }

    function login1($email, $password){
        $user_id = user_id_from_username1($email);
        
        $email = sanitize($email);
        $password = md5($password);
        
        return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `vol` WHERE `email` = '$email' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
    }

    function get_email($user){
        return (mysql_result(mysql_query("SELECT `email` FROM `users` WHERE `user_id` = '$user'"), 0));
    }

    function get_events($user){
        $user = sanitize($user);
        $email = get_email($user);
        return (mysql_query("SELECT * FROM `events` WHERE `email` = '$email'"));
    }

    function send_mail($email){
        
    }

    function check_email($email){
        $email = sanitize($email);
        $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    function check_email1($email){
        $email = sanitize($email);
        $query = mysql_query("SELECT COUNT(`id`) FROM `vol` WHERE `email` = '$email'");
        return (mysql_result($query, 0) == 1) ? true : false;
    }

    function get_locs(){
        return (mysql_query("SELECT DISTINCT `location` FROM `events`"));
    }

    function get_search_by_loc($loc){
        $loc = sanitize($loc);
        return (mysql_query("SELECT * FROM `events` WHERE `location` = '$loc'"));
    }

    function get_filter_search($loc, $filter){
        $loc = sanitize($loc);
        $filter = sanitize($filter);
        return (mysql_query("SELECT * FROM `events` WHERE `location` = '$loc' and `category` = '$filter'"));
    }

    function get_profile($user_id){
        $user = sanitize($user_id);
        return (mysql_query("SELECT * FROM `users` WHERE `user_id` = '$user'"));
    }

    function get_profile1($user_id){
        $user = sanitize($user_id);
        return (mysql_query("SELECT * FROM `vol` WHERE `id` = '$user'"));
    }

    function vol_event($user){
        $user = sanitize($user);
        return (mysql_query("SELECT * FROM `vol_table` WHERE `vid` = '$user'"));
    }

    function each_event($eid){
        $eid = sanitize($eid);
        return (mysql_query("SELECT * FROM `events` WHERE `user_id` = '$eid'"));
    }

    function get_vol($eid){
        $eid = sanitize($eid);
        return (mysql_query("SELECT * FROM `vol_table` WHERE `eid` = '$eid'"));
    }
?>