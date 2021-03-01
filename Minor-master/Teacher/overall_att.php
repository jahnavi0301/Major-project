<?php
include 'excelSheetServer.php';

      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $db = "attendance1";

     $conn = new mysqli($dbhost,$dbuser,$dbpass,$db);

              if(!$conn)
            {
                die("Connection failed: ".  mysqli_connect_error());
            }
             $selectSQL = 'SELECT * FROM `bcs-206`';
 # Execute the SELECT Query

  if( !( $selectRes = mysqli_query( $conn,$selectSQL ) ) ){
    echo 'Retrieval of data from Database Failed - #';
  }else{?>
  	<!DOCTYPE html>
  	<html>
  	<head>
  		<title>BCS-206</title>
  	</head>
  	<body>
  		<div class="btn">
             <form action="excelSheetServer.php" method="post">
	            <button type="submit" id="btnExport" name='export_bcs'
	                value="Export to Excel" class="btn btn-info">Export to
	                excel</button>
        	</form>
    	</div>
  	</body>
  	</html>
  <?php
  }

?>

	

<!-- <?php
// session_start();
// if(!isset($_SESSION['email']))
// {
//         header("location: index.php");
// }
// $email=$_SESSION['email'];
// $con=mysqli_connect('localhost','root','');
// mysqli_select_db($con,'minorproject1');
// $con2=mysqli_connect('localhost','root','');
// mysqli_select_db($con2,'attendance1');
// $branch='';
// $batch='';

// function stringtoHTML($str)
// {
//     $r="<br>";
//     for($i=0; $i<strlen($str); $i++) 
//      {
//         if($str[$i]=="<")
//             $r=$r."&lt";
//         else if($str[$i]==">")
//             $r=$r."&gt";
//         else
//             $r= $r.$str[$i];
//      }   
//      $r=$r."<br>"; 
//     return $r;
// }
// // $x=$lab_id."-old";
// $x="bcs-206-old";
?>

<html>
<head><title>Overall Attendance</title>
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
  <li style="float:right"><a href="#about">Welcome <?php// echo $_SESSION['name'];?></a></li>

</ul>

        <div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="header-title pb-3 mt-0">OVERALL ATTENDANCE</h2>
                    
                    <form action="overall_att.php" method="post">
                    <h5>Select Branch:</h5>
                    <select name="branch" class="form-control">
                        <?php
                        // $email=$_SESSION['email'];
                        // $lab_id = $_SESSION['lab'];
                        // $s1 = "SELECT DISTINCT BRANCH FROM schedule where EMAIL='$email'&& LAB_ID='$lab_id'";
                        // $result1 = mysqli_query($con2, $s1);
                        
                        // while ($row1 = mysqli_fetch_array($result1))
                        // {
                        //     echo "<option value='". $row1['BRANCH'] ."'>" .$row1['BRANCH'] ."</option>" ;
                        // }
                        ?>
                    </select>

                    <h5>Select Batch:</h5>
                    <select name="batch" class="form-control">
                        <?php
                        // $email=$_SESSION['email'];
                        // $lab_id = $_SESSION['lab'];
                        // $s2 = "SELECT DISTINCT BATCH FROM schedule where EMAIL='$email'&& LAB_ID='$lab_id'";
                        // $result2 = mysqli_query($con2, $s2);
                        
                        // while ($row2 = mysqli_fetch_array($result2))
                        // {
                        //     echo "<option value='". $row2['BATCH'] ."'>" .$row2['BATCH'] ."</option>" ;
                        // }
                        ?>
                    </select>
                    
                    <button type="submit" name="submit" value="submit" class="button-2 w-button" >Go</button>

                    </form>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr class="align-self-center">
                                <?php
                                // $query = $con2->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'attendance' AND TABLE_NAME = '$lab_id'");
                                //     $sno=0;
                                // while($row = $query->fetch_assoc()){
                                //     $result[] = $row;
                                // }

                                // // Array of all column names
                                // $columnArr = array_column($result, 'COLUMN_NAME');

                                // //   while($row = mysqli_fetch_array($result)){
                                //     while($sno<count($columnArr)){
                                        ?>
                                    <th><?php// echo $columnArr[$sno]; $sno=$sno+1;}?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // if(isset($_POST['submit'])) {
                                
                            //     if($_POST['branch']) {
                            //       $branch=$_POST['branch'];
                            //     }
                            //     if($_POST['batch']) {
                            //         $batch=$_POST['batch'];
                            //       }
                            // }
                            
                            //  $sno=0;   
                            //  $x=$lab_id."-old";
                            // //  $s="SELECT DISTINCT DATE FROM `$x` WHERE BRANCH='$branch'&& BATCH='$batch'" ;
                            // //  $result=mysqli_query($con2,$s);                           
                            
                            // $query = $con2->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'attendance' AND TABLE_NAME = '$lab_id'");

                            // while($row = $query->fetch_assoc()){
                            //     $result[] = $row;
                            // }
                            
                            // // Array of all column names
                            // $columnArr = array_column($result, 'COLUMN_NAME');
                            
                            // //   while($row = mysqli_fetch_array($result)){
                            //     while($sno<count($columnArr)){
                            // //     // $date=$row['DATE'];
                            // echo " <tr class=align-self-center>";
                            //      $q1="SELECT * FROM `$lab_id` WHERE BATCH='$batch'&& BRANCH='$branch'";
                            //      $res1=mysqli_query($con2,$q1);
                            //      while($row=mysqli_fetch_array($res1)){
                            //         echo "<td>";
                            //         // echo  $date;
                            //          echo $row[$columnArr[$sno]];
                            //         echo "</td>";
                            //         // echo "<td>";
                            //      }
                            //      echo "</tr>";
                            //      $sno=$sno+1;
                            //     }
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

</html> -->