<?php
    require_once('conn.php');

    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);
    $total_entries = $result->num_rows;

    $limit = intval($_GET["limit"]);
    $curr_page = intval($_GET["page"]);
    $total_pages = ceil($total_entries / $limit);
    $start = ($curr_page - 1) * $limit;
    $end = ($curr_page == $total_pages) ? $total_entries : $start + $limit;
    $start++;

    echo "<p>Showing $start to $end of $total_entries entries</p>";
?>