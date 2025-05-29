<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troc Carrot - Home</title>
    <link rel="stylesheet" href="../css/Home.css">
</head>

<body>
<?php
include ("../html/header.php")
?>

    <main class="MiddleBox">
        <?php
        if (isset($_SESSION['signup_confirmation'])) {
            echo '<div style="color:#251205; font-weight:bold; margin-bottom:12px; text-align: center; font-size:40px;">' . $_SESSION['signup_confirmation'] . '</div>';
            unset($_SESSION['signup_confirmation']);
        }
        ?>

        <?php
        if (isset($_SESSION['loginconfirmation'])) {
            echo '<div style="color:#251205; font-weight:bold; margin-bottom:12px; text-align: center; font-size:40px;">' . $_SESSION['loginconfirmation'] . '</div>';
            unset($_SESSION['loginconfirmation']);
        }
        ?>
        <div class="lend">
            <div class="text1">You don't have it ?</div>
            <div class="text2">
                <div class="blackT">Find</div> it
            </div>
            <div id="button1">
                <button type="submit"><a href="Search.php">Search</a></button>
            </div>
            <div id="button2">
                <button type="submit"><a href="Post.php">Post</a></button>
            </div>
        </div>
        <div class="post">
            <div class="text1">You don't use it ?</div>
            <div class="text2">
                <div class="blackT">Lend</div> it
            </div>
            <div class="button">
                <!-- Ajoutez du contenu ici si nécessaire -->
            </div>
        </div>
    </main>
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
