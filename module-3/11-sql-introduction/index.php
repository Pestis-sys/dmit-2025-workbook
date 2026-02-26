<?php
require_once dirname(__DIR__, 2) . '/data/connect.php';
$conn = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td { border:1px solid black;}
        table { border-collapse: collapse;}
    </style>
</head>
<body>
    <section>
        <h2>Show three cities</h2>
        <?php
            $sql = "SELECT * FROM `cities` LIMIT 3";
            $result = mysqli_query($conn, $sql);
            // var_dump($result);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                while ($row = mysqli_fetch_assoc($result)) {
                    // var_dump($row);
                    $city_name = $row['city_name'];
                    $province = $row["province"];
                    $population = $row["population"];
                    $is_capital = $row['is_capital'] == 1 ? 'Yes' : 'No';
                    $trivia = $row['trivia'];
                    $cid = $row['cid'];

                    echo "<tr>";

                    echo "<td>$cid</td><td>$city_name</td><td>$province</td><td>$population</td><td>$is_capital</td><td>$trivia</td>";

                    echo "</tr>";
                    
                }
                echo '</table>';
            } else {
                echo '<p>No cities found.</p>';
            }
        ?>
    </section>

    <section>
        <h2>City ID 4 </h2>
        <?php
            $sql2 = "SELECT * FROM `cities` WHERE CID = 4";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) == 1) {
                $row = mysqli_fetch_assoc($result2);
                // var_dump($row);
                echo '<p>The city at ID 4 is ' . $row['city_name'] . ' in ' . $row['province']. ' with a population of ' . $row['population'] . '</p>';
            } else {
                echo '<p>Sorry, couldn\'t find that city</p>';
            }
        ?>
        
    </section>

    <section>
        <h2>All capital cities by province</h2>
        <?php
            $sql3 = "SELECT city_name, province FROM `cities` WHERE is_capital = TRUE ORDER BY province";
            $result3 = mysqli_query($conn, $sql3);

            if (mysqli_num_rows($result3 ) > 0) {
                $content = '';
                while ($row = mysqli_fetch_assoc($result3)) {
                    extract($row);
                    $content .= "<p>$city_name $province</p>";
                }

                echo "<div>$content</div>";
            } else {
                echo '<p>No capital cities found.</p>';
            }
        ?>
    </section>
</body>
</html>