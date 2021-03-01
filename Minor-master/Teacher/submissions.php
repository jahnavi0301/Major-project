<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
if($_SESSION['batch']=="")
{
    $batchselected=$_POST['batchselect'];
    $_SESSION['batch']=$batchselected;
}

function stringtoHTML($str)
{
    $r="<br>";
    for($i=0; $i<strlen($str); $i++) 
     {
        if($str[$i]=="<")
            $r=$r."&lt";
        else if($str[$i]==">")
            $r=$r."&gt";
        else
            $r= $r.$str[$i];
     }   
     $r=$r."<br>"; 
    return $r;
}
?>

<html>
<head><title>Submissions</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/dashstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Select Branch</title>
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
                    <h2 class="header-title pb-3 mt-0">SUBMISSIONS</h2>
                    
                    <form action="submissions.php" method="post">
                    <h5>Select Question:</h5>
                    <select name="question" class="form-control">
                        <?php
                        $lab_id = $_SESSION['lab'];
                        $s = "SELECT Q_ID,Q_NAME FROM questions_table where LAB_ID='$lab_id'";
                        $result = mysqli_query($con, $s);
                        $num = mysqli_num_rows($result);
                        
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "<option value='". $row['Q_ID'] ."'>" .$row['Q_NAME'] ."</option>" ;
                        }
                        ?>
                    </select>
                    
                    <button type="submit" name="submit" value="submit" class="button-2 w-button" >Go</button>

                    </form>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>S.No</th>
                                    <th>Roll Number</th>
                                    <th>Student Name</th>
                                    <th>Score</th>
                                    <th>Submission</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['submit'])) {
                                
                                if($_POST['question']) {
                                  $_SESSION['question']=$_POST['question'];
                                }
                            }
                            
                             $sno=1;
                             $question=$_SESSION['question'];
                             $branch=$_SESSION['branch'];
                             $batch=$_SESSION['batch'];     
                             $s2="SELECT Q_NAME FROM questions_table where Q_ID='$question'";
                             $k=mysqli_query($con,$s2);  
                             $row2 = mysqli_fetch_array($k);
                             $s="SELECT student_registration.ROLL,student_registration.NAME,qtos_map.SUBMISSION,qtos_map.SCORE FROM qtos_map INNER JOIN student_registration ON qtos_map.ROLL=student_registration.ROLL WHERE qtos_map.Q_ID='$question'&& student_registration.BRANCH='$branch'&& student_registration.BATCH='$batch'" ;
                             $result=mysqli_query($con,$s);
                             $num=mysqli_num_rows($result);                             
                             if($num>=1)
                             {
                              while($row = mysqli_fetch_array($result)){
                                $_SESSION['rollno']=$row['ROLL'];
                                $_SESSION['sname']=$row['NAME'];
                                $_SESSION['score']=$row['SCORE'];
                                $_SESSION['submit']=stringtoHTML($row['SUBMISSION']);
                                
                               echo "<tr>";
                                    echo "<td>";
                                    echo  $sno;
                                    echo "</td>";
                                    echo "<td>";
                                    echo  $_SESSION['rollno'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo  $_SESSION['sname'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo  $_SESSION['score'];
                                    echo "</td>";
                                    echo "<td>";

                                    ?>

                                    <div class="container">
                                    <button type="button" class="openmodal myBtn" data-toggle="modal" data-target="#myModal">
                                        View Submission
                                    </button>

                                    
                                    <div class="modal myModal">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                        
                                            
                                            <div class="modal-header">
                                            <h4 class="modal-title">
                                            <?php
                                                    echo $row2['Q_NAME']. "- ".$_SESSION['rollno'];
                                              ?>
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            
                                            <div class="modal-body">
                                            <?php
                                                    echo $_SESSION['submit'];
                                                    $c=$_SESSION['submit'];
                                            ?>
                                            </div>
                                            
                                            
                                            <div class="modal-footer">
                                                <?php
                                                if($_SESSION['score']==1000){
                                                 // echo "Evaluate: ";?>
                                                 <form method="post" action="evalmanual.php">
                                                     <label for="sc">Evaluate:</label><br>
                                                 <input type="text" id="sc" name="sc">
                                                 <input type="hidden" name="rno" value="<?php echo $_SESSION['rollno']; ?>">
                                                 <input type="submit" name="submit">
                                             </form>
                                             <?php } ?>
                                                 
                                             <!-- <a href="\evalmanual.php?file=<?php //echo $c; ?>"> Link </a> -->
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
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>