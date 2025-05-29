<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"]=="POST") { //to be sure its post and not get
    $name = $_POST['username'];
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    // Insert new user
    $sql = "INSERT INTO User_information (Username, Email, Password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $user_password);

    if ($stmt->execute()) {
    // Set session variables (pour toi jérémy)
    $_SESSION['username'] = $name;
    $_SESSION['email'] = $email;
    echo "Account created and session started. Welcome, $name!";
    header("Location: Home.php");
    exit();
    } else {
    echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>