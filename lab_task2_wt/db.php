<?php
$host = "127.0.0.1:3307";
$user = "root";
$pass = "";
$db   = "cordman";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed!");
}
?>
