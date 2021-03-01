<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: ../index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con2,'attendance1');


for($i=0;$i<count($_POST['sroll']);$i++)
 { 
  $branch=$_POST['branch'][$i];
  $batch=$_POST['batch'][$i];
  $lab=$_POST['sellab'][$i];
  $st=$_POST["starttime"][$i];
  $et=$_POST["endtime"][$i];
  $d=$_POST["day"][$i];
  $s=$_POST["sroll"][$i];
  $e=$_POST["eroll"][$i];
  $query = "INSERT INTO schedule VALUES ('','$email','$lab','$branch','$batch','$st','$et','$d','$s','$e')";
  mysqli_query($con2,$query);
 }
 $_SESSION['filename']=2;
 header('location:../customization.php');
?>