<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->cordmanDB->cordman;

$user = $collection->findOne([
    '$or' => [
        ['email' => $email],
        ['username' => $email]
    ]
]);

if ($user) {

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
}
?>