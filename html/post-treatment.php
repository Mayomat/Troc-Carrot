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

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = $_POST['title'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    // Handle photo upload (merci les ia et internet)
    $photoPath = NULL;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = basename($_FILES['photo']['name']);
        $safeFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $fileName);
        $destPath = $uploadDir . $safeFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $photoPath = $destPath;
        }
    }

    // verify we handled photo
    if ($photoPath !== NULL) {
        $sql = "INSERT INTO annonces (title, price, description, location,type, photo) VALUES (?, ?, ?,?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("ssssss", $title, $price, $description, $location,$type, $photoPath);
    } else {
        $sql = "INSERT INTO annonces (title, price, description, location, type) VALUES (?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $price, $description, $location,$type);
    }

    if ($stmt->execute()) {
        $_SESSION['postconfirmation'] ="Your annonce has been posted !";
        header("Location: Post.php");
        exit();
    } else {
        echo "Error posting annonce: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
