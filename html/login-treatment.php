<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "YourPassword";
$database = "Troc_carrot";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    $sql = "SELECT User_ID, Username FROM User_information WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $user_password);
    $stmt->execute();
    $stmt->store_result();
    $user_id = 0;
    $username = "";
    $stmt->bind_result($user_id, $username);
    if ($stmt->num_rows === 0) {
        $_SESSION['loginconfirmation'] = "No user exists with this email try <a id='redirection' href='sign-up.php'>signing up</a>";
        header("Location: login.php");
        exit();
    }

    if ($stmt->num_rows === 1) {
        $stmt->fetch();

        $_SESSION['User_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        $_SESSION['loginconfirmation'] = "Welcome back, $username !";
        header("Location: Home.php"); //http header command to redirect to a page
        exit();
    } else {
        echo "Invalid login credentials.";
    }

    $stmt->close();
    $conn->close();
}
?>
