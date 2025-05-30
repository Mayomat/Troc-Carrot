<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="../css/header.css">


<header>

    <div class="TitleBox">
        <h1 id="titre"><a href="Home.php">Troc Carrot 🥕</a></h1>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="top-button-left">
            <div class="header-button"><a href="Inventory.php">Inventory</a></div>
            <div class="header-button"><a href="everyChat.php">Chat</a></div>
        </div>


        <?php endif?>
        <div class="top-button-right">
            <?php if (isset($_SESSION['username'])): ?>
                <div id="profile">
                    <a href="profile.php">Your account</a>
                </div>
                <div id="logoutbutton">
                    <a href="logout.php">Logout</a>
                </div>
            <?php else: ?>
                <div id="signupbutton">
                    <a href="sign-up.php">Sign Up</a>
                </div>
                <div id="loginbutton">
                    <a href="login.php">Login</a>
                </div>
            <?php endif; ?>
        </div>


    </div>
</header>