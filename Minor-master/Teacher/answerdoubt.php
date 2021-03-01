<!DOCTYPE html>
<html>
<body>


<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$d= $_POST['dt'];
$ansdoubt=$_POST['anstodoubt'];
$reg="UPDATE doubts set ANSWER='$ansdoubt' WHERE DOUBT='$d'";
mysqli_query($con,$reg);
header('location:adminDoubts1.php');
?>
</body>

</html>