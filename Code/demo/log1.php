<?php
include 'core/init.php';
$email = $_POST['email'];
$password = $_POST['password'];
if (user_exists1($email) === false){?>
        <html>
            <script>
                window.alert("Email id does not exist. Re-enter email or Register.");
                window.location = "login1.php";
            </script>
        </html>
<?php
}else if (login1($email, $password) === false){?>
    <html>
        <script>
            window.alert("Wrong Password. Re-enter password.");
            window.location = "login1.php";
        </script>
    </html>
<?php
}else{
    $_SESSION['user_id'] = user_id_from_username1($email);
    header('Location: account1.php');
}
?>