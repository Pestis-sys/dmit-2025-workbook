<?php 

/*
    If we want to do anything on a database, we need to connect to it AND be authorised to use it! 
    Here, we're going to create a connection string. We will include this in every subsequent page in our website.

    Because these credentials are HARD CODED, this is a very dangerous file. We need to make sure that it never goes into public_html (only our data/ directory on our server).
*/

define('DB_SERVER', 'localhost'); // the server that hosts our database (localhost means the same server as our website)
define('DB_USER', 'student'); // the username to access the database (root is the default for MySQL)
define('DB_PASS', 'student'); // the password to access the database (root is the default for MySQL)
define('DB_NAME', 'dmit2025'); // the name of the database we want to connect to

function db_connect() {
    // create a connection to the database using the credentials defined above
    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    // check if the connection was successful
    if (mysqli_connect_error()) {
        echo "Connection failed: " . mysqli_connect_error();} // if there was an error, display the error message
        else {
            // if the connection was successful, we can set the character set to utf8mb4 to support a wide range of characters
            $connection->set_charset("utf8mb4");
            return $connection; // return the connection object for use in other pages

        }
    }

function db_disconnect($connect) {
    if (isset($connect)) {
        mysqli_close($connect); // close the database connection if it is set
    }
}
// we can use the db_connect() function to establish a connection to the database and the db_disconnect() function to close the connection when we're done. This way, we can manage our database connections efficiently and securely throughout our website.
?>