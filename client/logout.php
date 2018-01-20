<?php
session_start();
$_SESSION['type'] = null;
header("Location: home.php");

?>