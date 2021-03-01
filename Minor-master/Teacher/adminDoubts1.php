<?php
session_start();
header('Cache-Control: no cache');
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
if(!isset($_POST['Question']))
  {
    $que=$_SESSION['q'];
    $message = "updated";
echo "<script type='text/javascript'>alert('$message');</script>";
  }
else{
$que = $_POST['Question'];
$_SESSION['q']=$que;
}
$batch=$_SESSION['batch'];
$branch=$_SESSION['branch'];
?>

<html>
<head><title>Doubts</title>
<meta charset="utf-8">
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/dashstyle.css">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./css/styling.css">

<style>
    .modal-body{
        white-space: pre-wrap;
        word-wrap: break-word;
    }
  .modal{
  display:none;
}
.mod_total {
    bottom: 50px;
    position: relative;
    left: 280px;
    border: skyblue;
}

.pdf{

    position: relative;
    left: 600px;
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
<div class="tabular">
<div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>S.No</th>
                                    <th>Question Name</th>
                                    <th>Student Roll Number</th>
                                    <th>Student Name</th>
                                    <th>Doubt</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                    $reg="SELECT * FROM doubts INNER JOIN student_registration ON doubts.ROLL=student_registration.ROLL WHERE (doubts.Q_NAME IN ('" . implode("' OR '", $que) . "') ) AND (student_registration.BATCH='$batch' AND student_registration.BRANCH='$branch')";
                                    $result=mysqli_query($con,$reg);
                                    $num=mysqli_num_rows($result);
                                    $sno=1;
                                    if($num>=1)
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $qname=$row['Q_NAME'];
                                            $rollno=$row['ROLL'];
                                            $sname=$row['NAME'];
                                            $doubt=$row['DOUBT'];
                                            echo "<tr>";
                                            echo "<td>";
                                            echo  $sno;
                                            echo "</td>";
                                            echo "<td>";
                                            echo  $qname;
                                            echo "</td>";
                                            echo "<td>";
                                            echo  $rollno;
                                            echo "</td>";
                                            echo "<td>";
                                            echo  $sname;
                                            echo "</td>";
                                            echo "<td>";
                                            echo  $doubt;
                                            echo "</td>";
                                            echo "<td>";
                                            ?>
                                            <div class="container">
                                             <button type="button" class="openmodal myBtn" data-toggle="modal" data-target="#myModal">
                                        Answer Doubt
                                    </button>
                                               <div class="modal myModal">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                        
                                            
                                            <div class="modal-header">
                                            <h4 class="modal-title">
                                            <?php
                                                    echo $rollno;
                                            ?>
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            
                                            <div class="modal-body">
                                <h5 style="text-align:center;"><?php echo $doubt; ?></h5>
                                            <form action="answerdoubt.php" method="post" > 
                                            <input type="hidden" name="dt" value="<?php echo $doubt; ?>">
                    <h5>Enter comment to the question:</h5> 
                    <textarea  class="form-control" name="anstodoubt" id="anstodoubt" data-name="anstodoubt"></textarea><br><br>
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <input name="sb" type="submit" value="Submit" class="btn3" data-dismiss="modal" />
                    </form>
                                            </div>
                                            
                                            
                                            <div class="modal-footer">
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                            <?php
                                             echo "</td>";
                                echo "</tr>";
                                            $sno=$sno+1;
                                            
                                        }
                                    }
                                    else
                                    {
                                      echo "No doubts raised.";
                                    }
                                    
                                ?>
                             
                            </tbody>
                        </table>
</div>
</div>

</body>
<script>
  var modals = document.getElementsByClassName('modal');
// Get the button that opens the modal
var btns = document.getElementsByClassName("openmodal");
var spans=document.getElementsByClassName("close");
for(let i=0;i<btns.length;i++){
    btns[i].onclick = function() {
        modals[i].style.display = "block";
    }
}
for(let i=0;i<spans.length;i++){
    spans[i].onclick = function() {
        modals[i].style.display = "none";
    }
}

</script>
</html>

