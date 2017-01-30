<?php
include 'core/init.php';
$email = $_POST['email'];
$password = $_POST['password'];
if (user_exists($email) === false){?>
        <html>
            <script>
                window.alert("Email id does not exist. Re-enter email or Register.");
                window.location = "login.php";
            </script>
        </html>
<?php
}else if (login($email, $password) === false){?>
    <html>
        <script>
            window.alert("Wrong Password. Re-enter password.");
            window.location = "login.php";
        </script>
    </html>
<?php
}else{
    $_SESSION['user_id'] = user_id_from_username($email);
    header('Location: ngo.php');
}
?>