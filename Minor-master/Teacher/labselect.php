<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
?>

<html>
<head>
    <link rel="stylesheet" href="./css/dashboard.css"></link>
    <link rel="stylesheet" href="./css/dashstyle.css"></link>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Select Lab</title>
    <style>
    body{
      background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url(/Student/images/comp.jpg);
      background-repeat:no-repeat;
      background-position:center;
      background-size:cover;
      height:100%;
      width:100%;
  }
  </style>
</head>
<body>

  <div class="header">
     <a href="#" class="logo"><img src="./images/igdtuwLogo.png"></a>
      <a href="#" class="clg-name">Indira Gandhi Delhi Technical University for Women</a>
  </div>
  <div class="project-name">
    <p>Programming Lab Evaluation Portal</p>
  </div>
 <div class="rightbt">
 <form action="logout.php"> 
  <button class="btn" style="float: right" href="logout.php">Logout</button>
 </form>
</div>

<form action="dashboard.php" method="post">
<div class="abcd">
  <div class="chlab">
    <p>Choose Lab</p>
  </div>
   <div class="efgh">
   <select name="labselect" class="form-control">
    <?php
    $email=$_SESSION['email'];
    echo $email;
    $sql="SELECT LAB_ID FROM ttol_map WHERE EMAIL='$email'";

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