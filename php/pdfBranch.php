<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require "conn.php"; 

    $mpdf = new \Mpdf\Mpdf();
    $mode = $_GET["mode"];

    $BranchId = $_GET["branchId"]; 
    $result = mysqli_query($conn, "SELECT * FROM chhris_division WHERE DIV_ID = $BranchId"); 
    $row = mysqli_fetch_row($result); 
    $anoResult = mysqli_query($conn, "Select FNAME, MNAME, LNAME FROM chhris_employees where EMP_ID=$row[3]"); 
    $row1 = mysqli_fetch_row($anoResult); 


    $data= "Branch Data Sheet"."<br>"; 
    $data.= "<strong>Branch ID: </strong> ".$row[0]."<br>";
    $data .= "<strong>Branch Name: </strong> ".$row[1]."<br>";
    $data .= "<strong>Location: </strong>".$row[2]."<br>"; 
    $data .= "<strong>Branch Manager: </strong>" .$row1[0]. " " .$row1[1]. " ". $row1[2]. " ";
    

    $mpdf->WriteHTML($data);
    $mpdf->Output("document.pdf", $mode);


?>