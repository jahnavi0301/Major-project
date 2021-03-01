<?php  
session_start();

$con=mysqli_connect('localhost','root','');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
mysqli_select_db($con2,'attendance1');
$branch=$_POST['branch'];
$batch=$_POST['batch'];
$qq="SELECT count(DISTINCT DATE) FROM `bcs-206` WHERE BATCH='$batch' && BRANCH='$branch'";
$result3 = mysqli_query($con2, $qq);
if (!$result3) {
    printf("Error: %s\n", mysqli_error($con2));
    exit();
}
else{
	echo $batch;
	echo "<br>";
	$result = mysqli_fetch_array($result3);
 //here you can echo the result of query
	echo "total number of days:";
 echo $result[0];
//           while($row = mysqli_fetch_array($result3)){
//           //	echo "fgd";
// echo $row['DATE'];
echo "<br>";
// }
}
$qqq="SELECT ROLL,COUNT(ROLL) FROM `bcs-206`   WHERE BATCH='$batch' && BRANCH='$branch' GROUP BY ROLL  ";
$result4 = mysqli_query($con2, $qqq);
$n=mysqli_num_rows($result4);
//if($n>0){
if (!$result4) {
    printf("Error: %s\n", mysqli_error($con2));
    exit();
}
else{
while($row=mysqli_fetch_array($result4)){
	//$c=0;
	$r= $row['ROLL'];
	echo $r;
	echo ": ";
	$a=array();
	$q="SELECT COUNT(DISTINCT(DATE)) FROM `bcs-206` where ROLL='$r'";
	$re = mysqli_query($con2, $q);
	$result = mysqli_fetch_array($re);
	// while($ro=mysqli_fetch_array($re)){
	// 	$e=$ro['DATE'];
	// 	echo $e;
	// 	echo ",";
	// }
	echo $result[0]. " ";
	 $i=0;
	// while($t= mysqli_fetch_array($result[1])){
	// 	$j= $t['DATE'];
	// 	echo $j;
	// 	echo ",";
	// }
	// while($i<$result[0]){
		$w="SELECT  DISTINCT(DATE) FROM `bcs-206` where ROLL='$r'";
		$re = mysqli_query($con2, $w);
		while($t= mysqli_fetch_array($re)){
		$j= $t['DATE'];
		echo $j;
		echo ",";
	}
	// 	$i=$i+1;
	// }
	// echo $rr;
	echo "<br>";
}
}
?>