<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Post</title>
    <link rel="stylesheet" href="../css/Post.css">
    <script src="../js/preview.js"></script>
</head>

<body>
<?php
include ("../html/header.php");
?>
<div class="MiddleBox">
    <div class="annonce">

        <?php
        if (isset($_SESSION['postconfirmation'])) {
            echo '<div style="color:#251205; font-weight:bold; margin-top: 20px; margin-bottom:12px; text-align: center;">' . $_SESSION['postconfirmation'] . '</div>';
            unset($_SESSION['postconfirmation']);
        }

        if (isset($_SESSION['username'])) {
            // Show form only if user is logged in
            ?>
                <!-- enctype for image or else it explodes-->
            <form id="annonceForm" method="POST" enctype="multipart/form-data" action="post-treatment.php">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Titre du post" required />

                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Price of the item" required />

                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Post description" required />

                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Location" required/>

                <p style="font-weight:bold">Would you like to rent or loan?</p>

                <label>
                    <input type="radio" name="type" value="Renting" required/>
                    Renting
                </label>

                <label>
                    <input type="radio" name="type" value="Loaning" />
                    Loaning
                </label>

                <label for="photo">Add a pic</label>
                <input type="file" id="photo" name="photo" accept="image/*" />

                <img id="img" src="../img/carrot-isolated-illustration.jpg" alt="Aperçu de la photo" />

                <button type="submit">Post your annonce</button>
            </form>
            <?php
        } else {
            // User is not logged in
            echo '<p style="color: red; font-weight: bold; text-align: center;">You must be logged in to post an annonce.</p>';
            echo '<p style="text-align: center;"><a href="sign-up.php">Sign in here</a></p>';
        }
        ?>

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
