<?php
    require_once('conn.php');

    $dept_id = $_GET["id"];
    $dept_name = $_POST["deptname"];
    $dept_desc = $_POST["desc"];
    $dept_head = $_POST["depthead"];

    $stmt = $conn->prepare("UPDATE department SET DEPT_NAME=?, DESCRIPTION=?, DEPT_HEAD=? WHERE DEPT_ID = $dept_id");
    $stmt->bind_param("sss", $dept_name, $dept_desc, $dept_head);
    $stmt->execute();
    $stmt->close();
    header('location: ../department-tab.php');
    die();
?>