<?php
require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"] ?? '';
    $email    = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required!";
        exit();
    }

    try {
        // Connect to MongoDB
        $client = new MongoDB\Client("mongodb://localhost:27017");

        // Select DB and Collection
        $collection = $client->cordmanDB->cordman;

        // Check duplicate email
        $existingUser = $collection->findOne(['email' => $email]);

        if ($existingUser) {
            echo "Email already exists!!!!!!    ";
            exit();
        }

        // Insert user (plain password)
        $insertResult = $collection->insertOne([
            'username' => $username,
            'email'    => $email,
            'password' => $password,
            'created_at' => new MongoDB\BSON\UTCDateTime()
        ]);

        if ($insertResult->getInsertedCount() > 0) {
            header("Location: login_page.html");
            exit();
        } else {
            echo "Error occurred!";
        }

    } catch (Exception $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>
