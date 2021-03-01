<?php
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
$email = $_SESSION['email'];
?>

<html>
<head>
<head>  
           <title>Add Schedule</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           
</head>
<body>
<?php
function fill_select_box($con){
     $output = '';
        $sql="SELECT LAB_ID FROM ttol_map where EMAIL='$email'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
            while ($row = mysqli_fetch_array($result))
            {
                $temp=$row['LAB_ID'];
                $_SESSION['Lab']=$temp;
                $smallq="SELECT LAB_NAME FROM lab WHERE LAB_ID='$temp'";
                $res=mysqli_query($con,$smallq);
                $rownew=mysqli_fetch_array($res);
                $output .= '<option value="'.$rownew["LAB_NAME"].'">'.$rownew["LAB_NAME"].'</option>';
            }
 return $output;
          }
                ?>
                
             <!--   <h1>Add schedule for: --><?php// echo  $rownew['LAB_NAME'];?><!--</h1>-->
                <div class="form-group">  
                <form  method="post" name="add_name" id="add_name" action="addschedule.php">
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                   <!-- <td>
                <input type="text" name="sroll[]" id="sroll[]" data-name="sroll[]" class="form-control item_name" placeholder="Starting roll number" required=""/>
                </td>
                <td>
                <input type="text" name="eroll[]" id="eroll[]" data-name="eroll[]" class="form-control item_name" placeholder="Ending roll number" required=""/>
                </td>
                <td>
                <select name="day" class="form-control" style="display:inline-block;">
                <option value=''>Select day</option> ;
                <option value='Monday'>Monday</option>;
                <option value='Tuesday'>Tuesday</option>;
                <option value='Wednesday'>Wednesday</option>" ;
                <option value='Thursday'>Thursday</option>" ;                
                <option value='Friday'>Friday</option>" ;
                </select>
                </td>
                <td>
                <select name="starttime" class="form-control" style="display:inline-block;">
                <option value=''>Select start time</option> ;
                <option value='9'>9</option>" ;
                <option value='10'>10</option>" ;
                <option value='11'>11</option>" ;
                <option value='12'>12</option>" ;
                <option value='1'>1</option>" ;
                <option value='2'>2</option>" ;
                <option value='3'>3</option>" ;
                <option value='4'>4</option>" ;
                </select>
                </td>
                <td>
                <select name="endtime" class="form-control" style="display:inline-block;">
                <option value=''>Select end time</option> ;
                <option value='10'>10</option>" ;
                <option value='11'>11</option>" ;
                <option value='12'>12</option>" ;
                <option value='1'>1</option>" ;
                <option value='2'>2</option>" ;
                <option value='3'>3</option>" ;
                <option value='4'>4</option>" ;
                <option value='5'>5</option>" ;
                </select>
                </td>-->
                <th>Select lab</th>
                <th>Enter Starting roll number</th>
       <th>Enter Last roll number</th>
       <th>Select day</th>
       <th>Select start time</th>
       <th>Select End time</th>
       <th><button type="button" name="add" id="add" class="btn btn-success">Add More</button></th>
                </tr>
                </table>        
                </div>
                <!--<button type="button" name="add" id="add" class="btn btn-success">Add More</button>-->
                
                </form>
                </div>
                <?php
            //}?>
            <button type="submit" class="btn2" form=add_name>Submit</button>
      
    
    </body>
    </html>
    <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           var html = '';
     html += '<tr id="row'+i+'">';
     html += '<td><select name="sellab[]" class="form-control" style="display:inline-block"><option value="">Select Lab</option>$output</select></td>';
     html += '<td><input type="text" name="sroll[]" class="form-control item_name" placeholder="Starting roll number" required=""/></td>';
     html += '<td><input type="text" name="eroll[]" class="form-control item_quantity" placeholder="Ending roll number" required=""/></td>';
     html += '<td><select name="day[]" class="form-control" style="display:inline-block"><option value="">Select day</option> <option value="Monday">Monday</option> <option value="Tuesday">Tuesday</option> <option value="Wednesday">Wednesday</option> <option value="Thursday">Thursday</option> <option value="Friday">Friday</option> </select></td>';
     html += '<td><select name="starttime[]" class="form-control" style="display:inline-block"> <option value="">Select start time</option><option value="9">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option> <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>';
     html += '<td><select name="endtime[]" class="form-control" style="display:inline-block"> <option value="">Select end time</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td>';     html += '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
     $('#dynamic_field').append(html);
      });  
      $(document).on('click', '.remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      /*$('#add_name').on('submit', function(event){
      //var form_data = $(this).serialize();
      //$('#submit').click(function(){            
           $.ajax({  
                url:"addschedule.php",  
                method:"POST",  
                //data:$('#add_name').serialize(),  
        //        data: form_data,
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  */
});
</script>
    <?php
      //  header('location:frontPage.php');
?>
