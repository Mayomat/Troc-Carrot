<?php
session_start()
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Post</title>
    <link rel="stylesheet" href="../css/Modify.css">
</head>

<body>
<?php
include ("../html/header.php");
?>
    <div class="MiddleBox">
        <div class="annonce">
            <form id="modify" action="modify-treatment.php" method="POST">
                <label for="modif">What is the name of the item you want to modify?</label>
                <input type="text" id="modif" placeholder="Initial name"/>
                <label for="title">Title</label>
                <input type="text" id="title" placeholder="New name" />

                <label for="price">Price</label>
                <input type="text" id="price" placeholder="Price of the item" />

                <label for="description">Description</label>
                <input type="text" id="description" placeholder="Post description" />

                <label for="location">Location</label>
                <input type="text" id="location" name="Location" placeholder="Location" required/>

                <label for="photo">Add a pic</label>
                <input type="file" id="photo" name="photo" accept="image/*">

                <img id="img" src="../img/carrot-isolated-illustration.jpg" alt="Aperçu de la photo">

                <button type="submit">Save changes</button>
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
            <li>Léandre Baboula</li>
            <li>Jeremy Sagnard</li>
            <li>Matthieu Sirier</li>
            <li>Maxime Duret</li>
        </ul>
    </div>
</footer>
</body>
</html>
