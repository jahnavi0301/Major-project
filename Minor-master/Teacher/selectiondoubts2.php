<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$branchselected=$_POST['branchselect'];
$_SESSION['branch']=$branchselected;
$_SESSION['batch']="";
$_SESSION['question']="";

?>

<!DOCTYPE html>
<html>
<head><title>Select Lab</title>
    <link rel="stylesheet" href="./css/dashboard.css"></link>
    <link rel="stylesheet" href="./css/dashstyle.css"></link>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Select Batch</title>
</head>

<body>
	<div class="header">
     <a href="#" class="logo"><img src="./images/igdtuwLogo.png"></a>
      <a href="#" class="clg-name">Indira Gandhi Delhi Technical University for Women</a>
  </div>

  <ul>
  <li><a id="b1" href="labmanual.php">Lab Manual</a></li>
  <li><a id="b2" href="selection1.php">View Submissions</a></li>
  <li><a id="b3" href="selectiondoubts1.php">View Doubts</a></li>
  <li><a id="b4" href="customization.php">Customization Settings</a></li>
  <li><a id="b4" href="attendance.php">Attendance</a></li>

  <li style="float:right"><a href="labselect.php">Change Lab</a></li>
  <li style="float:right"><a href="logout.php">Logout</a></li>
  <li style="float:right"><a href="#about">Welcome <?php echo $_SESSION['name'];?></a></li>

</ul>

 <?php
 $con=mysqli_connect('localhost','root','');
 mysqli_select_db($con,'minorproject1');
 $b=$_SESSION['branch'];
 $sql = "SELECT BATCH FROM batch where BRANCH='$b'";

 $result=mysqli_query($con,$sql);
 ?>

<form action="adminDoubts.php" method="post">
<div class="abcd">
    <div class="sbranch">
      	<p>Select Batch</p>
    </div>
    <div class="efg">
    <select name="batchselect" class="form-control">
    <?php
    while ($row = mysqli_fetch_array($result))
    {
        echo "<option value='". $row['BATCH'] ."'>" .$row['BATCH'] ."</option>" ;
    }
    
    ?>
    </select>

<button type="submit" class="btn2">Go</button>
   </div>
 </div>

</form>

</body>
</html>

