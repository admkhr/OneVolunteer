<?php
include 'core/init.php';

if (check_email($_POST['email']) === true){?>
    <html>
        <script>
            window.alert("Email id has already been registered. Use a different email id or log in.");
            window.location = "register1.php";
        </script>
    </html>
<?php
}else if ($_POST['password'] != $_POST['confirm']){?>
    <html>
        <script>
            window.alert("Passwords do not match. Password and Confirm Password must be same.");
            window.location = "register1.php";
        </script>
    </html>
<?php
}else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password = md5($password);
    $category = $_POST['option'];
    $year = $_POST['year'];
    $president = $_POST['president'];
    
    $name = sanitize($name);
    $email = sanitize($email);
    $address = sanitize($address);
    $phone = sanitize($phone);
    $password = sanitize($password);
    $category = sanitize($category);
    $year = sanitize($year);
    $president = sanitize($president);
    mysql_query("INSERT INTO `vol` (`name`, `address`, `phone`, `email`, `password`, `dob`, `president`, `category`) VALUES ('$name', '$address', '$phone', '$email', '$password', '$year', '$president', '$category')");?>
    <html>
        <script>
            window.alert("You have registered successfully. Please login now to access features.");
            window.location = "login1.php";
        </script>
    </html>
<?php
}
?>