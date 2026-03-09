<?php
// GIVE TO STUDENTS TO START LESSON
$title = "Search";
include 'includes/header.php';
include 'includes/continents.php';

//ONLY HERE TO NOT THROW ERRORS = WE WILL FIX
$country_search = $score = '';
$selected_continents = array();

?>
<!-- Introduction Area -->
<h2 class="display-5">Browse Our Data</h2>
<p class="mb-5">Explore our data below by country name, continents, wellbeing score, and average lifespan. To get started, pick the options you'd like to use and click the "Search" button. This will show you the filtered results based upon what you selected.</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET" class="mb-5 border border-success p-3 rounded shadow-sm">
    <h3 class="display-6">Advanced Search</h3>

    <!-- Country Name Search -->
    <fieldset class="my-5">
        <legend class="fs-5">Search By Country</legend>
        <div class="mb-3">
            <label for="country-search" class="form-label">Enter country name:</label>
            <input type="text" id="country-search" name="country-search" value="<?php echo $country_search; ?>" class="form-control">
        </div>
    </fieldset>

    <!-- Continents -->
    <fieldset class="my-5">
        <legend class="fs-5">Filter by Continent</legend>
        <p>Only show the results from the following continent(s):</p>

        <!-- This is our default value. It is empty. If the user chooses this, we will omit continent from our query (as we want to include them all and NOT EXCLUDE anything in this column). -->
        <div class="form-check">
            <input type="checkbox" id="continent-all" name="continents[]" class="form-check-input" value="" <?php echo in_array("", $selected_continents) ? "checked" : ""; ?>>
            <label for="continent-all" class="form-check-label">All Continents</label>
        </div>

        <!-- Loop through each continent to create a checkbox. -->
        <?php foreach ($continents as $id => $name): ?>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="continent-<?php echo $id; ?>" name="continents[]" value="<?php echo $id; ?>" <?php echo in_array((string) $id, $selected_continents) ? "checked" : ""; ?>>
                <label class="form-check-label" for="continent-<?php echo $id; ?>"><?php echo $name; ?></label>
            </div>
        <?php endforeach; ?>
    </fieldset>

    <!-- Wellbeing -->
    <fieldset class="my-5">
        <legend class="fs-5">By Wellbeing</legend>

        <!-- This is going to determine our comparison operator. We cannot directly pass '>' or '<' into a query due to htmlspecialchars() and the sanitation these form values go through. Therefore, we're using strings, which we'll convert ourselves later on in the process. -->
        <div class="mb-3">
            <label for="wellbeing-score" class="form-label">Only show countries with a score:</label>
            <select name="wellbeing-score" id="wellbeing-score" class="form-select">
                <option value="greater" <?php if ($score == "greater") { echo "selected"; } ?> >above</option>
                <option value="less" <?php if ($score == "less") { echo "selected"; } ?> >below</option>
            </select>
        </div>

        <!-- This will be the number or the threshold for the wellbeing score. -->
        <div class="mb-3">
            <label for="wellbeing-value" class="form-label">the following value:</label>
            <input type="number" name="wellbeing-value" id="wellbeing-value" min="1" max="10" value="<?php echo $value; ?>" class="form-control">
        </div>
    </fieldset>

    <!-- Average Life Expectancy -->
    <fieldset class="my-5">
        <legend class="fs-5">Life Expectancy</legend>
        <!-- Minimum Age -->
        <div class="mb-3">
            <label for="life-expectancy-min" class="form-label">Show results with a minimum life expectancy of:</label>
            <input type="number" id="life-expectancy-min" name="life-expectancy-min" value="<?php echo $min; ?>" min="50" max="90" class="form-control">
        </div>
        <!-- Maximum Age -->
        <div class="mb-3">
            <label for="life-expectancy-max" class="form-label">and a maximum life expectancy of:</label>
            <input type="number" id="life-expectancy-max" name="life-expectancy-max" value="<?php echo $max; ?>" min="50" max="90" class="form-control">
        </div>
    </fieldset>

    <!-- Submit -->
    <div class="mb-3">
        <input type="submit" id="submit" name="submit" class="btn btn-success" value="Search">
    </div>
</form>

<?php include('includes/footer.php'); ?>