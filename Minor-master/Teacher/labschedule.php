<?php
session_start();
if(!isset($_SESSION['email']))
{
        header("location: index.php");
}
$email=$_SESSION['email'];
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$email = $_SESSION['email'];
?>

<html>
<head>  
<head>
     <link rel="stylesheet" href="./css/dashboard.css"></link>
     <link rel="stylesheet" href="./css/dashstyle.css"></link>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Add Schedule</title>  
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
     <?php

     $output = '';
     $sql="SELECT LAB_ID FROM ttol_map where EMAIL='$email'";
     $result=mysqli_query($con,$sql);
     $num=mysqli_num_rows($result);
     while ($row = mysqli_fetch_array($result))
     {
          $temp=$row['LAB_ID'];
          $smallq="SELECT LAB_NAME FROM lab WHERE LAB_ID='$temp'";
          $res=mysqli_query($con,$smallq);
          $rownew=mysqli_fetch_array($res);
          $output .= '<option value="'.$temp.'">'.$rownew["LAB_NAME"].'</option>';
     }
     $_SESSION['labs']=$output;
     ?>
     <?php
     $output2 = '';
     $sql2="SELECT DISTINCT BATCH FROM batch";
     $result2=mysqli_query($con,$sql2);
     while ($row = mysqli_fetch_array($result2))
     {
          $temp=$row['BATCH'];
          $output2 .= '<option value="'.$temp.'">'.$temp.'</option>';
     }
     $_SESSION['batches']=$output2;

     ?>  
          <div>
               <p>
                    <br>
                    <h4>Please add schedule of all the labs you have selected.</h3><br>
                    <h6>Labs can be made operational only after addition of their corresponding schedule. However, you can add schedule of a lab after registration as well.</h5>
                    <br><br>
               </p>
          </div>
          <div class="form-group">  
          <form  method="post" name="add_name" id="add_name" action="addschedule.php">
          <div class="table-responsive">  
          <table class="table table-bordered" id="dynamic_field">  
               <tr>  
               <th>Select Lab</th>
               <th>Select Branch</th>
               <th>Select Batch</th>
               <th>Enter Starting roll number</th>
               <th>Enter Last roll number</th>
               <th>Select day</th>
               <th>Select Start Time</th>
               <th>Select End Time</th>
               <th><button type="button" name="add" id="add" class="btn btn-success">Add More</button></th>
               </tr>
          </table>        
          </div>
          </form>
          </div>
     <button type="submit" class="btn2" form=add_name>Submit</button>
      
    
    </body>
    </html>
    <script type="text/javascript">  
    var p = <?php echo json_encode($output) ?>;
    var q=<?php echo json_encode($output2) ?>;
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           var html = '';
           //var p= htmlentities($output);
           //var p= '';
     html += '<tr id="row'+i+'">';
     html += '<td><select name="sellab[]" class="form-control" style="display:inline-block"><?php echo $_SESSION['labs'] ?></select></td>';
     html += '<td><select name="branch[]" class="form-control" style="display:inline-block"><option value="CSE">CSE</option> <option value="IT">IT</option> <option value="ECE">ECE</option> <option value="MECH">MECH</option></select></td>';
     html += '<td><select name="batch[]" class="form-control" style="display:inline-block"><?php echo $_SESSION['batches'] ?></select></td>';    
     html += '<td><input type="text" name="sroll[]" class="form-control item_quantity" placeholder="Starting Roll Number" required=""/></td>';
     html += '<td><input type="text" name="eroll[]" class="form-control item_quantity" placeholder="Ending Roll Number" required=""/></td>';
     html += '<td><select name="day[]" class="form-control" style="display:inline-block"><option value="Monday">Monday</option> <option value="Tuesday">Tuesday</option> <option value="Wednesday">Wednesday</option> <option value="Thursday">Thursday</option> <option value="Friday">Friday</option> </select></td>';
     html += '<td><select name="starttime[]" class="form-control" style="display:inline-block"><option value="9">9 AM</option> <option value="10">10 AM</option> <option value="11">11 AM</option> <option value="12">12 PM</option> <option value="1">1 PM</option><option value="2">2 PM</option><option value="3">3 PM</option><option value="4">4 PM</option></select></td>';
     html += '<td><select name="endtime[]" class="form-control" style="display:inline-block"><option value="10">10 AM</option><option value="11">11 AM</option><option value="12">12 PM</option><option value="1">1 PM</option><option value="2">2 PM</option><option value="3">3 PM</option><option value="4">4 PM</option><option value="5">5 PM</option></select></td>';     html += '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
     $('#dynamic_field').append(html);
      });  
      $(document).on('click', '.remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 
});
</script>
    <?php
?>
