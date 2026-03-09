<?php

/*
    This function returns the count of records 
*/
function count_records() {
    global $connection;
    $sql = "SELECT count(*) from happiness_index";
    $result = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_row($result);

    // could do $count = $fetch[0]; return $count;
    return $fetch[0];
}


function find_records($per_page = 12, $offset = 0) {
    global $connection;
    $sql = "SELECT `rank`, country FROM happiness_index LIMIT ?";

    if ($offset > 0) {
        $sql .= " OFFSET ?";

        $statement = $connection->prepare($sql);
        $statement->bind_param("ii", $per_page, $offset);
    } else {
        $statement = $connection->prepare($sql);
        $statement->bind_param("i", $per_page);
    }

    $statement->execute();
    return $statement->get_result();
}
?>