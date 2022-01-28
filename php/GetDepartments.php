<?php
     require "conn.php";
     
     $limit = 5; 
     if(isset($_GET["limit"])){
         $limit= $_GET["limit"];
     }
     
     $page = 1; 
     if(isset($_GET["page"])){
         $page = $_GET["page"];
     }

     $search = "where 1";
     if(isset($_GET["search"])){
         $term = "'".$_GET["search"]."%'"; 
         $search = "where DEPT_NAME LIKE $term";
     }

     $rowstart = ($page-1) *$limit;
     $data = $conn->query("SELECT * FROM department $search LIMIT $rowstart, $limit"); 
     if(mysqli_num_rows($data)>0){
         while($row = mysqli_fetch_assoc($data)){
             echo '
             <tr>
                 <td>'.htmlspecialchars($row["DEPT_ID"], ENT_QUOTES, 'UTF-8').'</td>
                 <td>'.htmlspecialchars($row["DEPT_NAME"], ENT_QUOTES, 'UTF-8').'</td>
                 <td>'.htmlspecialchars($row["DEPT_HEAD"], ENT_QUOTES, 'UTF-8').'</td>
                 <td>
                     <div class="emp-tab-buttons text-center">
                         <a href="update-dept.php?id='.$row['DEPT_ID'].'"><button class="btn btn-primary text-light"> <i class="material-icons" style="font-size:16px">edit</i> edit </button></a>
                         <button class="btn btn-primary text-light" onclick="deletehandler('.$row["DEPT_ID"].')" > <i class="material-icons" style="font-size:16px;color:white">delete</i> delete</button>
                     </div>
                 </td>
              </tr>';
         }
     }

?>