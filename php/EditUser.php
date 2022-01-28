<?php
    require_once('conn.php');

    $account_id = $_GET["id"];
    $account_name = $_POST["accname"];
    $username = $_POST["username"];
    $role = $_POST["role"];

    $stmt = $conn->prepare("UPDATE users SET ACC_NAME=?, USERNAME=?, ROLE=? WHERE USER_ID = $account_id");
    $stmt->bind_param("sss", $account_name, $username, $role);
    $stmt->execute();
    $stmt->close();
    header('location: ../users_tab.php');
    die();
?>