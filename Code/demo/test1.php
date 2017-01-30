<?php
include 'core/init.php';

if ($_POST['name']){
    echo 'hi';
}
?>

<html>
<form action="test1.php" method="post">
    <input name="name">Test
    <input type="submit">submit
</form>
</html>