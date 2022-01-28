<?php
    session_start();
    require "conn.php";
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    echo $username;

    $emailcheck = $conn->query("SELECT * FROM users where USERNAME='$username'");

    if(mysqli_num_rows($emailcheck)>0){
        $row = $emailcheck->fetch_assoc();
        $saved_pass = $row["PASSWORD"]; 

        if(strcmp($saved_pass, $password) == 0){
            $_SESSION["username"] = $row["ACC_NAME"];
            $_SESSION["id"] = $row["EMP_ID"];
            header("location: ../employee-tab.php");
        }
        else{
            $_SESSION["login_error"] = "INCORRECT PASSWORD!"; 
            header("location: ../index.php");
        }
    }
    else{
        $_SESSION["login_error"] = "INCORRECT USERNAME";
        header("location: ../index.php");
    }


?>