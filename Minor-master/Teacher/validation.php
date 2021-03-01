<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');

$email=$_POST['Email'];
$password=$_POST['Password'];

$s="SELECT * FROM teacher_registration WHERE EMAIL='$email'&& PASSWORD='$password'";
$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);

if($num==1)
{
    while($row=mysqli_fetch_array($result))
    {
        $_SESSION['email']=$row['EMAIL'];
    }
    header('location:labselect.php');
}
else
{
    if(!session_id()) session_start();
	$_SESSION['filename'] = 3;
    header('location:frontPage.php');
}
?>