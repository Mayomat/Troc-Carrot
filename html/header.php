<header>

    <div class="TitleBox">
        <h1 id="titre"><a href="Home.php">Troc Carrot 🥕</a></h1>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="top-button-left">
                <div id="inventorybutton"><a href="Inventory.php">Inventory</a></div>
            </div>
        <?php endif?>
        <div class="top-button-right">
            <?php if (isset($_SESSION['username'])): ?>
                <div class="box" id="profile">
                    <a href="profile.php">Welcome, <?= htmlspecialchars($_SESSION['username']) ?></a>
                </div>
                <div class="top-button-right" id="logoutbutton">
                    <a href="logout.php">Logout</a>
                </div>
            <?php else: ?>
                <div class="box" id="signupbutton"><a href="sign-up.php">Sign Up</a></div>
                <div class="box" id="loginbutton"><a href="login.php">Login</a></div>
            <?php endif; ?>
        </div>
    </div>
</header>