<?php

$title = "Welcome!";
$introduction = 'Welcome to the cities database. ';

include 'includes/header.php';
?>
<h2>Current Cities in the Database</h2>

<?php
    // $sql = "SELECT city_name, province, population FROM cities";
    // $result = mysqli_query($connection, $sql);

    // if (mysqli_num_rows($result) == 0) :
    //     echo "Sorry no cities to display";
    // else:
    //     while ($row = mysqli_fetch_assoc($result)) :
    //         extract($row);
    //         echo "<p>$city_name, $province - $population</p>";

    //     endwhile;
        
    // endif;
    generate_table();
?>


<?php include 'includes/footer.php'; ?>