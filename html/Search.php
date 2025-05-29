<?php
session_start()
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
<?php
include ("../html/footer.php");
?>