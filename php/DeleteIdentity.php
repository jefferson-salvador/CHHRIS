<?php
    require "conn.php"; 

    $ID = $_GET["Id"]; 
    $table=""; 
    $criteria="";
    
    if($_GET["cat"]=="A"){
        $table = "chhris_department";
        $criteria = "DEPT_ID=".(int)$ID;
    }
    else{
        $table = "chhris_users"; 
        $criteria = "USER_ID=".(int)$ID;
    }

    $sql = "DELETE FROM $table where $criteria"; 
    
    if(mysqli_query($conn, $sql)){
        echo "Records was deleted  👎";
    }
    else{
        echo "There was an error 🤕"; 
    }


  
?>