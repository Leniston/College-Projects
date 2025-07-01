<?php


//start session

session_start();

//unset variables

$_SESSION = array();

//end session
session_destroy();

//direct back to home page

header("Location: /Views/index.php");
exit();
?>