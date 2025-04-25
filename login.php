<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkart - Login</title>
    <link rel="stylesheet" href="./assets/css/style-prefix.css">
    <link rel="stylesheet" href="./assets/css/auth.css">
</head>
<body>
<?php
    session_start();
    include_once './utils/message.php';
    getMessageClient()
    ?>
    <div class="container">
        <form class="sign-up" action="./handlers/handle.login.php" method="post">
            <h1 class="heading">Log In</h1>


            <div class="text">
                <img src="https://i.postimg.cc/DZBPRgvC/email.png" alt="icon" height="12">
                <input type="email" placeholder="Email" name="email">
            </div>

            <div class="text">
                <img src="https://i.postimg.cc/Nj5SDK4q/password.png" alt="icon" height="20">
                <input type="password" placeholder="Password" name="password">
            </div>

            <button class="submit-btn" type="submit">Log In</button>
            <p class="conditions">Don't have an account? <a href="./signup.php">Sign Up</a></p>

        </form>

        <div class="text-container">
            <h1>Shopkart</h1>
            <p>Secure your cart, shop with confidence - login now!</p>
        </div>
    </div>
    <script src="./assets/js/script.js"></script>
</body>
</html>