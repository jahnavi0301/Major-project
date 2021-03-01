<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
?>

<html>
<head>
    <link rel="stylesheet" href="./css/dashboard.css"></link>
    <link rel="stylesheet" href="./css/dashstyle.css"></link>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Select Lab</title>
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

<form action="regforlabs2.php" method="post" id="f1"></form>

<?php
        $sql="SELECT LAB_ID FROM stol_map";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);

        if($num>=1)
        {
            while ($row = mysqli_fetch_array($result))
            {
                $temp=$row['LAB_ID'];
                $smallq="SELECT LAB_NAME FROM lab WHERE LAB_ID='$temp'";
                $res=mysqli_query($con,$smallq);
                $rownew=mysqli_fetch_array($res);
                echo '<input type="checkbox" name="Lab[]" data-name="Lab" id="Lab" value="'. $row['LAB_ID'] .'" form=f1>';
                    echo "<tr>";
                    echo "<td>";
                    echo  $rownew['LAB_NAME'];
                    echo "</br>";
                    echo "</td>";
                    echo "</tr>";
                    }
        }
        else
        {
          echo "No labs present.";
        }
    ?>
    <button type="submit" class="btn2" form=f1>Continue</button>

</body>
</html>