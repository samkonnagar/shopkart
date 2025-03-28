<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkart - Home</title>

    <!---favicon-->

    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

    <!---custom css link-->

    <link rel="stylesheet" href="./assets/css/style-prefix.css">

    <!---google font link-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body>
    <div class="overlay" data-overlay></div>

    <!---MODAL-->

    <div class="modal" data-modal>

        <div class="modal-close-overlay" data-modal-overlay></div>

        <div class="modal-content">

            <button class="modal-close-btn" data-modal-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="newsletter-img">
                <img src="./assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
            </div>

            <div class="newsletter">

                <form action="#">

                    <div class="newsletter-header">

                        <h3 class="newsletter-title">Subscribe Newsletter.</h3>

                        <p class="newsletter-desc">
                            Subscribe the <b>Anon</b> to get latest products and discount update.
                        </p>

                    </div>

                    <input type="email" name="email" class="email-field" placeholder="Email Address" required>

                    <button type="submit" class="btn-newsletter">Subscribe</button>

                </form>

            </div>

        </div>

    </div>

    <!---NOTIFICATION TOAST-->

    <div class="notification-toast" data-toast>

        <button class="toast-close-btn" data-toast-close>
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <div class="toast-banner">
            <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
        </div>

        <div class="toast-detail">

            <p class="toast-message">
                Someone in new just bought
            </p>

            <p class="toast-title">
                Rose Gold Earrings
            </p>

            <p class="toast-meta">
                <time datetime="PT2M">2 Minutes</time> ago
            </p>

        </div>

    </div>

    <!---HEADER-->

    <header>

        <?php
        include_once './components/headers/header-top.php';
        include_once './components/headers/header-main.php';
        include_once './components/headers/navbar.php';
        ?>

    </header>

    <!---MAIN-->

    <main>

        <!---BANNER-->

        <?php include_once './components/main/banner.php' ?>

        <!---CATEGORY-->

        <?php include_once './components/main/categories.php' ?>

        <!---PRODUCT-->

        <div class="product-container">

            <div class="container">

                <!---SIDEBAR-->

                <?php include_once './components/products/category-sidebar.php' ?>

                <div class="product-box">

                    <!---PRODUCT MINIMAL-->

                    <?php include_once './components/products/product-minimal.php' ?>

                    <!---PRODUCT FEATURED-->

                    <?php include_once './components/products/product-featured.php' ?>

                    <!--- PRODUCT GRID-->

                    <?php include_once './components/products/product-main.php' ?>

                </div>

            </div>

        </div>

        <!---TESTIMONIALS, CTA & SERVICE-->

        <div>

            <div class="container">

                <div class="testimonials-box">

                    <!---TESTIMONIALS-->

                    <?php include_once './components/others/testimonial.php' ?>

                    <!---CTA-->

                    <?php include_once './components/others/cta.php' ?>

                    <!--- SERVICE-->

                    <?php include_once './components/others/service.php' ?>

                </div>

            </div>

        </div>

        <!---BLOG-->

        <?php include_once './components/blog/blog-sec.php' ?>

    </main>

    <!--- FOOTER-->

    <?php include_once './components/others/footer.php' ?>

    <!--- custom js link-->

    <script src="./assets/js/script.js"></script>

    <!-- ionicon link -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>