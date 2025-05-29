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
            <form id="modify">
                <label for="title">Title</label>
                <input type="text" id="title" placeholder="Titre du post" />

                <label for="price">Price</label>
                <input type="text" id="price" placeholder="Price of the item" />

                <label for="description">Description</label>
                <input type="text" id="description" placeholder="Post description" />

                <label for="photo">Add a pic</label>
                <input type="file" id="photo" name="photo" accept="image/*">

                <img id="img" src="../img/carrot-isolated-illustration.jpg" alt="Aperçu de la photo">

                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
<?php
include ("../html/footer.php");
?>