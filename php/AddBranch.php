<?php
    require_once('conn.php');

    $branch_name = $_POST["branchname"];
    $branch_address = $_POST["address"];

    $manager_name = $_POST["manager"];
    $sql = "SELECT MANAGER_ID FROM managers WHERE Manager_Name = '$manager_name'";
    $result = $conn->query($sql);
    $assoc = $result->fetch_assoc();
    $manager_id = $assoc["MANAGER_ID"];

    $stmt = $conn->prepare("INSERT INTO division (DIV_NAME, LOCATION, DIV_MANAGER) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $branch_name, $branch_address, $manager_id);
    $stmt->execute();
    $stmt->close();
    header('location: ../branches-tab.php');
    die();
?>