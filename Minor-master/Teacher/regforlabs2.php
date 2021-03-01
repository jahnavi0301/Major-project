<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');

$lab = $_POST['Lab'];
$email = $_SESSION['email'];
for ($x = 0; $x < count($lab); $x++) 
{
    $l=$lab[$x];
    echo $l;
    echo '<br>';
    $reg="INSERT INTO ttol_map VALUES (null,'$email','$l')";
    mysqli_query($con,$reg);
}
header('location:labschedule.php');
//header('location:frontPage.php');

?>

