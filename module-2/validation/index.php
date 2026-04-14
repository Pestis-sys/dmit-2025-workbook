<?php
include 'private.php';

$feel_array = ['great', 'happy', 'impartial', 'sad'];

if (isset($_GET['submit'])) {
    $full_name = isset($_GET['full_name']) ? trim($_GET['full_name']) : '';
    $age = isset($_GET['age']) ? trim($_GET['age']) : '';
    $email = isset($_GET['email']) ? trim($_GET['email']) : '';
    $feel = isset($_GET['feel']) ? trim($_GET['feel']) : '';

    $all_good = TRUE;
    $message = '';

    if (empty($full_name)) {
        $all_good = FALSE;
        $message .= "<p>A full name is required.</p>";
    } else {
        if (strpos($full_name, ' ') == FALSE) {
            $all_good = FALSE;
            $message .= "<p>Please provide first AND last names.</p>";
        } else {
            if (isAllowedString($full_name) == 0) {
                $all_good = FALSE;
                $message .= "<p>Please enter a valid first and last name.</p>";
            }
        }        
    }
// age - must over 18 or over
// can't be negative
// can't be empty
// can't be words
// data type
// filter var to make sure it is an int

    if (empty($email)) {
        $all_good = FALSE;
        $message .= "<p>An email address is required.</p>";
    } else {
        if (has_valid_email_format($email) == 0) {
            $all_good = FALSE;
            $message .= "<p>Please enter a valid email address.</p>";
        }
    }

    if (empty($feel)) {
        $all_good = FALSE;
        $message .= "<p>A feeling is required.</p>";
    } else {
        if (has_allowed_value($feel, $feel_array) == 0) {
            $all_good = FALSE;
            $message .= "<p>Please choose an option from the list.</p>";
        }
    }



    if ($all_good == TRUE) {
        // $message .= "<p>Congrats. You passed the validation test. Now we can save to a database or email or write to a file.</p>";


        // redirects 
        header('Location: thank-you.php?name='.$full_name);
    }
} else {
    $full_name = $age = $email = $feel = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="col-10 col-md-6 mx-auto">
            <?php
            // if (isset($message)) {
            //     echo "<div class=\"bg-info\">";
            //     echo $message;
            //     echo "</div>";
            //     // echo "<div class=\"bg-info\">$message</div>";
            // } ?>
            <?php if (isset($message)) : ?>
                <div class="bg-info p-3 my-5">
                    <?=  $message; ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $full_name; ?>">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" id="age" name="age" value="<?= $age; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>">
            </div>
            <!-- <div class="mb-3">
                <label for="feel" class="form-label">How do you feel about PHP?</label>
                <select name="feel" id="feel" class="form-select">
                    <?php
                    // foreach ($feel_array as $value) {
                        // echo '<option value="'.$value.'">'.$value.'</option>';
                        // echo "<option ";
                        // if ($value == $feel)
                        //     echo 'selected';
                        // echo " value=\"$value\">$value</option>";
                        // echo "\n\t\t\t\t";
                    // }
                    ?>
                </select>
            </div> -->
            <div class="mb-3">
                <label for="feel" class="form-label">How do you feel about PHP?</label>
                <select name="feel" id="feel" class="form-select">
                    <option value="">Please select a feeling</option>
                    <?php
                    foreach ($feel_array as $one_feeling) { ?>
        
                        <option
                            <?php
                            if ($one_feeling == $feel) {
                                echo ' selected ';
                            }
                            ?>
                        value="<?= $one_feeling ?>"><?= $one_feeling ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>