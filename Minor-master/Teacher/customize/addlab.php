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
mysqli_select_db($con2,'attendance1');
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

<form action="addlab.php" method="post">
    <div class="form-group">
        <label class="sr-only" for="qname">Subject Code</label>
        <input type="text" class="form-control" id="scode" placeholder="Subject Code" name="scode">
    </div>
    <div class="form-group">
        <label class="sr-only" for="desc">Lab Name</label>
        <textarea type="text" class="form-control" id="lname" placeholder="Lab Name" name="lname"></textarea>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
</form>

<?php
$scode='';
$lname='';
if(isset($_POST['submit'])) {
                                
    if($_POST['scode']) {
      $scode=$_POST['scode'];
    }
    else
    {
    ?>
        <script>
        window.alert("Subject Code cannot be empty");
        </script>
    <?php
    }
    if($_POST['lname']) {
        $lname=$_POST['lname'];
      }
      else
      {
      ?>
          <script>
          window.alert("Lab Name cannot be empty");
          </script>
      <?php
      }

      if($scode&&$lname)
      {
        echo $scode;
        echo $lname;
        
        $add="INSERT INTO lab VALUES (null,'$scode','$lname')";
        mysqli_query($con,$add);
        mysqli_query($con2,$add);

        $create="CREATE TABLE `$scode` (
          `ID` int(11) NOT NULL,
          `DATE` date NOT NULL,
          `DAY` varchar(255) NOT NULL,
          `STIME` int(11) NOT NULL,
          `ETIME` int(11) NOT NULL,
          `BRANCH` varchar(255) NOT NULL,
          `BATCH` varchar(255) NOT NULL,
          `ROLL` bigint(20) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        mysqli_query($con2,$create);

        $create2="ALTER TABLE `$scode` ADD PRIMARY KEY (`ID`)";
        mysqli_query($con2,$create2);
        
        $create3="ALTER TABLE `$scode` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT";
        mysqli_query($con2,$create3);


        
        ?>
          <script>
          window.alert("Lab added successfully");
          </script>
      <?php
        header('location:../customization.php');

      }
}





?>

</body>
</html>


