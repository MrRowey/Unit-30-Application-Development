<?php
// Database Credentials.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'accounts');

// Attemt Connection to MySQL Database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check Connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "connected";
?>