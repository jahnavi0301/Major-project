<?php

session_start();

$con=mysqli_connect('localhost','root','');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
mysqli_select_db($con2,'attendance1');

$branch=$_SESSION['branch'];
$batch=$_SESSION['batch'];
?>

                   <form action="tt.php" method="post">
                    <h5>Select Branch:</h5>
                    <select name="branch" class="form-control">
                        <?php
                        $email=$_SESSION['email'];
                        $lab_id = $_SESSION['lab'];
                        $s1 = "SELECT DISTINCT BRANCH FROM schedule where EMAIL='$email'&& LAB_ID='$lab_id'";
                        $result1 = mysqli_query($con2, $s1);
                        
                        while ($row1 = mysqli_fetch_array($result1))
                        {
                            echo "<option value='". $row1['BRANCH'] ."'>" .$row1['BRANCH'] ."</option>" ;
                        }
                        ?>
                    </select>

                    <h5>Select Batch:</h5>
                    <select name="batch" class="form-control">
                        <?php
                        $email=$_SESSION['email'];
                        $lab_id = $_SESSION['lab'];
                        $s2 = "SELECT DISTINCT BATCH FROM schedule where EMAIL='$email'&& LAB_ID='$lab_id'";
                        $result2 = mysqli_query($con2, $s2);
                        
                        while ($row2 = mysqli_fetch_array($result2))
                        {
                            echo "<option value='". $row2['BATCH'] ."'>" .$row2['BATCH'] ."</option>" ;
                        }
                        ?>
                    </select>
                    
                    <button type="submit" name="submit" value="submit" class="button-2 w-button" >Go</button>

                    </form>
