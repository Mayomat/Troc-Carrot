<?php
session_start(); // Start session

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/sign-up.css">
</head>

<body>

    <div class="title"><a href="Home.php">Troc Carrot 🥕</a>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="top-button-left">
                <div id="inventorybutton"><a href="Inventory.php">Inventory</a></div>
            </div>
        <?php endif?>
            <div class="top-button-right">
                <div class=box id="signupbutton"><a href="sign-up.php" onclick="visibiliy()">sign up</a></div>
                <div class=box id="loginbutton"><a href="login.php">login</a></div>
                <div class=box id="profile" onclick="visibility()"> <a href="">Profile</a> </div>
            </div>
    </div>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="sign-up-treatment.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <div class="form-footer">
            <p>Already have an account? <a href="login.php ">Log In</a></p>
        </div>
    </div>
</body>

</html>