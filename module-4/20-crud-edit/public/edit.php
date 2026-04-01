<?php

$title = "Edit a City";
$introduction = 'To edit a record, click edit beside the row you want to change.';
$message = '';
$alert_class = 'alert-danger';

include 'includes/header.php';

// step 2 - get the id - get is from anchor click, post is from the form, empty when page loads
$city_id = $_GET['city_id'] ?? $_POST['city_id'] ?? '';

$city = $city_id ? select_city_by_id($city_id) : null;

// step 3 - 2 - getting the values for the form
$existing_city_name = $city['city_name'] ?? "";
$existing_province = $city['province'] ?? "";
$existing_population = $city['population'] ?? "";
$existing_capital = $city['is_capital'] ?? '0';
$existing_trivia = $city['trivia'] ?? "";


$user_city_name = $_POST['city_name'] ?? "";
$user_province = $_POST['province'] ?? "";
$user_population = $_POST['population'] ?? "";
$user_capital = isset($_POST['capital']) ? $_POST['capital'] : '0';
$user_trivia = $_POST['trivia'] ?? "";

// echo $user_city_name . " \ " . $existing_city_name;

if (isset($_POST['submit'])) :
   $valdation_result = validate_city_input($user_city_name, $user_province, $user_population, $user_capital, $user_trivia, $provincial_abbr);

    if ($valdation_result['is_valid']) :

    if(update_city($user_city_name, $user_province, $user_population, $user_capital, $user_trivia, $city_id)) :
        $message = "$user_city_name updated successfully.";
        $alert_class = 'alert-success'; 
        $city_id = ''; // reset the city_id to hide the form after successful update
    else :
        $message = 'Failed to update the city. Please try again.';
    endif;
else :
    $message = implode('</p><p>', $valdation_result['errors']);
    endif;
endif;

 if ($message !== '') :
    echo "<div class='alert $alert_class'>$message</div>";
endif;

// step 3 - 1 - the form
if ($city_id) :
    echo '<h3 class="fw-light mb-3">Edit ' . $existing_city_name . '</h3>';
    include 'includes/form.php';
endif;


// step 1 - generate the table
generate_table(function($city) {
    $cid = $city['cid'];
    return '<a href="edit.php?city_id=' . urlencode($cid) . '" class="btn btn-warning">Edit</a>';
});
?>
<?php include 'includes/footer.php'; ?>