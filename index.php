<?php
require_once './config/connection.php';
?>
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
    <?php
    session_start();
    include_once './utils/message.php';
    getMessageClient()
    ?>
    <div class="overlay" data-overlay></div>

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

    </main>

    <!--- FOOTER-->

    <?php include_once './components/others/footer.php' ?>

    <!--- custom js link-->

    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/product.js"></script>

    <!-- ionicon link -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>