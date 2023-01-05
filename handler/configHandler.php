<?php
// Database Connection
$conn = mysqli_connect('localhost','handlerUser','5nXSlxizqSBIv0yh','nhs');

// Check Connection
if(mysqli_connect_errno()){
    exit("ERROR: Could Not Connect." . mysqli_connect_error());
}
?>