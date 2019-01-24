<?php
//Start session
session_start();
//Logout
unset($_SESSION['username']);
session_destroy();
header("Location: index.php");
?>