<?php

$rank = isset($_GET['rank']) ? urldecode($_GET['rank']) : "";

$country = isset($_GET['country']) ? urldecode($_GET['country']) : "";

$title = "Country Statistics of $country";

include 'includes/header.php';

if ($rank == "" || $country == "") {
    echo "<h2>Oh no!</h2>";
    echo "<p>Unable to find that listing</p>";
} else {
    $sql = "SELECT * FROM happiness_index WHERE `rank` = ?";

    if ($statement = $connection->prepare($sql)) {
        $statement->bind_param("i", $rank);

        $statement->execute();

        $result = $statement->get_result();

        if ($row = $result->fetch_assoc()) {
            echo "<h2>". $row['country'] . " Statistics</h2>";
            include 'includes/country-card.php';
        } else {
            echo "<p>No data found</p>";
        }
        $statement->close();
    }
}
include 'includes/footer.php';
?>