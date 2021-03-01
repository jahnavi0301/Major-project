<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$row='';
$batchselected=$_POST['batchselect'];
$_SESSION['batch']=$batchselected;
$_SESSION['check']=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>View Doubts</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/dashstyle.css">
    <meta content="width=device-width, initial-scale=1" name="viewport">
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

<form action="adminDoubts1.php" method="post" id="f1"></form>

<?php
        $lab_id=$_SESSION['lab'];
        $s="SELECT * FROM questions_table where LAB_ID='$lab_id'" ;
        $result=mysqli_query($con,$s);
        $num=mysqli_num_rows($result);
        // echo $num;
        if($num>=1)
        {
            while($row = mysqli_fetch_array($result)){
                $_SESSION['q_name']=$row['Q_NAME'];
                echo '<input type="checkbox" name="Question[]" data-name="Question" id="Question" value="'. $row['Q_NAME'] .'" form=f1>';
                    echo "<tr>";
                    echo "<td>";
                    echo  $_SESSION['q_name'];
                    echo "</br>";
                    echo "</td>";
                    echo "</tr>";
                    }
        }
        else
        {
          echo "No questions added to this lab.";
        }
    ?>
    <button type="submit" class="btn2" form=f1>Continue</button>

</body>
</html>