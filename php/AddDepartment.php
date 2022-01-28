<?php
    require_once('conn.php');

    $department_name = $_POST["departmentname"];
    $department_desc = $_POST["description"];
    $department_head = $_POST["departmenthead"];

    $stmt = $conn->prepare("INSERT INTO department (DEPT_NAME, DESCRIPTION, DEPT_HEAD) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $department_name, $department_desc, $department_head);
    $stmt->execute();
    $stmt->close();
    header('location: ../department-tab.php');
    die();
?>