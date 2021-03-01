<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: ../index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$_SESSION['labselected']=$_POST['labselect'];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/dashstyle.css">
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

<form action="addques2.php" method="post">
    <h5>For the Lab: <?php echo $_SESSION['labselected'];?></h5>
    <div class="form-group">
        <label class="sr-only" for="qname">Question Name:</label>
        <input type="text" class="form-control" id="qname" placeholder="Question Name" name="qname">
    </div>
    <div class="form-group">
        <label class="sr-only" for="desc">Description:</label>
        <textarea type="text" class="form-control" id="desc" placeholder="Description" name="desc"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html>


