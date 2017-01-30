<?php
$link = mysqli_connect("localhost", "u255743012_user", "frankstein", "u255743012_dat");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = mysqli_real_escape_string($link, $_POST['name']);
$content = mysqli_real_escape_string($link, $_POST['content']);
// Attempt insert query execution
$sql = "INSERT INTO review (name, content) VALUES ('$name', '$content')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
header('Location:  index.php');
exit();
?>