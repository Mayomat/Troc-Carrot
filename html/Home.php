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
    <script src="../js/Home.js"></script>
</head>

<body>
<?php
include ("../html/header.php")
?>
    <main class="MiddleBox">
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

<?php
    include ("../html/footer.php");
?>