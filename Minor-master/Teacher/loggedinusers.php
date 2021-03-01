<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con2,'attendance1');
// $s=$_POST['sc'];
// echo $_SESSION['rollno'];
// $r= $_POST['rno'];
// $qid= $_SESSION['question'];
 $q="SELECT ROLL FROM `BCS-206` WHERE !session_destroy()";
 $res=mysqli_query($con, $q);
 while ($row=mysqli_fetch_array($res)) {
 	echo $row['ROLL'];
 	echo "<br>";
 }
 // header('location:submissions.php');
?>