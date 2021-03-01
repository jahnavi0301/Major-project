<?php
error_reporting(0);
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$curYear=date('Y');
$curMonth=date('M');
$month=0;
switch ($curMonth) {
    case "Jan":$month=1;break;
    case "Feb":$month=2;break;
    case "Mar":$month=3;break;
    case "Apr":$month=4;break;
    case "May":$month=5;break;
    case "Jun":$month=6;break;
    case "Jul":$month=7;break;
    case "Aug":$month=8;break;
    case "Sep":$month=9;break;
    case "Oct":$month=10;break;
    case "Nov":$month=11;break;
    case "Dec":$month=12;break;
}
$year=$month<6?$curYear-1:$curYear;

if(!session_id()) session_start();
$filename = $_SESSION['filename'];

if($filename==1)
{
  ?>

  <script>
  window.alert("User already exisits");
  </script>

  <?php

  $filename=0;
  $_SESSION['filename'] = $filename;
}
else if($filename==2)
{
  ?>

  <script>
  window.alert("User registered successfuly. Please login to continue.");
  </script>

  <?php

  $filename=0;
  $_SESSION['filename'] = $filename;
}
else if($filename==3)
{
  ?>

  <script>
  window.alert("Incorrect Enrollment number or Password. Try again.");
  </script>

  <?php

  $filename=0;
  $_SESSION['filename'] = $filename;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <link rel="stylesheet" href="./css/dashstyle.css">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/styling.css">
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/sarangs-crazy-project.webflow.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="images/images.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Terminal - Sign Up</title>

</head>
<style>
  body{
    background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url(/Student/images/comp.jpg);
    background-repeat:no-repeat;
    background-position:center;
    background-size:cover;
    height:100%;
    width:100%;
    margin-top:0px;
  }
  .section2{
    border-left:3px ridge black;
  }
  .section2:hover{
    opacity:1;
  }
  .header{
    margin-top:0px;
  }
</style>
<body>

  <div class="header">
     <a href="#" class="logo"><img src="./images/igdtuwLogo.png"></a>
      <a href="#" class="clg-name">Indira Gandhi Delhi Technical University for Women</a>
  </div>

<div class="project-name">
	<p>Welcome to Programming Lab Evaluation</p>
</div>
<a class="btn btn-primary btn-lg" href="/Home Page and utilities/startpage.html" role="button">Back To Home Page</a>

<div class="t-portal">
<h2 style="text-align:center; font-family:Georgia; color:black;"><b>Student Portal</b></h2>
</div>

<div class="main" >
    <div class="w-container" >
      <h4 style="font-family:arial">Not a member?</h4>
      <div class="title" style="border-right:2px solid black">
        <h2><b>Register Yourself!</b></h2>
      </div>
      <form action="registration.php" method="post">
      <div class="w-row">
        <div class="w-col w-col-7">
          <input type="text" class="text-field w-input" name="RollNumber" data-name="RollNumber" placeholder="Enrollment Number" id="RollNumber" required="">
          <input type="text" class="text-field-2 w-input" name="Name" data-name="Name" placeholder="Name" id="Name" required="">
          <input type="password" class="text-field-3 w-input" name="Password" data-name="Password" placeholder="Password" id="Password" required="">          
          <select name="YOA" class="text-field-4 w-input">
          <?php
            $count=4;
            echo "<option value=''>Choose Year</option>" ;
            while ($count>0)
            {
              echo "<option value='". $year ."'>" .$year ."</option>" ;
              $year=$year-1;
              $count=$count-1;
            }
          ?>
          </select>
          <select name="Branch" class="text-field-5 w-input">
            <option value="CSE">Computer Science</option>
            <option value="IT">Information Technology</option>
            <option value="ECE">Electrical</option>
            <option value="Mech">Mechanical</option>
          </select>
          <select name="Batch" class="text-field-6 w-input">
            <?php
              $sql="SELECT DISTINCT BATCH FROM batch";
              $result=mysqli_query($con,$sql);
              while ($row = mysqli_fetch_array($result))
              {
                  echo "<option value='". $row['BATCH'] ."'>" .$row['BATCH'] ."</option>" ;
              }
            ?>
          </select>
          <button type="submit" class="button-2 w-button" >Submit</button>
        </div>
      </div>
    </form>
    </div> 
    <div class="card" style="width: 26rem; display:inline-block; border:2px ridge;margin-left:30px">
      <img src="/Student/images/play_video.jpg" class="card-img-top" alt="..." >
      <div class="card-body">
        <h5 class="card-title">EXPLORE</h5>
        <p class="card-text">Visualise sorting algos</p>
        <a class="btn btn-success btn-lg" href="https://clementmihailescu.github.io/Sorting-Visualizer/" role="button">Visualise sorting algos</a>
      </div>
    </div>  
    <div class="card" style="width: 16rem; display:inline-block; border:2px ridge;margin-left:30px">
      <img src="/Student/images/meet.png" class="card-img-top" alt="..." >
      <div class="card-body">
        <h5 class="card-title">START OR JOIN MEETING</h5>
        <p class="card-text">Click to choose</p>
        <div class="list-group">
          <a href="https://www.zoom.us/" class="list-group-item list-group-item-action">Zoom</a>
          <a href="https://apps.google.com/meet/" class="list-group-item list-group-item-action">Google Meet</a>
          <a href="https://www.webex.com/unified-homepage-081220201.html?adobe_mc_sdid=SDID%3D40CC5A01D563F34F-7E15EEEF2A151858%7CMCORGID%3DB8D07FF4520E94C10A490D4C%40AdobeOrg%7CTS%3D1607959726&adobe_mc_ref=https%3A%2F%2Fwww.google.com%2F" class="list-group-item list-group-item-action">Cisco Webex</a>
        </div>
      </div>
    </div>  
    <div class="section-2" style="border-left:2px solid black;" >
      <form action="validation.php" method="post">
            <h2><b>LOGIN HERE</b></h2>
            <input type="text" class="text-field-4 w-input" maxlength="100" name="RollNumber" data-name="RollNumber" placeholder="Enrollment number" id="RollNumber" required="">
            <input type="password" class="text-field-4 w-input" maxlength="256" name="Password" data-name="Password" placeholder="Password" id="Password" required="">
            <button type="submit" class="button-2 w-button" >Login</button>
     </form>
      <!-- ***************************************FORGET PASSWORD******************************************** -->
      <a class="btn btn-danger btn-lg" href="forget_pass.php" role="button">Forgot Password?</a>

    <!-- **************************************************************************************************** -->

     </div>
    </div>

    
</body>
</html>