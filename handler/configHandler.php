<?php
// Database Credentials.
$conn = mysqli_connect('localhost', 'handlerUser', '5nXSlxizqSBIv0yh', 'nhs');

// Check Connection
if(mysqli_connect_errno()){
    exit('Failed to connect o mysql: ' . mysqli_connect_error());
}
?>