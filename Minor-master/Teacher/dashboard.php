
<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$labselected=$_POST['labselect'];
$_SESSION['lab']=$labselected;

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');

$s="SELECT NAME FROM teacher_registration WHERE EMAIL='$email'";
$result=mysqli_query($con,$s);
$row=mysqli_fetch_array($result);
$_SESSION['name']=$row['NAME'];

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/dashstyle.css">
  <link rel="stylesheet" href="styling1.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
<title>Dashboard</title>
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
      
       <div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="header-title pb-3 mt-0">LAB MANUAL</h2>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>Question ID</th>
                                    <th>Question Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                $_SESSION['q_id']=$row['Q_ID'];
                                $_SESSION['desc']=$row['DESCRIPTION'];
                               echo "<tr>";
                                    echo "<td>";
                                    echo  $_SESSION['q_id'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo  $_SESSION['q_name'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo  $_SESSION['desc'];
                                    echo "</td>";
                                echo "</tr>";
                              }
                            }
                            else
                                {echo "No questions added to this lab.";
                                   // header('location:login2.php');
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="list-group">
                  <h1 style="background-color:black;color:white;">Make Documents</h1>
                  <a href="https://docs.google.com/" class="list-group-item list-group-item-action">Google Docs</a>
                  <a href="https://sheets.google.com/" class="list-group-item list-group-item-action">Google Sheets</a>
                  <a href="https://slides.google.com/" class="list-group-item list-group-item-action">Google Slides</a>
              </div>
                              <!-- BLACKBOARD -->
                <h1 style="background-color:black;color:white;">Blackboard<h1>
                <div class="card" style="width: 26rem; display:inline-block; border:2px ridge;">
                <img src="/Student/images/blackboard.png" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h5 class="card-title"Blackboard></h5>
                  <p class="card-text">Scribble, draw, explain...</p>
                  <a class="btn btn-success btn-lg" href="/PepBoard-master/public/index.html" role="button">Blackboard</a>
                </div>
              </div>
              <div class="card" style="width: 26rem; display:inline-block; border:2px ridge;margin-left:30px">
                <img src="/Student/images/calculator.png" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h5 class="card-title"Blackboard></h5>
                  <p class="card-text">Scientific calculator</p>
                  <a class="btn btn-success btn-lg" href="/Home Page and utilities/calculator.html" role="button">Calculate</a>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>


 
</body>

</html>