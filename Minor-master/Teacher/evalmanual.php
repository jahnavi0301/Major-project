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
$s=$_POST['sc'];
// echo $_SESSION['rollno'];
$r= $_POST['rno'];
$qid= $_SESSION['question'];
 $q="UPDATE qtos_map SET SCORE='$s' WHERE ROLL='$r' && Q_ID='$qid'";
 mysqli_query($con, $q);
 header('location:submissions.php');
?>