<?php
// Database Credentials.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'basicUser');
define('DB_PASSWORD', 'L9z9gNsCcVcUe)ja');
define('DB_NAME', 'nhs');

// Attemt Connection to MySQL Database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check Connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "connected";
?>