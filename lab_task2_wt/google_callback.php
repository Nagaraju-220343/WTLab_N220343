<?php
require_once 'vendor/autoload.php';
session_start();
include 'db.php'; // your existing database connection

$client = new Google_Client();
$client->setClientId('CLIENT_ID');
$client->setClientSecret('CLIENT_SECRET');
$client->setRedirectUri('http://localhost/yourproject/google_callback.php');

$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_service = new Google_Service_Oauth2($client);
    $data = $google_service->userinfo->get();

    $email = $data->email;
    $name  = $data->name;
    $photo = $data->picture;

    // 🔴 CHECK USER EXISTS
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) > 0) {

        // LOGIN EXISTING USER
        $user = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

    } else {

        // SIGNUP NEW USER
        mysqli_query($conn,
        "INSERT INTO users(name,email,photo,auth_type)
         VALUES('$name','$email','$photo','google')");

        $user_id = mysqli_insert_id($conn);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
    }

    header("Location: home_page.html");
    exit();
}
?>