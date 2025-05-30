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

// Initialize filter variables
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$place = isset($_POST['place']) ? trim($_POST['place']) : '';

// Build SQL query dynamically
$sql = "SELECT title, price, description, location, type, photo, created_at, user_id FROM annonces WHERE 1";

if (!empty($name)) {
    $sql .= " AND title LIKE '%" . $conn->real_escape_string($name) . "%'";
}
if (!empty($place)) {
    $sql .= " AND location LIKE '%" . $conn->real_escape_string($place) . "%'";
}
$typeArray = isset($_POST['type']) ? $_POST['type'] : [];

if (!empty($typeArray)) {
    $safeTypes = array_map([$conn, 'real_escape_string'], $typeArray);
    $quotedTypes = array_map(function ($t) {
        return "'" . $t . "'";
    }, $safeTypes);
    $sql .= " AND type IN (" . implode(',', $quotedTypes) . ")";
}


$sql .= " ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Search</title>
    <link rel="stylesheet" href="../css/Search.css">
</head>

<body>
<?php
include ("../html/header.php");
?>
    <div class="MiddleBox">

        <form method="POST" class="caracteristique" action="Search.php">
            <?php if ($result->num_rows === 0): ?> <!-- syntax to avoid using echo -->
                <p class="MiddleBox">No annonces found for the moment. <a href="Post.php">Be the first one to post!</a></p>
            <?php endif; ?>

            <h3 class="searchT">What do you want to find?</h3>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" />
            <label for="place">Place:</label>
            <input type="text" name="place" id="place" />
            <div class="checkboxes">
                <input type="checkbox" name="type[]" id="rent" value="Renting" <?php if (isset($_POST['type']) && in_array('Rent', $_POST['type'])) echo 'checked'; ?> />
                <label for="rent">Rent</label>

                <input type="checkbox" name="type[]" id="lend" value="Loaning" <?php if (isset($_POST['type']) && in_array('Lend', $_POST['type'])) echo 'checked'; ?> />
                <label for="lend">Lend</label>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <section id="allposts">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { // fetch assoc reads a line of the db

                echo '<div class="annonce-box">';
                echo '<h2>' . ($row['title']) . '</h2>';
                echo '<p><strong>Price:</strong> ' . ($row['price']) . '</p>';
                $date = date("F j, Y, g:i a", strtotime($row['created_at']));//string to time code
                echo '<p><strong>Posted on:</strong> ' . $date . '</p>';

                echo '<p><strong>Description:</strong> ' . ($row['description']) . '</p>';
                echo '<p><strong>Location:</strong>'.($row['location']).'</p>';
                echo '<p><strong>Type:</strong> ' . ($row['type']) . '</p>';
                if (!empty($row['photo'])) {
                    echo '<img src="' . ($row['photo']) . '"class=picture"' . '" alt="Annonce Image">';
                }
                if (isset($_SESSION['username'])) {
                    echo '<form action="chatPage.php" method="post">
            <input type="hidden" name="user2" value="' . htmlspecialchars($row['user_id']) . '">
            <button type="submit">Contact the owner!</button>
          </form>';
                } else {
                    echo '<p><a href="sign-up.php">Sign in to send a message</a></p>';
                }
                echo '</div>';

            }


            $conn->close();
        }
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
