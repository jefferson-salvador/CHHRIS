<?php
    require_once('conn.php');

    $limit = intval($_GET["limit"]);
    $str = $_GET["toSearch"];

    $sql = "SELECT USER_ID, ACC_NAME, USERNAME, ROLE FROM chhris_users WHERE ACC_NAME LIKE '%$str%' LIMIT $limit";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>$row[USER_ID]</td>
                    <td>$row[ACC_NAME]</td>
                    <td>$row[USERNAME]</td>
                    <td>$row[ROLE]</td>
                    <td>
                        <div class='emp-tab-buttons text-center'>
                            <button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px;color:white'>info</i> view</button>
                            <button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px'>edit</i> edit</button>
                            <button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px;color:white'>delete</i> delete</button>
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