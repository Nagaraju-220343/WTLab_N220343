<!-- <?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email    = $_POST["email"];
    $password = $_POST["password"];

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required!";
        exit();
    }


    // Check duplicate email
    $check = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists!";
        exit();
    }

    // Insert user
    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: home_page.html");
        exit();
       
    } else {
        echo "Error occurred!";
    }
}
?> -->
