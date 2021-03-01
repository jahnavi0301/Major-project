<?php
session_start();
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $db = "attendance1";
      
     $conn = new mysqli($dbhost,$dbuser,$dbpass,$db);
             
              if(!$conn)
            {
                die("Connection failed: ".  mysqli_connect_error());
            }
       
       

if (isset($_POST["export_bcs"])) {
    
     $sql = 'SELECT * FROM `bcs-206` WHERE BATCH=`B1` ORDER BY ROLL';
     $productResult = mysqli_query($conn,$sql);
    $filename = "BSC_Attendance.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();
}

?>