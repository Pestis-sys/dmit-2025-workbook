<?php 
$title = "Search";
include 'includes/header.php'; 
include 'includes/continents.php';

$selected_continents = isset($_GET['continents']) ? $_GET['continents'] : array();



?>



<h2>Browse our Data</h2>

<form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
    <fieldset class="my-5">
        <div class="mb-3">
            <label for="query" class="sr-only">Search</label>
            <input type="search" class="form-control" id="query" name="query" placeholder="Search Our Website" aria-label="Search">
        </div>
    </fieldset>
    
    <fieldset class="my-5">
        <legend class="fs-5">Filter by Continent</legend>
        <p>Only show the results from the following continent(s):</p>

        <!-- This is our default value. It is empty. If the user chooses this, we will omit continent from our query (as we want to include them all and NOT EXCLUDE anything in this column). -->
        <div class="form-check">
            <input type="checkbox" id="continent-all" name="continents[]" class="form-check-input" value="" <?php echo in_array("", $selected_continents) ? "checked" : ""; ?>>
            <label for="continent-all" class="form-check-label">All Continents</label>
        </div>

        <!-- Loop through each continent to create a checkbox. -->
        <?php foreach ($continents as $id => $name): ?>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="continent-<?php echo $id; ?>" name="continents[]" value="<?php echo $id; ?>" <?php echo in_array((string) $id, $selected_continents) ? "checked" : ""; ?>>
                <label class="form-check-label" for="continent-<?php echo $id; ?>"><?php echo $name; ?></label>
            </div>
        <?php endforeach; ?>
    </fieldset>
    
    
    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Search">
</form>

<?php

if (isset($_GET['submit'])) {
    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    // country is the only text to search

    echo '<section class="row justify-content-center">';
    echo '<h2 class="display-5">Results</h2>';

    $sql = "SELECT * FROM happiness_index WHERE 1=1";

    // query is the search term
    if ($query != "") {
        $sql .= " AND country LIKE CONCAT('%', ?, '%')";
    }

    if (!empty($selected_continents) && !in_array("", $selected_continents)) {
        $placeholders = implode(',' , array_fill(0, count($selected_continents), '?'));
        // echo $placeholders;
        $sql .= " AND continent IN ($placeholders)";
    }

    if ($statement = $connection->prepare($sql) ) {

        if ($query != "") {
            $statement->bind_param("s", $query);
        }
        if ($placeholders) {
            
        }
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                include 'includes/country-card.php';
            }
        } else {
            echo "<p>Sorry, no results found for the search term <b>$query</b></p>";
        }
    }


    echo "</section>";
}
?>

<?php  include 'includes/footer.php'; ?>