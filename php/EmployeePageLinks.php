<?php
    require_once('conn.php');

    $limit = intval($_GET["limit"]);
    $curr_page = intval($_GET["page"]);

    $sql = "SELECT * FROM chhris_employees";
    $result = $conn->query($sql);
    $num_entries = $result->num_rows;

    echo "<li class='paginate_button page-item previous' id='example_previous'>
            <a href='#' onclick='prev()'aria-controls='example' data-dt-idx='0' tabindex='0' class='page-link'>Previous</a>
        </li>";

    if($limit >= 1)
    {
        $num_pages = ceil($num_entries / $limit);

        for($i = 1; $i <= $num_pages; $i++)
        {
            if($i == $curr_page)
            {
                //active link
                echo "<li class='paginate_button page-item'>
                        <a href='#' id='$i' onclick=\"loadPage(this.innerHTML)\" aria-controls='example' data-dt-idx='1' tabindex='0' class='page-link active'>$i</a>
                    </li>";
            }
            else
            {
                //inactive link
                echo "<li class='paginate_button page-item'>
                        <a href='#' id='$i' onclick=\"loadPage(this.innerHTML)\" aria-controls='example' data-dt-idx='1' tabindex='0' class='page-link'>$i</a>
                    </li>";
            }
        }
    }

    echo "<li class=paginate_button page-item next' id='example_next'>
            <a href='#' onclick='next()' aria-controls='example' data-dt-idx='7' tabindex='0' class='page-link'>Next</a>
        </li>";
?>