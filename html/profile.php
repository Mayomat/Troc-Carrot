<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

// Connect to database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all annonces
$user_id = $_SESSION['User_id'];

$sql = "SELECT * FROM annonces WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/Home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>


<body>

<?php
include ("../html/header.php")
?>
<section id="user-info">
    <h1>Welcome to your profile, <?php echo ($_SESSION['username']); ?>!</h1>
    <h2>Here are some information about your account :</h2>
    <p>Email: <?php echo ($_SESSION['email']); ?></p>
    <h3>Your inventory :</h3>
    <?php
    if ($result->num_rows===0){
        echo '<p>You have not posted for the moment !</p>';

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
            <li>Léandre Baboula</li>
            <li>Jeremy Sagnard</li>
            <li>Matthieu Sirier</li>
            <li>Maxime Duret</li>
        </ul>
    </div>
</footer>
</body>
</html>

