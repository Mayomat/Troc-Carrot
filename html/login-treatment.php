<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"]=="POST") { //to be sure its post and not get

    $email = $_POST['email'];
    $user_password = $_POST['password'];

    // Fetch user
    $sql = "SELECT Username FROM User_information WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $user_password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($username);
        $stmt->fetch();

        // Set session
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        echo "Login successful. Welcome back, $username!";
        header("Location: Home.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }

    $stmt->close();
    $conn->close();
}
?>
