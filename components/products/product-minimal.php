<?php

$sql = "SELECT p.product_id, p.images, p.product_name, c.category_name, p.price_per_unit FROM `category` c join products p on c.category_id = p.category_id order by p.created_at desc LIMIT 8";
$res = mysqli_query($conn, $sql);

?>
<div class="product-minimal">

    <div class="product-showcase">

        <h2 class="title">New Arrivals</h2>

        <div class="showcase-wrapper has-scrollbar">

            <div class="showcase-container">
                <?php
                $no = 0;
                while ($data = mysqli_fetch_assoc($res)) {
                    $images = json_decode($data['images']);
                    $price = $data['price_per_unit'];
                    $crossPrice = $price + ($price * (rand(0, 100) / 100))
                ?>
                <div class="showcase">

                    <a href="./product-page.php?p_id=<?php echo $data['product_id']?>" class="showcase-img-box">
                        <img src="./uploads/<?php echo $images[0]; ?>" alt="relaxed short full sleeve t-shirt" height="70" width="70" class="showcase-img">
                    </a>

                    <div class="showcase-content">

                        <a href="./product-page.php?p_id=<?php echo $data['product_id']?>">
                            <h4 class="showcase-title"><?php echo $data['product_name']; ?></h4>
                        </a>

                        <a href="./category.php?category=<?php echo $data['category_name']; ?>" class="showcase-category">
                            <?php echo $data['category_name']; ?>
                        </a>

                        <div class="price-box">
                            <p class="price">₹<?php echo $price; ?></p>
                            <del>₹<?php echo $crossPrice; ?></del>
                        </div>

                    </div>

                </div>
                
                <?php
                $no++;
                if ($no === 4) {
                    echo '</div>
                    <div class="showcase-container">';
                }
                }
                ?>
            </div>

        </div>

    </div>

    <div class="product-showcase">

        <h2 class="title">Trending</h2>

        <div class="showcase-wrapper  has-scrollbar">

            <div class="showcase-container">

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/sports-1.jpg" alt="running & trekking shoes - white" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Running & Trekking Shoes - White</h4>
                        </a>

                        <a href="#" class="showcase-category">Sports</a>

                        <div class="price-box">
                            <p class="price">$49.00</p>
                            <del>$15.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/sports-2.jpg" alt="trekking & running shoes - black" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Trekking & Running Shoes - black</h4>
                        </a>

                        <a href="#" class="showcase-category">Sports</a>

                        <div class="price-box">
                            <p class="price">$78.00</p>
                            <del>$36.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/party-wear-1.jpg" alt="womens party wear shoes" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Womens Party Wear Shoes</h4>
                        </a>

                        <a href="#" class="showcase-category">Party wear</a>

                        <div class="price-box">
                            <p class="price">$94.00</p>
                            <del>$42.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/sports-3.jpg" alt="sports claw women's shoes" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Sports Claw Women's Shoes</h4>
                        </a>

                        <a href="#" class="showcase-category">Sports</a>

                        <div class="price-box">
                            <p class="price">$54.00</p>
                            <del>$65.00</del>
                        </div>

                    </div>

                </div>

            </div>

            <div class="showcase-container">

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/sports-6.jpg" alt="air tekking shoes - white" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Air Trekking Shoes - white</h4>
                        </a>

                        <a href="#" class="showcase-category">Sports</a>

                        <div class="price-box">
                            <p class="price">$52.00</p>
                            <del>$55.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/shoe-3.jpg" alt="Boot With Suede Detail" class="showcase-img" width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Boot With Suede Detail</h4>
                        </a>

                        <a href="#" class="showcase-category">boots</a>

                        <div class="price-box">
                            <p class="price">$20.00</p>
                            <del>$30.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/shoe-1.jpg" alt="men's leather formal wear shoes" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Men's Leather Formal Wear shoes</h4>
                        </a>

                        <a href="#" class="showcase-category">formal</a>

                        <div class="price-box">
                            <p class="price">$56.00</p>
                            <del>$78.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/shoe-2.jpg" alt="casual men's brown shoes" class="showcase-img" width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Casual Men's Brown shoes</h4>
                        </a>

                        <a href="#" class="showcase-category">Casual</a>

                        <div class="price-box">
                            <p class="price">$50.00</p>
                            <del>$55.00</del>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="product-showcase">

        <h2 class="title">Top Rated</h2>

        <div class="showcase-wrapper  has-scrollbar">

            <div class="showcase-container">

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/watch-3.jpg" alt="pocket watch leather pouch" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Pocket Watch Leather Pouch</h4>
                        </a>

                        <a href="#" class="showcase-category">Watches</a>

                        <div class="price-box">
                            <p class="price">$50.00</p>
                            <del>$34.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/jewellery-3.jpg" alt="silver deer heart necklace" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Silver Deer Heart Necklace</h4>
                        </a>

                        <a href="#" class="showcase-category">Jewellery</a>

                        <div class="price-box">
                            <p class="price">$84.00</p>
                            <del>$30.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/perfume.jpg" alt="titan 100 ml womens perfume" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Titan 100 Ml Womens Perfume</h4>
                        </a>

                        <a href="#" class="showcase-category">Perfume</a>

                        <div class="price-box">
                            <p class="price">$42.00</p>
                            <del>$10.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/belt.jpg" alt="men's leather reversible belt" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Men's Leather Reversible Belt</h4>
                        </a>

                        <a href="#" class="showcase-category">Belt</a>

                        <div class="price-box">
                            <p class="price">$24.00</p>
                            <del>$10.00</del>
                        </div>

                    </div>

                </div>

            </div>

            <div class="showcase-container">

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/jewellery-2.jpg" alt="platinum zircon classic ring" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">platinum Zircon Classic Ring</h4>
                        </a>

                        <a href="#" class="showcase-category">jewellery</a>

                        <div class="price-box">
                            <p class="price">$62.00</p>
                            <del>$65.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/watch-1.jpg" alt="smart watche vital plus" class="showcase-img" width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Smart watche Vital Plus</h4>
                        </a>

                        <a href="#" class="showcase-category">Watches</a>

                        <div class="price-box">
                            <p class="price">$56.00</p>
                            <del>$78.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/shampoo.jpg" alt="shampoo conditioner packs" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">shampoo conditioner packs</h4>
                        </a>

                        <a href="#" class="showcase-category">cosmetics</a>

                        <div class="price-box">
                            <p class="price">$20.00</p>
                            <del>$30.00</del>
                        </div>

                    </div>

                </div>

                <div class="showcase">

                    <a href="#" class="showcase-img-box">
                        <img src="./assets/images/products/jewellery-1.jpg" alt="rose gold peacock earrings" class="showcase-img"
                            width="70">
                    </a>

                    <div class="showcase-content">

                        <a href="#">
                            <h4 class="showcase-title">Rose Gold Peacock Earrings</h4>
                        </a>

                        <a href="#" class="showcase-category">jewellery</a>

                        <div class="price-box">
                            <p class="price">$20.00</p>
                            <del>$30.00</del>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>