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
            <img id="img" src="../img/carrot-isolated-illustration.jpg" alt="carrot illustration">
        </div>
        <div class="annonce">
            <button id="modify"><a href="Modify.php">Modify</a></button>
            <div id="titre">Location lot carrotv2</div>
            <div id="Price">2€</div>
            <hr>
            <img id="img" src="../img/carrotcarrot.jpg" alt="carrotjpg">
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
