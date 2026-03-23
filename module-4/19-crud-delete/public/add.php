<?php

$title = "Add a City";
$introduction = 'To add a city to our system, simply fill out the form below and hit save.';

include 'includes/header.php';

$capital = isset($_POST['capital']) ? $_POST['capital'] : 0;

if (isset($_POST['submit'])) {

    $message = '';
    $alert_class = "alert-danger";

    $validation_result = validate_city_input($_POST['city_name'], $_POST['province'], $_POST['population'], $capital, $_POST['trivia'], $provincial_abbr );

    if ($validation_result['is_valid']) {
        $data = $validation_result['data'];

        if (insert_city($data['city_name'], $data['province'], $data['population'], $data['capital'], $data['trivia'])) {
            $message = "City added successfully";
            $alert_class = "alert-success";
            $city_name = $province = $population = "";            
        } else {
            $message = "There was a problem adding the city" . $connection->error;
        }
    } else {
        $message = implode("<p></p>", $validation_result['errors']);
    }
}


?>

<?php if (isset($message)) : ?>
    <div class="p-3 alert <?php echo $alert_class ?? 'alert-danger'; ?> ">
        <p><?= $message ?></p>
    </div>
<?php
    endif;
    
    include 'includes/form.php'; ?>

<?php include 'includes/footer.php'; ?>