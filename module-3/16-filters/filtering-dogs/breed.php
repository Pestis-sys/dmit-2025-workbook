<?php
// Establish a connection to the database
require_once dirname(__DIR__, 3) . '/data/connect.php';
$connection = db_connect();

$pooch = isset($_GET['pooch']) ? $_GET['pooch'] : '';


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?> | Dogs Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column justify-content-between min-vh-100">

    <header class="p-3 mb-5 text-bg-danger shadow-sm sticky-top">
        <div class="container">
            <section class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                <h1><a href="index.php" class="mb-2 mb-lg-0 text-white text-decoration-none fs-3 fw-light">Filtering Dogs</a></h1>
            </section>
        </div>
    </header>

    <main class="container-lg">
        <section class="row justify-content-center">
            <?php if ($pooch == '' || !is_numeric($pooch)) : ?>
                <p>Sorry that Pooch dosent exist.</p>
            <?php else: ?>
                <?php
                $sql = "SELECT * FROM dogs WHERE pooch_id = $pooch";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) == 1) :
                    $fetch = mysqli_fetch_assoc($result);
                ?>

                    <div>
                        <h2><?= $fetch['breed'] ?></h2>
                        <img src="images/display_400x300/<?= $fetch['image_file'] ?>"
                            alt="image of <?= $fetch['breed'] ?>">
                        <p><b>Size:</b><?= $fetch['size'] ?></p>
                        <p><b>Children:</b><?= $fetch['children'] ?></p>
                        <p><b>Low Shedding:</b><?= $fetch['lowshedding'] ?></p>
                        <p><b>Good with Kids:</b>
                            <?php
                            // if ($fetch['children'] == 1) :
                            //     echo 'yes';
                            // else :
                            //     echo 'no';
                            // endif;

                            echo $fetch['guard'] == 1 ? 'yes' : 'no';
                            // echo $good_with_kids;
                            ?>
                        </p>
                    </div>

                <?php
                $update_sql = "UPDATE dogs SET populairty = populairty + 1 WHERE pooch_id = $pooch";
                $update_result = mysqli_query($connection, $update_sql);
                endif;
                ?>
            <?php endif; ?>
        </section>
    </main>

    <footer class="text-bg-danger text-center mt-5 py-5">
        <p>&copy; <?= date('Y'); ?></p>
    </footer>
</body>

</html>

<?php
db_disconnect($connection);
// Finally, we must always close our connection to the database.

?>