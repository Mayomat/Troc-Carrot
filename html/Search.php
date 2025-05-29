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

// Fetch all annonces
$sql = "SELECT title, price, description, location, type, photo, created_at FROM annonces ORDER BY id DESC";
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

        <form class="caracteristique">
            <?php
            if ($result->num_rows > 0)?> <!-- to avoid having to write echo <p> etc... -->
                <p class ="MiddleBox">No annonces found for the moment ! <a href="Post.php">Be the first to post one !</a></p>

            <h3 class="searchT">What do you want to find?</h3>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" />
            <label for="place">Place:</label>
            <input type="text" name="place" id="place" />
            <div class="checkboxes">
                <input type="checkbox" name="choice" id="rent" />
                <label for="rent">Rent</label>
                <input type="checkbox" name="lend" id="lend" />
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
                echo '<p><strong>Type:</strong> ' . ($row['type']) . '</p>';
                if (!empty($row['photo'])) {
                    echo '<img src="' . ($row['photo']) . '"class=picture"' . '" alt="Annonce Image">';
                }
                echo '<button type="button" onclick="location.href=\'Home.php\'">Contact the owner!</button>';
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
            <li>Léandre Baboula</li>
            <li>Jeremy Sagnard</li>
            <li>Matthieu Sirier</li>
            <li>Maxime Duret</li>
        </ul>
    </div>
</footer>
</body>
</html>
