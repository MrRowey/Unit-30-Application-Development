<?php
// Database Credentials.
$conn = mysqli_connect('localhost', 'basicUser', 'L9z9gNsCcVcUe)ja', 'nhs');

// Check Connection
if(mysqli_connect_errno()){
    exit('Failed to connect o mysql: ' . mysqli_connect_error());
}
?>