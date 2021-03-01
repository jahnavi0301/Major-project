<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: ../index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con2,'minorproject1');
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

<form action="labtimings.php" method="post">
  <div>
    <p>Select Lab</p>
  </div>
   <div>
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

    <div>
    <p>Select Branch:</p>
    </div>
   <div>
   <select name="branchselect" class="form-control">
      <option value="CSE">CSE</option>
      <option value="IT">IT</option>
      <option value="ECE">ECE</option>
      <option value="MECH">MECH</option>
   </select>
   </div>

   <div>
    <p>Select Batch:</p>
    </div>
   <div>
   <select name="batchselect" class="form-control">
   <?php
              $sql="SELECT DISTINCT BATCH FROM batch";
              $result=mysqli_query($con,$sql);
              while ($row = mysqli_fetch_array($result))
              {
                  echo "<option value='". $row['BATCH'] ."'>" .$row['BATCH'] ."</option>" ;
              }
            ?>
   </select>
   </div>


   <input type="text" class="text-field w-input" name="stime" data-name="stime" placeholder="Enter updated Start Time for the lab" id="stime" required="">
   <input type="text" class="text-field-2 w-input" name="etime" data-name="Name" placeholder="Enter updated Start Time for the lab" id="etime" required="">
          
    <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
</form>

<?php
    if(isset($_POST['submit']))
    {
      $lab_id=$POST['labselect'];
      $branch=$POST['branchselect'];
      $batch=$POST['batchselect'];
      $stime=$POST['stime'];
      $etime=$POST['etime'];

    } 
    //Put them in the schedule table for attendance database.
    // query would be:
    //$s="UPDATE schedule set STIME='$stime', ETIME='$etime' where EMAIL='$email' && LAB_ID='$lab_id' && BRANCH='$branch' && BATCH='$batch'"
?>

</body>
</html>


