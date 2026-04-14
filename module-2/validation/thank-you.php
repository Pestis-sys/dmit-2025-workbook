<?php

    $name = isset($_GET['name']) ? trim($_GET['name']) : '';

    if (empty($name)) {
         header('Location: index.php');
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php
// convert to uppercase
    $name = strtoupper($name);

    $name2 = strtolower($name);

    echo ucfirst($name2);

    echo ucwords($name2);
    $upper_cased_words = ucwords($name2);

    $phone = '111-111-11114';

    $phone = str_replace('-', '',$phone);

    echo $phone;

    if (strlen($phone) != 10) {
        echo 'bad';
    } else {
        echo 'good';
    }

    ?>  

    <div class="container">
        <h1 class="display-3">Thank you <?= $name ?>!</h1>
        <p>You will be contacted via the email you provided</p>
    </div>
</body>
</html>