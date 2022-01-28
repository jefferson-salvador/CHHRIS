<?php
     require "conn.php"; 
     $limit=5;
     if(isset($_GET["limit"])){
        $limit = $_GET["limit"];
    }
    $table="";
    if($_GET["cat"]=="A"){
        $table = "division"; 
        $function = "showBranch(";
    }
    else if($_GET["cat"]=="B"){
        $table = "department"; 
        $function = "showDepartment(";
    }
    else if($_GET["cat"]=="C"){
        $table = "users";
        $function = "showUsers(";
    }
    
    $result_db = mysqli_query($conn,"SELECT COUNT(*) FROM $table"); 
    $row_db = mysqli_fetch_row($result_db);  
    $total_records = $row_db[0]; 

    $curpage = $_GET["curpage"];
    $total_pages = ceil($total_records / $limit); 
    $pagLink = "<ul class='pagination justify-content-end' style='margin:20px 0'>
    <li class='paginate_button page-item previous' id='example_previous'>
        <a href='#'aria-controls='example' data-dt-idx='0' tabindex='0' class='page-link' onclick='previoushandler()'>Previous</a>
    </li>"; 
    for ($i=1; $i<=$total_pages; $i++) {
        $functiontouse =$function.$i.")";
        if($i==$curpage){ 
            $pagLink .= "<li class='paginate_button page-item active'><a class='page-link' onclick='$functiontouse'>".$i."</a></li>";
        }
        else{
            $pagLink .= "<li class='paginate_button page-item'><a class='page-link' onclick='$functiontouse'>".$i."</a></li>";
        }	
    }
    echo $pagLink . " <li class='paginate_button page-item next' id='example_next'>
                         <a href='#' aria-controls='example' data-dt-idx='7' tabindex='0' class='page-link' onclick='nexthandler()'>Next</a>
                        </li>
                    </ul>";
?>