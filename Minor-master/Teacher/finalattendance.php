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
$nc=$_GET['file'];
$batch=$_SESSION['batch'];
// $branch=$_SESSION['branch'];
$branch='CSE';
// $batch='A1';
// echo $_SESSION['lab_id'];
echo $branch. "<br>" .$batch;
// $curDate=date("y-m-d");
// $d=date("w");
// if($d==1)
// $d='Monday';
// else if($d==2)
// $d='Tuesday';
// else if($d==3)
// $d='Wednesday';
// else if($d==4)
// $d='Thursday';
// else if($d==5)
// $d='Friday';
// echo $branch;
// $nc='';
// $q5="SELECT STIME,ETIME FROM schedule WHERE LAB_ID='BCS-206' &&  BRANCH='$branch' && BATCH='$batch' ";
//  $r5= mysqli_query($con2, $q5);  
// $r5= mysqli_query($con2, $q5);  
//   //  echo "hey" .$roll. "<br>";
//   while($row2 = mysqli_fetch_array($r5)){
//     // $dt=$row2['DATE'];
//   $st=$row2['STIME'];
//   $et=$row2['ETIME'];
//   // $d=$row2['DAY'];
//   //  echo $curDate. " " .$st. " " .$et ."<br>";
//   $nc=$curDate. "_" .$st. "-" .$et ;
//  }
// $nc=$_SESSION['date'];
// echo $nc;
$a2=array();
 $query="SELECT ROLL FROM `BCS-206` WHERE `$nc`=1";
 $res=mysqli_query($con2, $query);
while($row = mysqli_fetch_array($res)){
  // echo $row['ROLL']. "<br>";
  array_push($a2, $row['ROLL']);
}
// echo "--" .$a2;
$k=array();
// echo $_GET['file']. ';;;';
// echo $_POST['temp']. "++";
if (isset($_POST['present'])) {
  foreach ($_POST['present'] as $i) {
  array_push($k,$i);
}
  $days = implode(' ', $_POST['present']);
} else {
  $days = "not available";
}
echo $days;
echo "<br>";
echo $nc;

$att=array_diff($a2 ,$k);
$q="UPDATE `BCS-206` set `$nc`= NULL WHERE ROLL IN (".implode( $att,',').")";

// echo $_POST['present'][1];  
// $s=$_POST['sc'];
// // echo $_SESSION['rollno'];
// $r= $_POST['rno'];
// $qid= $_SESSION['question'];
//  $q="UPDATE qtos_map SET SCORE='$s' WHERE ROLL='$r' && Q_ID='$qid'";
 mysqli_query($con2, $q);
//  header('location:submissions.php');
?>