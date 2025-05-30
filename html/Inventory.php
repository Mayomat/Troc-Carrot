<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

// DB connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['User_id'];
$sql = "SELECT * FROM annonces WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Home</title>
    <link rel="stylesheet" href="../css/Inventory.css">
</head>

<body>
<?php
include ("../html/header.php");
?>
<div class="MiddleBox">
    <p>Welcome to your inventory !</p>
    <?php if ($result->num_rows === 0): ?> <!-- syntax to avoid using echo -->
        <p class="MiddleBox">Your inventory is empty ! <a href="Post.php">It's time for your first post !</a></p>
    <?php endif; ?>
</div>
<section id="update">
    <?php
    if (isset($_SESSION['modifyconfirmation'])) {
        echo '<div style="color:#251205; font-weight:bold; margin-top: 20px; margin-bottom:12px; text-align: center;">' . $_SESSION['modifyconfirmation'] . '</div>';
        unset($_SESSION['modifyconfirmation']);
    }
    ?>
</section>
<section id="itemsinventory">

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { // fetch assoc reads a line of the db
            echo '<div class="annonce-box">';
            echo '<h2>' .($row['title']). '</h2>';
            echo '<p><strong>Price:</strong> ' . ($row['price']) . '</p>';
            $date = date("F j, Y, g:i a", strtotime($row['created_at']));//string to time code
            echo '<p><strong>Posted on:</strong> ' . $date . '</p>';

            echo '<p><strong>Description:</strong> ' . ($row['description']) . '</p>';
            echo '<p><strong>Type:</strong> ' . ($row['type']) . '</p>';
            if (!empty($row['photo'])) {
                echo '<img src="' . htmlspecialchars($row['photo']) .'"class=picture"' .'" alt="Annonce Image">';
            }

            //modify button
            //urlencode to have a link with the id of the item (easier for db)
            // or rowid to directly modify link
            //ex : http://localhost:63342/Troc-Carrot/html/Modify.php?id=3
            echo '<a class="modify" href="Modify.php?id=' . $row['id'] . '" class="modify-button">Modify</a>';

            echo '</div>';
        }
    }
    $conn->close();
    ?>
    </section>
<footer>
    <div class="footermiddle">
        <h4>© 2025 Troc Carrot.</h4>
    </div>
    <div class="footerright">
        <ul>
            <li>
                <h3>Made by the greatest Int1 team:</h3>
            </li>
            <li>Rémi Pyt</li>
            <li>Antoine Richard</li>
            <li>Léandre Baboulat</li>
            <li>Jeremy Sagnard</li>
            <li>Matthieu Sirier</li>
            <li>Maxime Duret</li>
        </ul>
    </div>
</footer>
</body>
</html>
