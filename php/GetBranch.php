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
         $search = "where DIV_NAME LIKE $term";
     }

     $rowstart = ($page-1) *$limit;
     $data = $conn->query("SELECT * FROM chhris_division $search LIMIT $rowstart, $limit"); 
     if(mysqli_num_rows($data)>0){
         while($row = mysqli_fetch_assoc($data)){
            $managerid = $row['DIV_MANAGER'];
            $managername = mysqli_fetch_assoc($conn->query("SELECT Manager_Name FROM chhris_managers where MANAGER_ID='$managerid' "));
            
             echo '
             <tr>
                 <td>'.htmlspecialchars($row['DIV_ID'], ENT_QUOTES, 'UTF-8').'</td>
                 <td>'.htmlspecialchars($row['DIV_NAME'], ENT_QUOTES, 'UTF-8').'</td>
                 <td>'.htmlspecialchars($row['LOCATION'], ENT_QUOTES, 'UTF-8').'</td>
                 <td>'.htmlspecialchars($managername['Manager_Name'], ENT_QUOTES, 'UTF-8').'</td>
                 <td>
                     <div class="emp-tab-buttons text-center">
                        <a href="php/pdfBranch.php?branchId='.$row['DIV_ID'].'&mode=I" target="_blank"> <button class="btn btn-primary text-light"> <i class="material-icons" style="font-size:16px;color:white">info</i> view</button></a>
                         <a href="update-branch.php?id='.$row['DIV_ID'].'"><button class="btn btn-primary text-light"> <i class="material-icons" style="font-size:16px">edit</i> edit </button></a>
                        <a href="php/pdfBranch.php?branchId='.$row['DIV_ID'].'&mode=D" > <button class="btn btn-primary text-light"> <i class="material-icons" style="font-size:16px">print</i> print</button></a>
                     </div>
                 </td>
             </tr>';
         }
     }

?>