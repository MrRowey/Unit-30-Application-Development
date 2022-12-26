<?php
// start the session
session_start();

// wipe all sessiosn variables
$_SESSION = array();

// destryo the session
session_destroy();

header("location: index.php");
exit;
?>