<?php
session_start();

$con=mysqli_connect('localhost','root','');
$con2=mysqli_connect('localhost','root','');
mysqli_select_db($con,'minorproject1');
mysqli_select_db($con2,'attendance1');
$lab_id=$_SESSION['lab'];
//$roll=$_SESSION['roll'];                          
$sno=1;
//$date=$_SESSION['date'];
$date=$_GET['file'];
//echo $date;
$branch=$_SESSION['branch'];
$batch=$_SESSION['batch'];
$query="SELECT DISTINCT ROLL  FROM `bcs-206` WHERE DATE= '$date' && BRANCH='$branch'&& BATCH='$batch' ORDER BY ROLL " ;
                                     
require('C:\xampp\htdocs\Minor\Student\fpdf.php');
	$pdf = new FPDF();
	$pdf->SetTitle('Download PDF');
	$pdf->SetFont('Arial','B',16);
//$pdf->SetTextColor(255,254,254);
// require('rotation.php');
$result= mysqli_query($con2, $query);
 $pdf->AddPage();
 $pdf->Write(4, $date);
$pdf->Write(4, "\n");
$pdf->Write(4, "\n");
$pdf->SetFont('Arial','B',12);

$width_cell=array(20,40,50,30);

$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'SNO.',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'ROLL NO',1,1,'C',true);
while($row = mysqli_fetch_array($result))
{
    $roll=$row['ROLL'];
    $query2="SELECT NAME FROM student_registration WHERE ROLL='$roll'" ;
    $res2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_array($res2);
    $name=$row2['NAME'];


    //Display $sno, $roll, $name in a tabular format
    // Third header column 
//$pdf->Cell($width_cell[3],10,'MARK',1,1,C,true); // Fourth header column
//// header is over ///////

$pdf->SetFont('Arial','',10);
// First row of data 
$pdf->Cell($width_cell[0],10,$sno,1,0,'C',false); // First c
$pdf->Cell($width_cell[1],10,$name,1,0,'C',false); // Second column of row 1 
$pdf->Cell($width_cell[2],10,$roll,1,1,'C',false);
	
 //   $pdf->Write(4,$score);
    
    $sno=$sno+1;
}


$pdf->Output();

?>