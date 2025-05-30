<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

// Connect to database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user1 = $_SESSION['User_id'];

$sql = "SELECT id1, id2 FROM chattedwith WHERE id1 = '$user1' OR id2 = '$user1'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Home</title>
    <link rel="stylesheet" href="../css/everyChat.css">
</head>

<body>
<?php
include("header.php")
?>
<div id="chats">


<?php
if ($result->num_rows ===0){
    echo'<div class="MiddleBox">';
    echo'<p> No conversation for the moment !';
    echo'</div>';
}
else {
    while ($row = $result->fetch_assoc()) {
        // Get the other user's ID
        $idUser = ($row['id1'] == $user1) ? $row['id2'] : $row['id1'];

        // Now fetch the Username of the other user
        $userSql = "SELECT Username FROM user_information WHERE User_ID = '$idUser'";
        $userResult = $conn->query($userSql);

        if ($userResult && $userResult->num_rows > 0) {
            $userRow = $userResult->fetch_assoc();
            $nameUser = htmlspecialchars($userRow['Username'], ENT_QUOTES, 'UTF-8');


            echo '<div class="message-box">';
            echo '<form action="chatPage.php" method="post">';
            echo '<input type="hidden" name="user2" value="' . htmlspecialchars($idUser, ENT_QUOTES, 'UTF-8') . '">';
            echo '<button type="submit">Chat with ' . $nameUser . '</button>';
            echo '</form>';
            echo '</div>';
        }
    }
}

?>
</div>
