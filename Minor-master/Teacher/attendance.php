<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con2,'attendance1');
$branch='';
$batch='';

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
// $x=$lab_id."-old";
$x="bcs-206-old";
?>

<html>
<head><title>Attendance</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/dashstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
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
                    <h2 class="header-title pb-3 mt-0">ATTENDANCE</h2>
                    
                    <!-- <form action="attendance.php" method="post">
                    <h5>Select Branch:</h5>
                    <select name="branch" class="form-control"> -->
                        <?php
                        $email=$_SESSION['email'];
                        $lab_id = $_SESSION['lab'];
                        $s1 = "SELECT DISTINCT BRANCH FROM schedule where EMAIL='$email'&& LAB_ID='$lab_id'";
                        $result1 = mysqli_query($con2, $s1);
                        
                        // while ($row1 = mysqli_fetch_array($result1))
                        // {
                        //     // echo "<option value='". $row1['BRANCH'] ."'>" .$row1['BRANCH'] ."</option>" ;
                        // }
                        ?>
                    <!-- </select> -->

                    <!-- <h5>Select  Batch:</h5>
                    <select name="batch" class="form-control"> -->
                        <?php
                        $email=$_SESSION['email'];
                        $lab_id = $_SESSION['lab'];
                        $s2 = "SELECT DISTINCT BATCH FROM schedule where EMAIL='$email'&& LAB_ID='$lab_id'";
                        $result2 = mysqli_query($con2, $s2);
                        
                        // while ($row2 = mysqli_fetch_array($result2))
                        // {
                        //     // echo "<option value='". $row2['BATCH'] ."'>" .$row2['BATCH'] ."</option>" ;
                        // }
                        ?>
                    <!-- </select>
                    
                    <button type="submit" name="submit" value="submit" class="button-2 w-button" >Go</button>

                    </form> -->

                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['submit'])) {
                                
                                if($_POST['branch']) {
                                  $branch=$_POST['branch'];
                                }
                                if($_POST['batch']) {
                                    $batch=$_POST['batch'];
                                  }
                            }
                            
                             $sno=4;   
                             $x=$lab_id."-old";
                            //  $s="SELECT DISTINCT DATE FROM `$x` WHERE BRANCH='$branch'&& BATCH='$batch'" ;
                            //  $result=mysqli_query($con2,$s);                           
                            
                            $query = $con2->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'attendance1' AND TABLE_NAME = '$lab_id'");

                            while($row = $query->fetch_assoc()){
                                $result[] = $row;
                            }
                            $columnArr = array_column($result, 'COLUMN_NAME');
                            
                                while($sno<count($columnArr)){
                                // $date=$row['DATE'];
                                    echo "<tr>";
                                    echo "<td>";
                                    echo  $sno-3;
                                    echo "</td>";
                                    echo "<td>";
                                    // echo  $date;
                                    echo $columnArr[$sno];
                                    $_SESSION['date']=$columnArr[$sno];
                                    echo "</td>";
                                    echo "<td>";

                                    ?>

                                    <div class="container">
                                    <button type="button" class="openmodal myBtn" data-toggle="modal" data-target="#myModal">
                                        View Attendance
                                    </button>

                                    
                                    <div class="modal myModal">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                        
                                            
                                            <div class="modal-header">
                                            <h4 class="modal-title">
                                            <?php
                                                $q="SELECT STIME,ETIME,BATCH FROM schedule WHERE EMAIL='$email'&& LAB_ID='$lab_id'&& BRANCH='$branch'&& BATCH='$batch'" ;
                                               // $q="SELECT * FROM schedule WHERE EMAIL='$email'&& LAB_ID='$lab_id'&& BRANCH='$branch'&& BATCH='$batch'" ;
                                                $r=mysqli_query($con2,$q);
                                                $rows=mysqli_fetch_array($r);
                                                // $day=$rows['DAY'];
                                                // $q1="select DATE from `$lab_id` where  DAY='$day' && BRANCH='$branch'&& BATCH='$batch'" ;
                                                // $r1=mysqli_query($con2,$q1);
                                                // $_SESSION['date']=$r1['DATE'];

                                                $stime=$rows['STIME']<12?$rows['STIME']:$rows['STIME']-12;
                                                $apstime=$rows['STIME']<12?"AM":"PM";

                                                $etime=$rows['ETIME']<12?$rows['ETIME']:$rows['ETIME']-12;
                                                $apetime=$rows['ETIME']<12?"AM":"PM";

                                                echo "Timings: " .$stime. " ".$apstime. " to ". $etime." " .$apetime. " for batch: " .$row['BATCH'];
                                                
                                            ?>     
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                 <table class="table table-hover mb-0">
                                                     <thead>
                                                         <tr class="align-self-center">
                                                             <th>S.No</th>
                                                             <th>Roll Number</th>
                                                             <th>Name</th>
                                                             <th>Mark Present</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <?php     
                                                         $count=1;
                                                        //  $_SESSION['date']=$date;
                                                         $_SESSION['branch']=$branch;
                                                         $_SESSION['batch']=$batch;
                                                        //  echo $_SESSION['date'];
                                                        //  $_SESSION['dt']=$_SESSION['date'];
                                                        //  $query="SELECT DISTINCT ROLL FROM `$lab_id` WHERE DATE='$date' && BRANCH='$branch'&& BATCH='$batch'" ;
                                                        // $query="SELECT DISTINCT ROLL FROM `$x` WHERE DATE='$date' && BRANCH='$branch'&& BATCH='$batch'" ;
                                                        $query="SELECT ROLL,BATCH FROM `$lab_id` WHERE `$columnArr[$sno]`='1' ORDER BY ROLL";
                                                         $res=mysqli_query($con2,$query);
                                                        //  echo "<h1>" .mysqli_fetch_array($res)['BATCH']. "</h1>";
                                                        $row1 = mysqli_fetch_array($res);
                                                        echo "<h1>".$row1['BATCH']."</h1>";
                                                        
                                                        $roll=$row1['ROLL'];
                                                         // $_SESSION['batch']=mysqli_fetch_array($res)[1];
                                                         
                                                        //  echo "<form method=post id=final action=finalattendance.php?file=",$columnArr[$sno],">";
                                                         ?>
                                                         <form method="post" id="final" action="finalattendance.php?file=<?php echo urlencode($columnArr[$sno]);?>">
                                                         <?php
                                                            $query2="SELECT NAME FROM student_registration WHERE ROLL='$roll'" ;
                                                            $res2=mysqli_query($con,$query2);
                                                            $row2=mysqli_fetch_array($res2);
                                                                echo "<tr>";
                                                                echo "<td>";
                                                                echo  $count;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo  $roll;
                                                                echo "</td>";
                                                                echo "<td>";
                                                            $name=$row2['NAME'];
                                                                echo  $name;
                                                                echo "</td>";
                                                                $count=$count+1;
                                                                ?>
                                                                <td>
                                                                    
                                                                <!-- <input type="hidden" name="batch" value="<?php //echo mysqli_fetch_array($res)[1];?>" data-name="batch" form=final id="batch"/> -->
                                                            <input type="checkbox" name="present[]" data-name="present" id="present" value="<?php echo $roll;?>" form=final>
                                                            </td>
                                                            <?php
                                                         while($row = mysqli_fetch_array($res))
                                                         {
                                                             
                                                            $roll=$row['ROLL'];
                                                            
                                                            $query2="SELECT NAME FROM student_registration WHERE ROLL='$roll'" ;
                                                            $res2=mysqli_query($con,$query2);
                                                            $row2=mysqli_fetch_array($res2);
                                                            $name=$row2['NAME'];
                                                                echo "<tr>";
                                                                echo "<td>";
                                                                echo  $count;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo  $roll;
                                                                echo "</td>";
                                                                echo "<td>";
                                                                echo  $name;
                                                                echo "</td>";
                                                                
                                                                ?>
                                                                <td>
                                                                    
                                                                <!-- <input type="hidden" name="temp" value="<?php //echo $columnArr[$sno];?>" data-name="temp" form=final id="temp"/> -->
                                                            <input type="checkbox" name="present[]" data-name="present" id="present" value="<?php echo $roll;?>" form=final>
                                                            </td>
                                                                <?php
                                                                echo "</tr>";
                                                                $count=$count+1;
                                                         }
                            
                                                         ?>
                                                         </form>
                                                     </tbody>   
                                                 </table>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="modal-footer">
                                             
                                            <!-- <a href="try.php?file=try">Download PDF Now</a> -->
                                            <!-- <a href="try.php?file=".$date>Download PDF Now</a> -->
                                            <!-- <a href="#" onclick="document.getElementById('final').submit()">Submit</a> -->
                                            <input type="submit" form="final" >
                                            <?php
                                            // echo "<a href=try.php?file=",$data,">Submit Attendance for the date</a>";.urlencode($cat).
                                            echo "<br>";
                                            // echo "<a onclick=document.getElementById('final').submit() href=finalattendance.php?file=",urlencode($columnArr[$sno]),"&present=",urlencode(present[]),">For date: .$columnArr[$sno].</a>";
                                            ?>
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
                              echo "<a href=overall_att.php>Overall Attendance</a>";
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