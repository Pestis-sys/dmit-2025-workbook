<?php
// // Define the start date (e.g., a specific historical date)
// $start_date_str = "1990-01-01";

// // 1. Get the current date as a timestamp
// $current_date_timestamp = time();

// // 2. Convert the start date to a timestamp
// $start_date_timestamp = strtotime($start_date_str);

// // Check if dates were converted successfully
// if ($start_date_timestamp === false) {
//     die("Error: Invalid date format for start date.");
// }

// // 3. Calculate the difference in seconds
// $difference_in_seconds = abs($current_date_timestamp - $start_date_timestamp); // Use abs() to ensure a positive difference

// // 4. Convert the difference in seconds to years
// $seconds_per_day = 60 * 60 * 24;
// $days_per_year = 365.25; // Account for leap years
// $difference_in_years = floor($difference_in_seconds / ($seconds_per_day * $days_per_year));

// // Output the result
// echo "Current Date: " . date("Y-m-d", $current_date_timestamp) . "\n";
// echo "Start Date: " . $start_date_str . "\n";
// echo "Difference in years: " . $difference_in_years . "\n";


function ageOfMajority($user_date) {

    $province = 'AB';
    $user_date_converted = strtotime($user_date);
    $today = date("Y-m-d");
    $current_date_time = strtotime($today);

    if ($user_date_converted === false) {
        return "Error: Invalid date format.";
    }

    switch ($province) {
        case 'AB':
        case 'MB':
        case 'QC':
            $are_you_an_adult_age = 18;
            break;
        
        default:
            $are_you_an_adult_age = 19;
            break;
    }
    if ($difference_in_years >= $are_you_an_adult_age) {
        return "You are an adult.";
    } else {
        return "You're still a minor.";
    }

    return $message;
    //  this is later to come in the form 

    $user_input = "2021-04-28"; 
    $result = ageOfMajority($user_input);  // Example user input date


    $difference_in_years = abs($current_date_time - $user_date_converted);
    $seconds_per_day = 60 * 60 * 24;
    $days_per_year = 365.25;
    $difference_in_years = floor($difference_in_seconds / ($seconds_per_day * $days_per_year));

    if ($difference_in_years >= 18) {
        return "You are of legal age.";
    } else {
        return "You are underage.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datechecker!</title>
    <style></style>
</head>
<body>
    <main>
        <div class="container">
        
        </div>
    </main>
</body>
</html>