<?php
session_start()
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
        <div class="annonce">
            <button id="modify"><a href="Modify.php">Modify</a></button>
            <div id="titre">Location one carrot</div>
            <div id="Price">1€</div>
            <hr>
            <img id="img" src="../img/carrot-isolated-illustration.jpg">
        </div>
        <div class="annonce">
            <button id="modify"><a href="Modify.php">Modify</a></button>
            <div id="titre">Location lot carrotv2</div>
            <div id="Price">2€</div>
            <hr>
            <img id="img" src="../img/carrotcarrot.jpg">
        </div>
        
    </div>
<?php
include ("../html/footer.php");
?>