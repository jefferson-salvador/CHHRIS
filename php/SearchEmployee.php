<?php
    require_once('conn.php');

    $limit = intval($_GET["limit"]);
    $str = $_GET["toSearch"];

    $sql = "SELECT * FROM chhris_employees WHERE CONCAT(FNAME,' ', MNAME,' ', LNAME) LIKE '%$str%' LIMIT $limit";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>$row[EMP_ID]</td>
                    <td>$row[FNAME] $row[MNAME] $row[LNAME]</td>
                    <td>020202</td>
                    <td>$row[MANAGER_ID]</td>
                    <td>$row[DEPT_ID]</td>
                    <td>$row[WORK_STATUS]</td>
                    <td>
                        <div class='emp-tab-buttons text-center'>
                            <button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px;color:white'>info</i> view</button>
                            <a href='update-employee.php?id=$row[EMP_ID]'><button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px'>edit</i> edit</button></a>
                            <button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px'>print</i> print</button>
                        </div>
                    </td>
                </tr>";
        }
    }
    else
    {
        echo "<h6>No Results Found</h6>";
    }
?>