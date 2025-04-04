<div class="header-top">

    <div class="container">

        <ul class="header-social-container">

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
            </li>

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>

            <li>
                <a href="#" class="social-link">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>

        </ul>

        <div class="header-alert-news">
            <p>
                <b>Free Shipping</b>
                This Week Order Over - $55
            </p>
        </div>

        <div class="header-top-actions">

            <?php
            require_once __DIR__."/../../utils/auth.php";
            if (authenticateAdmin()) {
            ?>
                <a href="./admin/dashboard.php">Admin dashboard</a>
            <?php
            } elseif (authenticate()) {
                echo "USER";
            } else {
            ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Signup</a>
            <?php
            }
            ?>
        </div>

    </div>

</div>