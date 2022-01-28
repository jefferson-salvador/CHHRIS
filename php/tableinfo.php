<?php
    require_once('conn.php');
    $table =""; 
    if($_GET["cat"]=="A"){
        $table = "division"; 
    }
    else if($_GET["cat"]=="B"){
        $table = "department";
    }
    else if($_GET["cat"]=="C"){
        $table = "users";
    }

    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    $total = $result->num_rows;

    $limit = $_GET["limit"]; 
    $curPage = $_GET["page"];
    $start =  ((($curPage-1) *$limit )+ 1 > $total) ? $total: (($curPage-1) *$limit )+ 1;
    $end = (($start-1)+$limit >= $total) ? $total : $start+$limit-1;
    echo "<p>Showing $start to $end of $total entries</p>";
    //echo " start limit total_entries" 

?>