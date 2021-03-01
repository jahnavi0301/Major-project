<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
// echo $_POST['image'];
  $img = $_FILES['image']['tmp_name'];  
  $file = file_get_contents($img);
  $e=$_SESSION['email'];
  $query = "UPDATE teacher_registration set Sign='$img' WHERE EMAIL='$e'";
  if(!mysqli_query($con, $query))
  {
    echo mysqli_error($con);
  }

   $query = "SELECT Sign FROM teacher_registration WHERE EMAIL='$e'";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_array($result);
echo "<embed src=data:image/jpeg;base64,".base64_encode($row['Sign'])."'width='200'/>";
   ?>