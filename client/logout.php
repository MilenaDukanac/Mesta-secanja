<?php
session_start();
$_SESSION['type'] = null;
$_SESSION['name'] = null;
$_SESSION['surname'] = null;
header("Location: home.php");

?>