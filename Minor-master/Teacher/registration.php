<?php
session_start();

$con=mysqli_connect('localhost','root','');
if(!$con){
    echo "Error: Unable to connect to MySQL.";
}
mysqli_select_db($con,'minorproject1');

$name=$_POST['Name'];
$email=$_POST['Email'];
$password=$_POST['Password'];
$_SESSION['email']=$email;

$s="SELECT * FROM teacher_registration WHERE EMAIL='$email'";
$result=mysqli_query($con,$s);
$num=0;
$num=mysqli_num_rows($result);

if($num==0)
{
	if(!session_id()) session_start();
	$_SESSION['filename'] = 2;
    $reg="INSERT INTO teacher_registration VALUES (null,'$name','$email','$password')";
    mysqli_query($con,$reg);
    header('location:regforlabs.php');
}
else
{
    if(!session_id()) session_start();
	$_SESSION['filename'] = 1;
	header('location:frontPage.php');
}

?>