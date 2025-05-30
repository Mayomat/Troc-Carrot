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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $photoPath = null;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $safeName = time() . '_' . basename($_FILES['photo']['name']);
        $destPath = $uploadDir . $safeName;
        move_uploaded_file($_FILES['photo']['tmp_name'], $destPath);
        $photoPath = $destPath;
    }

    // verify for photo
    if ($photoPath) {
        // update syntax
        $sql = "UPDATE annonces SET title=?, price=?, description=?, location=?, type=?, photo=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $title, $price, $description, $location, $type, $photoPath, $id);
    } else {
        $sql = "UPDATE annonces SET title=?, price=?, description=?, location=?, type=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $title, $price, $description, $location, $type, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['modifyconfirmation'] = "Annonce updated successfully!";
        header("Location: ../html/Inventory.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
