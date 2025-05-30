<?php
session_start();

if (!isset($_SESSION['User_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("No item id specified.");
}

// get because im looking in the url

// not crazy for sql injection or url modification
$item_id = intval($_GET['id']);
$user_id = $_SESSION['User_id'];

$servername = "localhost";
$username = "root";
$password = "Antoine-972";
$database = "Troc_carrot";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the item for this user and id
$sql = "SELECT * FROM annonces WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $item_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) { // au cas où
    die("Item not found or you don't have permission to edit this item.");
}

$item = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Post</title>
    <link rel="stylesheet" href="../css/Modify.css">
    <script src="../js/preview.js"></script>

</head>

<body>
<?php
include ("../html/header.php");
?>
<div class="MiddleBox">
    <div class="annonce">

        <!-- enctype for image or else it explodes-->

        <form id="modify" action="modify-treatment.php" method="POST" enctype="multipart/form-data">
            <!-- Hidden field for item id -->
            <input type="hidden" name="id" value="<?= ($item['id']) ?>" />
            <!-- We need that for after-->

            <!-- value everywhere from $item for the user to dont forget and know what to modfy-->
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= ($item['title']) ?>" required />

            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?= ($item['price']) ?>" required />

            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="<?= ($item['description']) ?>" required/>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="<?= ($item['location']) ?>" required />

            <label for="type">Type</label>
            <input type="text" id="type" name="type" value="<?= ($item['type']) ?>" required />

            <label for="photo">Add a pic</label>
            <input type="file" id="photo" name="photo" accept="image/*">

            <?php if (!empty($item['photo'])): ?>
                <img id="img" src="<?= ($item['photo']) ?>" alt="Current photo" style="max-width: 200px; display:block; margin-top: 10px;">
            <?php endif; ?>

            <button type="submit">Save changes</button>
        </form>

        <form action="delete-treatment.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
            <input type="hidden" name="id" value="<?= ($item['id']) ?>" />
            <button type="submit">Delete this item</button>
        </form>


    </div>
</div>
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