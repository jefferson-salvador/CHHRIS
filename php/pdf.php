<?php
require_once __DIR__ . '/vendor/autoload.php';
require "conn.php"; 

$empId = $_GET["empId"];
$mode = $_GET["mode"];
$mpdf = new \Mpdf\Mpdf();

$result_db = mysqli_query($conn,"SELECT * FROM chhris_employees where EMP_ID = $empId");
$row_db = mysqli_fetch_row($result_db); 
$result_db1 = mysqli_query($conn,"SELECT DEPT_NAME FROM chhris_department where DEPT_ID = $row_db[11]");
$row_db1 = mysqli_fetch_row($result_db1); 
$result_db2 = mysqli_query($conn,"SELECT DIV_NAME FROM chhris_division where DIV_ID = $row_db[12]");
$row_db2 = mysqli_fetch_row($result_db2); 
$result_db3 = mysqli_query($conn,"SELECT FNAME, MNAME, LNAME FROM chhris_employees where EMP_ID = $row_db[15]");
$row1 = mysqli_fetch_row($result_db3); 


$data="Employee Data Sheet"."<br>";
$data .= "<strong>Employee ID: </strong>". $row_db[0]. "<br>";
$data .= "<strong>First Name: </strong>". $row_db[1]. "<br>";
$data .= "<strong>Middle Name: </strong>". $row_db[2]. "<br>";
$data .= "<strong>Last Name: </strong>". $row_db[3]. "<br>";
$data .= "<strong>Address: </strong>". $row_db[4]. "<br>";
$data .= "<strong>Sex: </strong>". $row_db[5]. "<br>";
$data .= "<strong>Date of Birth: </strong>". $row_db[6]. "<br>";
$data .= "<strong>Place of Birth: </strong>". $row_db[7]. "<br>";
$data .= "<strong>Contact Number: </strong>". $row_db[8]. "<br>";
$data .= "<strong>Civil Status: </strong>". $row_db[9]. "<br>";
$data .= "<strong>Position: </strong>". $row_db[10]. "<br>";
$data .= "<strong>Department Name: </strong>".$row_db1[0]."<br>";
$data .= "<strong>Branch Name: </strong>". $row_db2[0]. "<br>";
$data .= "<strong>Work Status: </strong>". $row_db[13]. "<br>";
$data .= "<strong>Hired Date: </strong>". $row_db[14]. "<br>";
$data .= "<strong>Manager Name: </strong>".$row1[0]. " " .$row1[1]. " ". $row1[2]. "<br>";
$data .= "<strong>Salary: </strong>". $row_db[16]. "<br>";
$data .= "<strong>Commission: </strong>". $row_db[17]. "<br>";

$mpdf->WriteHTML($data); 
$mpdf->Output("document.pdf",$mode);
?>