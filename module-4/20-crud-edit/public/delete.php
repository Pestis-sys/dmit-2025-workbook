<?php

$title = "Delete a City";
$introduction = 'To remove a city, click delete beside the city you want to remove.';

include 'includes/header.php';

generate_table(function($city) {
    $cid = $city['cid'];
    $city_name = $city['city_name'];

    return "<a href=\"delete-confirmation.php?city=".urlencode($cid)."&city_name=".urlencode($city_name)."\" class='btn btn-danger'>Delete</a>";

    // return '<a href="delete-confirmation.php?city='.urlencode($cid) . '&cityname=' . urlencode($city_name). '" class="btn btn-danger">Delete</a>';
});


?>

<h2>Delete a city</h2>


<?php include 'includes/footer.php'; ?>