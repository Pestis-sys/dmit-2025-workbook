<?php 
require_once dirname(__DIR__, 2) . '/data/connect.php'; // include the connect.php file to establish a connection to the database and define the db_connect() and db_disconnect() functions
$conn = db_connect(); // establish a connection to the database using the db_connect() function defined
?>
<!doctype html>
<html lang="en">   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SQL Introduction</title>
    </head>
    <body>
        <section>
            <h2>Show Three Cities</h2>
            <?php 
            $sql = "SELECT * FROM cities LIMIT 3"; // define a SQL query to select all columns from the "cities" table, but limit the results to only 3 records
            $result = mysqli_query($conn, $sql); // execute the SQL query using the
            var_dump($result); // output the result of the query execution for debugging purposes
            if (mysqli_num_rows($result) > 0) { // check if the query returned any rows
                echo '<table>';
                while ($row = mysqli_fetch_assoc($result)) { // loop through each row of the result set and fetch it as an associative array
                  var_dump($row); // output the row data for debugging purposes
                  $city_name = $row['city_name']; // extract the city name from the current row
                  $population = $row['population']; // extract the population from the current row
                  $population = $row['population']; // extract the population from the current row
                  $is_capital = $row['is_capital'] == 1 ? "Yes" : "No"; // extract the is_capital value from the current row and convert it to a readable string
                  $triva = $row['trivia']; // extract the trivia from the current row
                  $cid = $row['cid']; // extract the cid from the current row

                  echo "<tr>";
                         echo  "<td> $city_name </td>
                          <td> $population </td>
                          <td>  $is_capital </td>
                          <td> $triva  </td>
                          <td>  $cid  </td>";
                       echo "</tr>"; // output the city name, population, is_capital status, trivia, and cid in an HTML table row  

                    
                }
            } else {
                echo "<p>No cities found.</p>"; // output a message if no rows were returned by the query
            }
            ?>
        </section>
        <section>
            <!-- Select * from cities where CID = 4 -->
             <h2>City ID 4</h2>
            <?php
            $sql = "SELECT * FROM cities WHERE cid = 4"; // define a SQL query to select all columns from the "cities" table where the cid is equal to 4
            $result = mysqli_query($conn, $sql); // execute the SQL query using the mysqli_query() function
            if (mysqli_num_rows($result) == 1) { // check if the query returned exactly one row
             $row = mysqli_fetch_assoc($result); // fetch the row as an associative array
             echo '<p>The city with ID 4 is: ' . $row['city_name'] . ' in ' .$row['province'] . 'with a population of '. $row['population'] .'</p>';
             }
             ?>     // output the city name from the fetched row
        </section>
        <section>
            <h2>All capital cities by province</h2>
            <?php
            $sql3 = "SELECT city_name, province FROM cities WHERE is_capital = TRUE ORDER BY province"; // define a SQL query to select the city name and province from the "cities" table where the is_capital column is equal to 1
            $result3 = mysqli_query($conn, $sql3); // execute the SQL query using the mysqli_query() function
            if (mysqli_num_rows($result3) > 0) { // check if the query returned any rows
                while ($row = mysqli_fetch_assoc($result3)) {
                    $content = ""; // loop through each row of the result set and fetch it as an associative array 
                // how can we create automaitaclly create variables for each column in the row without manually creating them without looping them using extract?
                // extract only works if the column names in the database match the variable names you want to create in your PHP code. If the column names are different, you will need to manually create variables for each column and assign the values from the row to those variables. you can do a var dump to get the column names and then use those column names to create variables in your PHP code.
                extract($row); // extract all columns from the current row into individual variables
                $content .= "<p>$city_name is the capital city of $province.</p>"; // concatenate a string containing the city name and province into the $content variable
                echo "<p>$city_name is the capital city of $province.</p>";
                    
                }
                echo "<div>$content</div>"; // output the content variable containing the capital city information in an HTML div element
            } else {
                echo "<p>No capital cities found.</p>"; // output a message if no rows were returned by the query
            }
            ?>
        </section>
        
    </body>
</html>