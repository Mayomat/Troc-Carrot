<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="title">
        <a href="Home.php">Troc Carrot 🥕</a>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="top-button-left">
                <div id="inventorybutton"><a href="Inventory.php">Inventory</a></div>
            </div>
        <?php endif?>
            <div class="top-button-right">
                <div class=box id="signupbutton"><a href="../html/sign-up.php">Sign up</a></div>
                <div class=box id="loginbutton"><a href="../html/login.php">Login</a></div>
                <div class=box id="profile"> <a href="">Profile</a> </div>
            </div>
    </div>

    <div class="signin-container">
        <h1>Welcome back ! 🥕</h1>
        <?php
        if (isset($_SESSION['loginconfirmation'])) {
            echo '<div style="color:red; font-weight:bold; margin-bottom:10px;">' . $_SESSION['loginconfirmation'] . '</div>';
            unset($_SESSION['loginconfirmation']);
        }
        ?>
        <form action="login-treatment.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="signin-button">Sign In</button>
        </form>
        <div class="signup-link">
            <p>Don't have an account? <a href="sign-up.php">Sign up</a></p>
        </div>
    </div>
</body>

</html>