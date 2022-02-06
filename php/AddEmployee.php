<?php
    require_once('conn.php');

    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $middle_name = $_POST["mname"];
    $fullname = $first_name.' '.$middle_name.' '.$last_name;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $sex = $_POST["sex"];
    $date_of_birth = $_POST["dob"];
    $place_of_birth = $_POST["pob"];
    $contact_number = $_POST["contact"];
    $civil_status = $_POST["civilstatus"];
    $position = $_POST["position"];
    $work_status = $_POST["workstatus"];
    $hired_date = $_POST["hireddate"];
    $salary = intval($_POST["salary"]);
    $commission = intval($_POST["commission"]);
    $last_id;

    $department_name = $_POST["department"];
    $sql = "SELECT DEPT_ID FROM chhris_department WHERE DESCRIPTION = '$department_name'";
    $result = $conn->query($sql);
    $assoc = $result->fetch_assoc();
    $department_id = $assoc["DEPT_ID"];

    
    $branch_name = $_POST["branch"];
    $sql = "SELECT DIV_ID FROM chhris_division WHERE DIV_NAME = '$branch_name'";
    $result = $conn->query($sql);
    $assoc = $result->fetch_assoc();
    $branch_id = $assoc["DIV_ID"];


    $manager_name = $_POST["manager"];
    $sql = "SELECT MANAGER_ID FROM chhris_managers WHERE Manager_Name = '$manager_name'";
    $result = $conn->query($sql);
    $assoc = $result->fetch_assoc();
    $manager_id = $assoc["MANAGER_ID"];


    $stmt = $conn->prepare("INSERT INTO chhris_employees (FNAME, MNAME, LNAME, ADDRESS, SEX, DOB, PLACE_OF_BIRTH, CONTACT_NUM, CIVIL_STATUS, POSITION, DEPT_ID, DIV_ID, WORK_STATUS, HIRED_DATE, MANAGER_ID, SALARY, COMMISSION) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssiissiii", $first_name, $middle_name, $last_name, $address, $sex, $date_of_birth, $place_of_birth, $contact_number, $civil_status, $position, $department_id, $branch_id, $work_status, $hired_date, $manager_id, $salary, $commission);
    $stmt->execute();
    $last_id = $stmt->insert_id;
    $stmt->close();

    if(strtoupper($position) == "MANAGER")
    {
        $stmt = $conn->prepare("INSERT INTO chhris_managers (MANAGER_ID, Manager_Name) VALUES (?, ?)");
        $stmt->bind_param("is", $last_id, $fullname);
        $stmt->execute();
        $stmt->close();
        header('location: ../employee-tab.php');
        die();
    }
    else if(strtoupper($position) == "HR" || strtoupper($position) == "HUMAN RESOURCE")
    {
        $stmt = $conn->prepare("INSERT INTO chhris_users (ACC_NAME, USERNAME, PASSWORD, ROLE, EMP_ID) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $fullname, $username, $password, $position, $last_id);
        $stmt->execute();
        $stmt->close();
        header('location: ../employee-tab.php');
        die();
    }
    else
    {
        header('location: ../employee-tab.php');
        die();
    }
?>