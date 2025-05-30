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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    // Check if username or email already exists
    $checkSql = "SELECT User_ID FROM User_information WHERE Username = ? OR Email = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['signup_error'] = "Username or email already exists. Please choose a different one. 
        Or try <a id='redirection' href='login.php'>logging in</a>";
        header("Location: sign-up.php");
        exit();
    }

    else {
        // Insert new user
        $sql = "INSERT INTO User_information (Username, Email, Password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $user_password);

        if ($stmt->execute()) {
            // Set session variables (pour toi jérémy)
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // to get user id VERY IMPORTANT
            $user_id = $conn->insert_id;
            $_SESSION['User_id'] = $user_id;
            $_SESSION['signup_confirmation']= "Welcome, $username!";
            header("Location: Home.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>