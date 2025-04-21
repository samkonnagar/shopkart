<?php

$sql = "SELECT p.product_id, p.images, p.product_name, c.category_name, p.price_per_unit FROM `category` c join products p on c.category_id = p.category_id ";

if (isset($_GET['category'])) {
    $cat = $_GET['category'];
    $sql .= "WHERE c.category_name = '$cat'";
    if (isset($_GET['sub_cat'])) {
        $sub_cat = $_GET['sub_cat'];
        $sql .= " AND FIND_IN_SET('$sub_cat', REPLACE(tags, ' ', ''))";
        if (isset($_GET['sub_s_cat'])) {
            $sub_s_cat = $_GET['sub_s_cat'];
            $sql .= " AND FIND_IN_SET('$sub_s_cat', REPLACE(tags, ' ', ''))";
        }
    }
} else {
    $sql .= "order by p.created_at desc LIMIT 12";
}

$res = mysqli_query($conn, $sql);

?>
<div class="product-main">

    <h2 class="title">New Products</h2>

    <div class="product-grid">
        <?php
        if (mysqli_num_rows($res)) {
            while ($data = mysqli_fetch_assoc($res)) {
                $images = json_decode($data['images']);
                $price = $data['price_per_unit'];
                $crossPrice = $price + ($price * (rand(0, 100) / 100))
        ?>

                <div class="showcase">

                    <div class="showcase-banner">
                        <img src="./uploads/<?php echo $images[0]; ?>" alt="Product image"
                            class="product-img default" width="300">
                        <img src="./uploads/<?php echo $images[1]; ?>" alt="Product image"
                            class="product-img hover" width="300">

                        <div class="showcase-actions">
                            <button class="btn-action">
                                <ion-icon name="heart-outline"></ion-icon>
                            </button>

                            <button class="btn-action">
                                <a href="./product-page.php?p_id=<?php echo $data['product_id'] ?>">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                            </button>

                            <button class="btn-action">
                                <ion-icon name="repeat-outline"></ion-icon>
                            </button>

                            <button class="btn-action">
                                <ion-icon name="bag-add-outline"></ion-icon>
                            </button>
                        </div>
                    </div>

                    <div class="showcase-content">
                        <a href="./category.php?category=<?php echo $data['category_name']; ?>" class="showcase-category"><?php echo $data['category_name']; ?></a>

                        <h3>
                            <a href="./product-page.php?p_id=<?php echo $data['product_id'] ?>" class="showcase-title"><?php echo $data['product_name']; ?></a>
                        </h3>

                        <div class="showcase-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>

                        <div class="price-box">
                            <p class="price">₹<?php echo $price; ?></p>
                            <del>₹<?php echo $crossPrice; ?></del>
                        </div>

                    </div>

                </div>
            <?php
            }
        } else {
            ?>
            <h3>No Match Found</h3>
        <?php
        }
        ?>
    </div>

</div>