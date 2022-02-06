<?php
    require_once('conn.php');
    $page = 1; 
    if(isset($_GET["page"])){
         $page = $_GET["page"];
     }

     $search = "where 1";
    if(isset($_GET["search"])){
         $term = "'".$_GET["search"]."%'"; 
         $search = "where ACC_NAME LIKE $term";
     }
     $limit = 5; 
    if(isset($_GET["limit"])){
         $limit= $_GET["limit"];
     }
    $rowstart = ($page-1) *$limit;
    if($limit > 0)
    {
        $sql = "SELECT * FROM chhris_users $search LIMIT $rowstart, $limit";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            //echo "yesss";
            while($row = $result->fetch_assoc())
            {
                echo " <tr>
                        <td>".htmlspecialchars($row['USER_ID'], ENT_QUOTES, 'UTF-8')."</td>
                        <td>".htmlspecialchars($row['ACC_NAME'], ENT_QUOTES, 'UTF-8')."</td>
                        <td>".htmlspecialchars($row['USERNAME'], ENT_QUOTES, 'UTF-8')."</td>
                        <td>".htmlspecialchars($row['ROLE'], ENT_QUOTES, 'UTF-8')."</td>
                        <td>
                            <div class='emp-tab-buttons text-center'>
                                <a href= 'php/pdf.php?empId=$row[EMP_ID]&mode=I' target='_blank'><button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px;color:white'>info</i> view</button></a>
                                <a href='update-users.php?id=$row[USER_ID]'><button class='btn btn-primary text-light'> <i class='material-icons' style='font-size:16px'>edit</i> edit</button></a>
                                <button class='btn btn-primary text-light'  onclick='deletehandler(".$row['USER_ID'].")'> <i class='material-icons' style='font-size:16px;color:white'>delete</i> delete</button>
                            </div>
                        </td>
                    </tr>";
            }
        }
    }
    else
    {
        echo "<h6>Entries limit cannot be less than 1</h6>";
    }
?>