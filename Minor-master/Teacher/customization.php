<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/dashstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Settings</title>
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
<form method="post" enctype="multipart/form-data" action='signupload.php'>
      <label><h4>Select your sign</h4></label>
      <input type="file" name="image" id="image" />
      <br/>
      <input type="submit" name="insert" id="insert" value="Upload" />
   </form>
<br/>
<div class="list-group">
  <a href="./customize/selectlab.php" class="list-group-item">Add questions to a Lab</a>
  <a href="./customize/addlab.php" class="list-group-item">Add Lab </a>
  <a href="./customize/updatebatch.php" class="list-group-item">Update batches of a class</a>
  <br>
  <a class="list-group-item">Lab Settings</a>
  <a href="./customize/addschedule1.php" class="list-group-item">Add Lab schedule</a>
  <a href="./customize/updateschedule.php" class="list-group-item">Update Lab schedule</a>
</div>
 

</body>
</html>


