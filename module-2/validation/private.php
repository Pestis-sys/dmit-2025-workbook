<?php

// this function checks to see if only letters, a single quote, and spaces are in the variable
// it returns 0 if false and 1 if true
function isAllowedString($string) {
    return preg_match("/^[a-z ']+$/i", $string) ;
}


// this function checks to see if the variable is a valid email address
// it returns 0 if false and 1 if true
function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9._]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) ;
}


// this function checks to see if the variable exists in the array that generated it
// value is from the form submission
// list is the original array
function has_allowed_value($value, $list) {
    return in_array($value, $list);
}

?>