<?php
$sql = "SELECT * FROM  products ";

if (isset($_GET['p_id'])) {
    $id = $_GET['p_id'];
    $sql .= "WHERE product_id = '$id'";
} else {
    // find trending product id
    $sql .= "WHERE product_id = '5'";
}

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res)) {
    $data = mysqli_fetch_assoc($res);
    $images = json_decode($data['images']);
    $price = $data['price_per_unit'];
    $crossPrice = $price + ($price * (rand(0, 100) / 100))
?>
    <div class="product-featured">

        <h2 class="title">Deal of the day</h2>

        <div class="showcase-wrapper has-scrollbar">

            <div class="showcase-container">

                <div class="showcase">

                    <div class="showcase-banner">
                        <img src="./uploads/<?php echo $images[0];  ?>" alt="shampoo, conditioner & facewash packs" class="showcase-img showcase-main-img">
                        <div class="sub-showcase-images">
                            <?php
                            foreach ($images as $value) {
                                echo "<img src='./uploads/$value' class='showcase-sub-img' alt=''>";
                            }

                            ?>
                        </div>
                    </div>

                    <div class="showcase-content">

                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>

                        <a href="#">
                            <h3 class="showcase-title full-title"><?php echo $data['product_name']; ?></h3>
                        </a>

                        <p class="showcase-desc">
                            <?php echo $data['description']; ?>
                        </p>

                        <div class="price-box">
                            <p class="price">₹<?php echo $price; ?></p>

                            <del>₹<?php echo $crossPrice; ?></del>
                        </div>

                        <button class="add-cart-btn">add to cart</button>

                        <div class="showcase-status">
                            <div class="wrapper">
                                <p>
                                    already sold: <b>0</b>
                                </p>

                                <p>
                                    available: <b><?php echo $data['total_unit']. " " . $data['unit']; ?></b>
                                </p>
                            </div>

                            <div class="showcase-status-bar"></div>
                        </div>

                        <div class="countdown-box">

                            <p class="countdown-desc">
                                Hurry Up! Offer ends in:
                            </p>

                            <div class="countdown">

                                <div class="countdown-content">

                                    <p class="display-number">360</p>

                                    <p class="display-text">Days</p>

                                </div>

                                <div class="countdown-content">
                                    <p class="display-number">24</p>
                                    <p class="display-text">Hours</p>
                                </div>

                                <div class="countdown-content">
                                    <p class="display-number">59</p>
                                    <p class="display-text">Min</p>
                                </div>

                                <div class="countdown-content">
                                    <p class="display-number">00</p>
                                    <p class="display-text">Sec</p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php
} else {
    echo "<h3>Invalid product Id</h3>";
}
?>