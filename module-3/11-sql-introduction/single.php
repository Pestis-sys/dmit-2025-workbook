<?php
require_once dirname(__DIR__, 2) . '/data/connect.php';
$conn = db_connect();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id > 0) {
    $sql = "SELECT city_name, province, population, is_capital, trivia FROM cities WHERE cid = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        extract($row);
    }  else {
       header('Location:index.php');
    }
} else {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information about <?= $city_name; ?></title>
</head>
<body>
    <h1>City Info</h1>

    <h2><?= $city_name; ?></h2>

    <ul>
        <li>Province: <?= $province; ?></li>
        <li>Population: <?= $population ?></li>
    </ul>
</body>
</html>