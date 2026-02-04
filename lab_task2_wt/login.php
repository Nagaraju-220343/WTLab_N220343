<?php
session_start();
include "db.php";
$username=$_POST["username"];
$email    = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email='$email' or username='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);
    if (strcmp($password, $user["password"]) === 0) {


        $_SESSION["username"] = $user["username"];
        header("Location: home_page.html");
        exit();
        

    } else {
        die("Wrong password ");
    }

} else {
    die("User not found ");
}


?>
