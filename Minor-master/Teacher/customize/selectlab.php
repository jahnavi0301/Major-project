<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: ../index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
?>

<html>
<head>
    <link rel="stylesheet" href="../css/dashboard.css"></link>
    <link rel="stylesheet" href="../css/dashstyle.css"></link>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Select Lab</title>
</head>
<body>

<div class="header">
     <a href="#" class="logo"><img src="../images/igdtuwLogo.png"></a>
      <a href="#" class="clg-name">Indira Gandhi Delhi Technical University for Women</a>
  </div>

<ul>
  <li><a id="b1" href="../labmanual.php">Lab Manual</a></li>
  <li><a id="b2" href="../selection1.php">View Submissions</a></li>
  <li><a id="b3" href="../selectiondoubts1.php">View Doubts</a></li>
  <li><a id="b4" href="../customization.php">Customization Settings</a></li>
  <li><a id="b4" href="../attendance.php">Attendance</a></li>

  <li style="float:right"><a href="../labselect.php">Change Lab</a></li>
  <li style="float:right"><a href="../logout.php">Logout</a></li>
  <li style="float:right"><a href="#about">Welcome <?php echo $_SESSION['name'];?></a></li>

</ul>

<form action="addques.php" method="post">
<div class="abcd">
  <div class="chlab">
    <p>Choose Lab</p>
  </div>
   <div class="efgh">
   <select name="labselect" class="form-control">
    <?php
    $sql="SELECT LAB_ID FROM stol_map";

    $result=mysqli_query($con,$sql);
    
    while ($row = mysqli_fetch_array($result))
    {
        $temp=$row['LAB_ID'];
        $smallq="SELECT LAB_NAME FROM lab WHERE LAB_ID='$temp'";
        $res=mysqli_query($con,$smallq);
        $rownew=mysqli_fetch_array($res);
        echo "<option value='". $row['LAB_ID'] ."'>" .$rownew['LAB_NAME'] ."</option>" ;
    }
    ?>
</select>
<button type="submit" class="btn2">Submit</button>
   </div>
 </div>

</form>

</body>
</html>