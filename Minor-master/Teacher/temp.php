<?php
session_start();

$con=mysqli_connect('localhost','root','');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
mysqli_select_db($con2,'attendance1');

$batch=$_SESSION['batch'];
$branch=$_SESSION['branch'];
$lab_id=$_SESSION['lab'];
// $roll=$_SESSION['roll'];
$s=$lab_id."-old";
// echo $s;
// $q1="SELECT DISTINCT DATE,STIME,ETIME,ROLL FROM `$s`";// WHERE BRANCH='$branch' && BATCH='$batch'";
$q1="SELECT DISTINCT ROLL FROM `$s`";
$r1= mysqli_query($con2, $q1);  
while($row1 = mysqli_fetch_array($r1)){
  $roll=$row1['ROLL'];
 $q5="SELECT DATE,STIME,ETIME FROM `$s` WHERE ROLL='$roll' GROUP BY DATE";
 $r5= mysqli_query($con2, $q5);  
  echo $roll. "<br>";
  while($row2 = mysqli_fetch_array($r5)){
    $dt=$row2['DATE'];
  $st=$row2['STIME'];
  $et=$row2['ETIME'];
   echo $dt. " " .$st. " " .$et ."<br>";
  $nc=$dt. "_" .$st. "-" .$et ;
  $result = mysqli_query($con2,"SHOW COLUMNS FROM `$lab_id` LIKE '$nc'");
  $exists = (mysqli_num_rows($result))?TRUE:FALSE;
  if(!$exists) {
  $q2="ALTER TABLE `$lab_id` ADD `$nc` BOOLEAN";
  $r2= mysqli_query($con2, $q2);  
  }
else{
  $q3="SELECT * FROM `$lab_id` WHERE ROLL='$roll'";
$res1=mysqli_query($con2,$q3);
$num=mysqli_num_rows($res1);

if($num==0){
  $q4="INSERT INTO `$lab_id`(`ID`, `BRANCH`, `BATCH`, `ROLL`, `$nc`) VALUES (null,'$branch','$batch','$roll','1')";
  $res2=mysqli_query($con2,$q4);
   }
else{
  echo "update: " .$nc."<br>";
  $q4="UPDATE `$lab_id` set `$nc`='1' where ROLL='$roll'";
  $res2=mysqli_query($con2,$q4);
  if (!$res2) {
    echo("Error description: " . mysqli_error($con2));
  }
  echo "<br>";
}
}
  }
}
?>