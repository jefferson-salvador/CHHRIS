<?php
    require_once('conn.php');

    $sql = "SELECT * FROM chhris_department";
    $result = $conn->query($sql);

    if($result->num_rows> 0)
    {
        while($row = $result->fetch_assoc())
        {
            if(isset($data["DEPT_ID"]))
            {
                $selected = ($data["DEPT_ID"] == $row["DEPT_ID"]) ? 'selected' : null;
            }
            echo "<option $selected>$row[DESCRIPTION]</option>";
        }
    }
?>