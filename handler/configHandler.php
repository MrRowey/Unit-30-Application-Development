<?php
$severname = "localhost";
$user = "handlerUser";
$pass = "5nXSlxizqSBIv0yh"; // 5nXSlxizqSBIv0yh
$dbname = "nhs";

$conn = mysqli_connect($severname, $user, $pass, $dbname);

if ($conn === false){
    die("Connect Failed: " . mysqli_connect_error());
}
echo "Connect Succses";
?>