<?php
 
$dbhost = "localhost";
$dbName = "nhs";
$dbUser = "root";
$dbpass = "";

// create connection
$conn = new mysqli($dbhost, $dbUser, $dbpass);

// check connection
if ($conn->connect_error){
    die("Connection fail: " . $conn->connect_error);
}
echo "connected";
?>