<?php 
$title = "Home";
include 'includes/header.php'; 
?>

<h2 class="display-5 my-3">Welcome to the Happy Planet</h2>


<?php 
$sql = "SELECT `rank`, country FROM happiness_index";
$result = $connection->query($sql);

if($connection->error)  : ?>
    <p>Oh no! There was an issue retriving the data.</p>
<?php  else : ?>
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>HPI Rank</th>
                    <th>Country Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($row = $result->fetch_assoc()) {
                        extract($row);
                        $rankEncoded = urlencode($rank);
                        $countryEncoded = urlencode($country);
                        echo "<tr>";
                        echo "<td>$rank</td>";
                        echo "<td>$country</td>";
                        echo "<td>";
                            echo "<a href=\"country.php?rank=$rankEncoded&country=$countryEncoded\" class='link-success'>";
                            echo "Veiw Stats";

                            echo "</a>";
                        echo "</td>";
                    echo "</tr>\n";
                }
                
                ?>
            </tbody>
        </table>
        <?php endif; ?>


<?php endif; ?>



<?php include 'includes/footer.php'; ?>