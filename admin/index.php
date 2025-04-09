<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/login.css" />
    <link rel="stylesheet" href="../assets/css/popup.css">
  </head>

  <body>
    <!-- Header -->
    <?php 
    session_start();
    include_once '../utils/message.php';
    getMessage();
    include_once './components/headers/top-header.php'
     ?>

    <!-- Login Form -->
    <main>
      <section class="login-container">
        <h1>Login</h1>
        <form id="login-form" action="./admin-handlers/handle.login.php" method="post">
          <label for="username">Username/Email:</label>
          <input type="text" id="username" name="username" required />

          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required />

          <button type="submit" id="login-button">Login</button>
          <p id="loading-message" style="display: none; color: blue">
            Logging in...
          </p>
        </form>
        <p id="login-message" class="login-message"></p>
      </section>
    </main>

    <!-- Footer -->
    <?php include_once './components/others/footer.php' ?>
  </body>
</html>
