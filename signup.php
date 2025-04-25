<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkart - Signup</title>
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
        <form class="sign-up" action="./handlers/handle.signup.php" method="post">
            <h1 class="heading">Sign Up</h1>

            <div class="text">
                <img src="https://i.postimg.cc/1zgS8WTF/user.png" alt="icon" height="20">
                <input type="text" placeholder="Fullname" name="fullname">
            </div>

            <div class="text">
                <img src="https://i.postimg.cc/1zgS8WTF/user.png" alt="icon" height="20">
                <input type="text" placeholder="Username" name="username">
            </div>

            <div class="text">
                <img src="https://i.postimg.cc/DZBPRgvC/email.png" alt="icon" height="12">
                <input type="email" placeholder="Email" name="email">
            </div>

            <div class="text">
                <img src="https://i.postimg.cc/Nj5SDK4q/password.png" alt="icon" height="20">
                <input type="password" placeholder="Password" name="password">
            </div>

            <div class="text">
                <img src="https://i.postimg.cc/Nj5SDK4q/password.png" alt="icon" height="20">
                <input type="password" placeholder="Repeat Password" name="c_password">
            </div>

            <button class="submit-btn" type="submit">CREATE ACCOUNT</button>
            <p class="conditions">Already have an account? <a href="./login.php">Log in</a></p>

        </form>

        <div class="text-container">
            <h1>Shopkart</h1>
            <p>Join now for exclusive deals, fast checkout, and a seamless shopping experience!</p>
        </div>
    </div>

    <script src="./assets/js/script.js"></script>
</body>

</html>