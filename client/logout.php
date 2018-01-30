<?php
session_start();

$_SESSION['type'] = null;
$_SESSION['name'] = null;
$_SESSION['username'] = null;
$_SESSION['surname'] = null;
$_SESSION['userId'] = null;
$_SESSION['lastTime'] = null;

session_destroy();

header("Location: home.php");
?>
