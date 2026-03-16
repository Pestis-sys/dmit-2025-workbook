<!-- random dogs -->

<h3 class="h6">Most Popular Dog</h3>
<?php
$randomDog = mysqli_query($connection, "SELECT breed, pooch_id FROM dogs ORDER BY populairty DESC LIMIT 1");
while($row = mysqli_fetch_assoc($randomDog)) {
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];

    echo "<p>$breed <a href=\"breed.php?pooch=$pooch_id\">More Info</a> </p>";
}
?>


<h3 class="h6">Random Dogs</h3>
<?php
$randomDog = mysqli_query($connection, "SELECT * FROM dogs WHERE size = 'large' ORDER BY RAND() LIMIT 2");
while($row = mysqli_fetch_assoc($randomDog)) {
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];

    echo "<p>$breed <a href=\"breed.php?pooch=$pooch_id\">More Info</a> </p>";
}
?>

<h3 class="h6">Random Dogs</h3>
<?php
$randomDog = mysqli_query($connection, "SELECT * FROM dogs WHERE size = 'large' ORDER BY RAND() LIMIT 2");
while($row = mysqli_fetch_assoc($randomDog)) {
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];

    echo "<p>$breed <a href=\"breed.php?pooch=$pooch_id\">More Info</a> </p>";
}
?>

<h3 class="h6">Alpheabetical Listing</h3>
<?php
$sql = "Select breed, pooch_id, LEFT(Breed, 1) AS first_char FROM dogs WHERE UPPER(breed) BETWEEN 'A' AND 'Z' ORDER BY breed";
$current_char = '';
$randomDog = mysqli_query($connection, $sql);
while($row = mysqli_fetch_assoc($randomDog)) {
    $first_char = $row['first_char'];
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];

    if ($first_char != $current_char ) {
        $current_char = $first_char;
        echo "<p>" . strtoupper($current_char) . "</p>";

    }

    echo "<p>$breed <a href=\"breed.php?pooch=$pooch_id\">More Info</a> </p>";
}
?>

<h3 class="h6"></h3>
<?php

$current_char = '';

$randomDog->data_seek(0);

while($row = mysqli_fetch_assoc($randomDog)) {
    $first_char = $row['first_char'];
    $breed = $row['breed'];
    $pooch_id = $row['pooch_id'];

    if ($first_char != $current_char ) {
        $current_char = $first_char;
        echo "<a href=\"index.php?displayBy=breed&displayValue=$current_char%\">" . strtoupper($current_char) . "</a> | ";

    }

}
?>

