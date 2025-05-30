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


    $message = $_POST["message"];
    $user1 = $_POST["user1"];
    $user2 = $_POST["user2"];

$sql = "SELECT Username FROM user_information WHERE User_ID = '$user1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$nameUser1 = $row['Username'];

    if (file_exists("../messages/messages_" . $user2 ."_".$user1 .".txt")) {
        $myFile = fopen("../messages/messages_" . $user2 ."_".$user1 .".txt", "a");
    }
    else {
        $myFile = fopen("../messages/messages_" . $user1 ."_".$user2 .".txt", "a");
    }

    fwrite($myFile, $nameUser1 . ": " . $message."\n");

    fclose($myFile);


