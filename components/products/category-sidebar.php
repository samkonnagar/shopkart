<?php

$sql = "SELECT category_name, image FROM `category`";
$res = mysqli_query($conn, $sql);

?>
<div class="sidebar  has-scrollbar" data-mobile-menu>

    <div class="sidebar-category">

        <div class="sidebar-top">
            <h2 class="sidebar-title">Category</h2>

            <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="sidebar-menu-category-list">

        <?php
            while ($data = mysqli_fetch_assoc($res)) {
            ?>
            <li class="sidebar-menu-category">

                <button class="sidebar-accordion-menu" data-accordion-btn>

                    <div class="menu-title-flex">
                        <img src="./uploads/categories/<?php echo $data['image']; ?>" alt="clothes" width="20" height="20"
                            class="menu-title-img">

                        <p class="menu-title"><?php echo $data['category_name']; ?></p>
                    </div>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>

                </button>

                <ul class="sidebar-submenu-category-list" data-accordion>

                    <li class="sidebar-submenu-category">
                        <a href="./category.php?category=Shirt" class="sidebar-submenu-title">
                            <p class="product-name">Shirt</p>
                            <data value="300" class="stock" title="Available Stock">300</data>
                        </a>
                    </li>

                    <li class="sidebar-submenu-category">
                        <a href="./category.php?category=shorts & jeans" class="sidebar-submenu-title">
                            <p class="product-name">shorts & jeans</p>
                            <data value="60" class="stock" title="Available Stock">60</data>
                        </a>
                    </li>

                    <li class="sidebar-submenu-category">
                        <a href="./category.php?category=jacket" class="sidebar-submenu-title">
                            <p class="product-name">jacket</p>
                            <data value="50" class="stock" title="Available Stock">50</data>
                        </a>
                    </li>

                    <li class="sidebar-submenu-category">
                        <a href="./category.php?category=dress & frock" class="sidebar-submenu-title">
                            <p class="product-name">dress & frock</p>
                            <data value="87" class="stock" title="Available Stock">87</data>
                        </a>
                    </li>

                </ul>

            </li>
            <?php
            }
            ?>
        </ul>

    </div>


</div>