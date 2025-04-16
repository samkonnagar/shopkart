<?php

$sql = "SELECT count(p.category_id) as total_products, c.category_name, c.image FROM `category` c left join products p on c.category_id = p.category_id GROUP BY c.category_id order by total_products desc LIMIT 5";
$res = mysqli_query($conn, $sql);

?>
<div class="category">

    <div class="container">

        <div class="category-item-container has-scrollbar">
            <?php
            while ($data = mysqli_fetch_assoc($res)) {
            ?>
                <div class="category-item">

                    <div class="category-img-box">
                        <img src="./uploads/categories/<?php echo $data['image']; ?>" alt="dress & frock" width="30">
                    </div>

                    <div class="category-content-box">

                        <div class="category-content-flex">
                            <h3 class="category-item-title"><?php echo $data['category_name']; ?></h3>

                            <p class="category-item-amount">(<?php echo $data['total_products']; ?>)</p>
                        </div>

                        <a href="./category.php?category=<?php echo $data['category_name']; ?>" class="category-btn">Show all</a>

                    </div>

                </div>
            <?php
            }
            ?>

        </div>

    </div>

</div>