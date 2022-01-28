<?php
    $username = "root";
    $server = "localhost";
    $db = "HRDB";
    $password = ""; 

    $conn = new mysqli($server , $username, $password, $db); 

    if($conn->connect_error){
        die("Database connection error: ". $conn->connect_error);
    }

?>