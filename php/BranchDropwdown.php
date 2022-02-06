<?php
    require_once('conn.php');

    $sql = "SELECT * FROM chhris_division";
    $result = $conn->query($sql);

    if($result->num_rows> 0)
    {
        while($row = $result->fetch_assoc())
        {
            if(isset($data["DIV_ID"]))
            {
                $selected = ($data["DIV_ID"] == $row["DIV_ID"]) ? 'selected' : null;
            }
            echo "<option $selected>$row[DIV_NAME]</option>";
        }
    }
?>