<?php 
$title = 'Delete Conformation';
$introduction = 'Confirm you want delete this city';

include 'includes/header.php';

// $city_id = filter_input(INPUT_GET, 'city', FILTER_VALIDATE_INT);

$city_id = (isset($_GET['city'])) ? $_GET['city'] : '';
if($city_id < 1 || !is_numeric($city_id)) {
    $city_id = '';
}


// $city_name = filter_input(INPUT_GET, 'city-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$city_name = isset($_GET['city_name']) ? urldecode(trim($_GET['city_name'])) : "";
$message = '';

if (!$city_id || !$city_name) {
    $message = '<p>Please return to the <a href="delete.php">delete</a> page and select an option from the table</p>';
}

if (isset($_POST['confirm'])) :
    $hidden_id = $_POST['hidden_id'];
    $hidden_city = $_POST['hidden_city'];

    if(is_numeric($hidden_id) && $hidden_id > 0) :
        delete_city($hidden_id);
        $message = "<p>$hidden_city was deleted from the database.</p>";
        $city_id = null;
    endif;

endif;
 if($message) :
    echo $message;
 endif;

 if ($city_id) :?>
    <p class="text-danger lead mb-5 text-center">Are you sure that you want to delete <?= $city_name ?></p>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="text-center">
        <input type="hidden" name="hidden_id" value="<?= $city_id ?>">
        <input type="hidden" name="hidden_city" value="<?= $city_name ?>">
    
        <input type="submit" value="Yes, Im sure " name="confirm" class="btn btn-danger">

 </form>

<?php endif; ?>

<p class="text-center mt-5">
    <a href="delete.php" class="text-link link-dark">Return to 'Delete a city' page </a></p>


<?php include 'includes/footer.php';
// this is a test
?>