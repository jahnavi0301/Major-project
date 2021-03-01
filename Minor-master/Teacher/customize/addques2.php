<?php

session_start();
if(!isset($_SESSION['email']))
{
        header("location: ../index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');

// $qname=$_POST['qname'];
 // $qname=str_replace("'");
$qname=mysqli_real_escape_string($con,$_POST['qname']);
// $q = {$_POST['qname']};
// $desc=$_POST['desc'];
$desc=mysqli_real_escape_string($con,$_POST['desc']);
// $desc=str_replace("'");
// $d = {$_POST['desc']};
$lab=$_SESSION['labselected'];
// '".mysqli_real_escape_string($con, $value_to_insert)."'
$add="INSERT INTO questions_table VALUES (null,'$qname','$desc','$lab',0,'','','','','','','','','','')";
// INSERT INTO `questions_table`(`Q_ID`, `Q_NAME`, `DESCRIPTION`, `LAB_ID`, `CHECKER`, `TEST1`, `OP1`, `TEST2`, `OP2`, `TEST3`, `OP3`, `TEST4`, `OP4`, `TEST5`, `OP5`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15])
mysqli_query($con,$add);
header('location:../customization.php');


?>
