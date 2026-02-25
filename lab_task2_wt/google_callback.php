<?php
session_start();

// Simple .env parser
function loadEnv($path) {
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') === false) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

loadEnv(__DIR__ . '/.env');

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $clientId = $_ENV['CLIENT_ID'];
    $clientSecret = $_ENV['CLIENT_SECRET'];
    $redirectUri = 'http://localhost/WT_LABSS/lab_task2_wt/google_callback.php';

    // 1. Exchange Code for Token
    $url = 'https://oauth2.googleapis.com/token';
    $postData = [
        'code' => $code,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code'
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    $response = curl_exec($ch);
    $data = json_decode($response, true);
    curl_close($ch);

    if (isset($data['id_token'])) {
        // 2. Get User Info using the access token (simpler than manual JWT decoding)
        $userInfoUrl = 'https://www.googleapis.com/oauth2/v3/userinfo?access_token=' . $data['access_token'];
        $userInfoResponse = file_get_contents($userInfoUrl);
        $userProfile = json_decode($userInfoResponse, true);

        if (isset($userProfile['email'])) {
            $email = $userProfile['email'];
            $name  = $userProfile['name'];
            $photo = $userProfile['picture'] ?? '';

            // 3. Database Operations (Using MongoDB)
            // We use the existing vendor autoload for MongoDB
            if (file_exists('vendor/autoload.php')) {
                require 'vendor/autoload.php';
                try {
                    $mClient = new MongoDB\Client("mongodb://localhost:27017");
                    $collection = $mClient->cordmanDB->cordman;

                    $user = $collection->findOne(['email' => $email]);

                    if (!$user) {
                        $username = strtolower(str_replace(' ', '', $name)) . rand(10, 99);
                        $collection->insertOne([
                            'username' => $username,
                            'email'    => $email,
                            'auth_type' => 'google',
                            'photo' => $photo,
                            'created_at' => new MongoDB\BSON\UTCDateTime()
                        ]);
                        $_SESSION['username'] = $username;
                    } else {
                        $_SESSION['username'] = $user['username'];
                    }

                    $_SESSION['user_email'] = $email;
                    header("Location: home_page.html");
                    exit();

                } catch (Exception $e) {
                    die("Database Error: " . $e->getMessage());
                }
            } else {
                die("Vendor folder not found. Please ensure MongoDB library is available.");
            }
        }
    } else {
        die("Failed to obtain access token. Error: " . ($data['error_description'] ?? 'Unknown error'));
    }
} else {
    header("Location: login_page.html");
    exit();
}
?>