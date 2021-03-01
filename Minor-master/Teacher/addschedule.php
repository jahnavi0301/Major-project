<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'attendance1');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con2,'attendance1');
echo $_SESSION['k'];
$email=$_SESSION['email'];
$q="SELECT * from schedule";
$result=mysqli_query($con,$q);

$num=mysqli_num_rows($result);

for($i=0;$i<count($_POST['sroll']);$i++)
 {  
  echo $_POST['branch'][$i];
  echo $_POST['batch'][$i];
  echo $_POST['sellab'][$i];
  echo $_POST['starttime'][$i];
  echo $_POST['endtime'][$i];
  echo $_POST['day'][$i];
  echo $_POST['sroll'][$i];
  echo $_POST['eroll'][$i];
  echo '<br>';
  $branch=$_POST['branch'][$i];
  $batch=$_POST['batch'][$i];
  $lab=$_POST['sellab'][$i];
  $st=$_POST["starttime"][$i];
  $et=$_POST["endtime"][$i];
  $d=$_POST["day"][$i];
  $s=$_POST["sroll"][$i];
  $e=$_POST["eroll"][$i];
  $query = "INSERT INTO schedule VALUES ('','$email','$lab','$branch','$batch','$st','$et','$d','$s','$e')";
  mysqli_query($con,$query);
 }
 $_SESSION['filename']=2;
 header('location:frontPage.php');
?>