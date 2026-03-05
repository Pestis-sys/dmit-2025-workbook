<?php
$title = "Home";
include 'includes/header.php'; 
include 'includes/functions.php';

// change this to come from form later
$per_page = $_POST['number-of-results'] ?? $_GET['number-of-results'] ?? 12;

// how many records do we have
$total_records = count_records();
// echo "there are $total_records";

// how many pages do we need?
$total_pages =  ceil( $total_records / $per_page );
// echo "there will be $total_pages pages";

$current_page = (int) ($_GET['page'] ?? 1 );

if ($current_page < 1 || $current_page > $total_pages || !is_int($current_page)) {
    $current_page = 1;
}

$offset = $per_page * ($current_page - 1);

?>


<h2 class="display-5 my-3">Welcome to the Happy Planet Index</h2>

<!-- This is the form control for our pagination. They will allow the user to choose how many records they want to see per page. -->
<aside class="my-3">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="input-group">
            <label for="number-of-results" class="input-group-text">Countries per Page:</label>
            <select name="number-of-results" id="number-of-results" class="form-select" aria-label="Countries per Page">
                <!-- The array in our foreach loop will become the number of records the table can display. -->
                <?php foreach ([12, 24, 48] as $value) : ?>
                    <option value="<?= $value; ?>" <?= ($per_page == $value) ? 'selected' : ''; ?>><?= $value; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="submit-page-number" id="submit-page-number" value="Submit" class="btn btn-success">
        </div>
    </form>
</aside>

<?php



// $result = $connection->query($sql);

$result = find_records($per_page, $offset);

if ($connection->error) : ?>
    <p>Oh no! There was an issue retrieving the data.</p>
<?php else : ?>
    <?php if ($result->num_rows > 0) : ?>    
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>HPI Rank</th>
                    <th>Country Name</th>
                    <th>Action</th>
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
                                echo "View Stats";
                                echo "</a>";
                            echo "</td>";
                        echo "</tr>\n";
                    }

                ?>
            </tbody>
        </table>    
        <nav>
            <ul class="justify-content-center pagination">
                <?php if ($current_page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?= $current_page - 1; ?>&number-of-results=<?= $per_page; ?>">Previous</a>
                    </li>
                <?php endif; ?>
                <!-- middle pages -->
                <?php
                    $gap = FALSE;
                    $window = 2;
                    for ($i=1; $i <= $total_pages; $i++) { 
                        //  checking if it's not close to the beginning, not close to the end, and not near the current page
                        if ($i > 1 + $window && $i < $total_pages - $window && abs($i - $current_page) > $window) {
                            if (!$gap) {
                                echo "<li class='page-item'><span class='page-link'>...</span></li>";
                            }
                            $gap = TRUE;
                            continue;
                        }

                        $gap = FALSE;

                        if ($current_page == $i) {
                            echo "<li class='page-item active'>";
                            echo "<a class='page-link link-white border border-success bg-success' href='#'>$i</a>";
                            echo "</li>";
                        } else {
                            echo "<li class='page-item'>";
                            echo "<a class='page-link' href=\"index.php?page=$i&number-of-results=$per_page\">$i</a>";
                            echo "</li>";
                        }
                        
                        
                    }
                
                ?> 

                <?php if ($current_page < $total_pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="index.php?page=<?php echo $current_page + 1; ?>">Next</a>
                    </li>

                <?php endif; ?>    
            </ul>
        </nav>    
    <?php endif; ?>

<?php endif; ?>



<?php include 'includes/footer.php';  ?>