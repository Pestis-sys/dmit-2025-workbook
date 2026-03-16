<?php
// Establish a connection to the database
require_once dirname(__DIR__, 3) . '/data/connect.php';
$connection = db_connect();
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
            <div class="col-3 col-sm-2">
                <!-- filters -->
                <h3 class="h6">Default: No Filter</h3>
                <p><a href="index.php">All Dogs</a></p>

                <h3 class="h6">Filter by Column = Value</h3>
                <!-- sizes -->
                <p><a href="index.php?displayBy=size&displayValue=small">Small Dogs</a></p>
                <p><a href="index.php?displayBy=size&displayValue=medium">Medium Dogs</a></p>
                <p><a href="index.php?displayBy=size&displayValue=large">Large Dogs</a></p>
                <!-- good with kids -->
                <p><a href="index.php?displayBy=children&displayValue=yes">Good with Kids</a></p>
                <!-- good guard dog -->
                <p><a href="index.php?displayBy=guard&displayValue=1">Good guard dog</a></p>

                <h3 class="h6">Filter by ID so 1 result</h3>
                <p><a href="index.php?displayBy=pooch_id&displayValue=20">Featured Dog: Pekinese</a></p>

                <h3 class="h6">Filter using Between</h3>
                <p><a href="index.php?displayBy=intelligence&min=7&max=10">Smart Dogs</a></p>
                <p><a href="index.php?displayBy=intelligence&min=4&max=6">Medium intelligence Dogs</a></p>
                <p><a href="index.php?displayBy=intelligence&min=1&max=3">Lacking in intelligence Dogs</a></p>
    
            </div>
            <div class="col-9 col-sm-7">
                <!-- results -->
                <?php
                    $sql = "SELECT breed, image_file, pooch_id FROM dogs";

                    $displayBy = isset($_GET['displayBy']) ? htmlspecialchars(trim($_GET['displayBy'])) : '';
                    $displayValue = isset($_GET['displayValue']) ? htmlspecialchars(trim($_GET['displayValue'])) : '';
                    $min = isset($_GET['min']) ? htmlspecialchars(trim($_GET['min'])) : '';
                    $max = isset($_GET['max']) ? htmlspecialchars(trim($_GET['max'])) : '';

                    // if (isset($_GET['displayBy'])) {
                    //     $displayBy = trim($_GET['displayBy']);
                    //     $displayBy = htmlspecialchars($displayBy);
                    // } else {
                    //     $displayBy = '';
                    // }

                    if ($displayBy != '' && $displayValue != '') {
                        $sql .= " WHERE $displayBy like '$displayValue'";
                    }

                    if ($displayBy == 'intelligence') {
                        if (is_numeric($min) && $min > 0) {
                            if (is_numeric($max) && $max > 0) {
                                $sql .= " WHERE intelligence BETWEEN $min AND $max";
                            }   
                        }
                    }

                    

                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) == 0) {
                        echo '<p>Sorry no records found.</p>';
                    } else {
                        echo "<div class='row g-3'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            extract($row);
                            ?>

                            <div class="col-6 col-md-4">
                                <div class="card p-3">
                                    <a href="breed.php?pooch=<?= $pooch_id; ?>">
                                        <img src="images/thumbs100/<?= $image_file ?>" alt="image of a <?= $breed; ?>" class="img-fluid">
                                        <p><?= $breed; ?></p>
                                    </a>
                                </div>

                            </div>


                            <?php
                        }

                        echo "</div>";
                    }
                ?>

            </div>
            <div class="col-sm-3">
                <!-- widget area  -->
                <?php include 'widgets.php'; ?>
            </div>
            
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