<?php
// Database Credentials.
$conn = mysqli_connect('localhost', 'managerUser', 'LIJC9ZPfKtFQ!jdq', 'nhs');

// Check Connection
if(mysqli_connect_errno()){
    exit('Failed to connect o mysql: ' . mysqli_connect_error());
}
?>