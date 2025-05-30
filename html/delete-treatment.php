<?php
session_start();
$item_id = intval($_POST['id']);
$user_id = $_SESSION['User_id'];

$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM annonces WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $item_id);

if ($stmt->execute()) {
    $_SESSION['modifyconfirmation'] = "Item deleted successfully.";
} else {
    $_SESSION['modifyconfirmation'] = "Error deleting item: " . $stmt->error;
    }

$stmt->close();
$conn->close();

header("Location: Inventory.php");
exit();
?>