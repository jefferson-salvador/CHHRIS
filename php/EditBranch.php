<?php
    require_once('conn.php');

    $branch_id = $_GET["id"];
    $branch_name= $_POST["branchname"];
    $branch_address = $_POST["address"];

    $manager_name = $_POST["manager"];
    $sql = "SELECT MANAGER_ID FROM chhris_managers WHERE Manager_Name = '$manager_name'";
    $result = $conn->query($sql);
    $assoc = $result->fetch_assoc();
    $manager_id = $assoc["MANAGER_ID"];

    $stmt = $conn->prepare("UPDATE chhris_division SET DIV_NAME=?, LOCATION=?, DIV_MANAGER=? WHERE DIV_ID = $branch_id");
    $stmt->bind_param("ssi", $branch_name, $branch_address, $manager_id);
    $stmt->execute();
    $stmt->close();
    header('location: ../branches-tab.php');
    die();
?>