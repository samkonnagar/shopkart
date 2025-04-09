<?php
session_start();
require_once '../utils/auth.php';
require_once '../utils/message.php';
require_once '../config/connection.php';

if (!authenticateAdmin()) {
    setMessage('../', "error", "Not Authorized");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/product-management.css"> <!-- Link styles -->
</head>

<body>
    <?php
    include_once './components/headers/top-header.php';
    include_once './components/headers/navbar.php';
    ?>
    <h1>Add Products</h1>
    <form id="productForm" action="./admin-handlers/handle.product.php" method="post" enctype="multipart/form-data">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="price">Price per unit:</label>
        <input type="number" id="price" name="price" required>

        <label for="unit">Unit:</label>
        <select id="unit">
            <option value="piece">Piece</option>
            <option value="kg">Kilogram </option>
            <option value="g">Gram</option>
            <option value="l">Liter</option>
            <option value="ml">Milliliter</option>
            <option value="meter">Meter</option>
            <option value="square meter">Square Meter</option>
            <option value="dozen">Dozen</option>
            <option value="pair">Pair</option>
        </select>

        <label for="total_unit">Total Unit:</label>
        <input type="number" id="total_unit" name="total_unit">

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="category">Category:</label>
        <select id="category">
        <?php
            $sql = "SELECT `category_id`,`category_name` FROM `category`";
            $res = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($res)) {
            ?>
            <option value="<?php echo $data['category_id'] ?>"><?php echo $data['category_name'] ?></option>
            <?php
            }
            ?>
        </select>

        <label for="productImage">Product Image:</label>
        <input type="file" id="productImage" name="productImage[]" multiple accept="image/*">

        <div class="button-row">
            <button type="submit" style="background-color: #5cb85c; color: white;">Add Product</button>
        </div>
    </form>
    <h2>Product List</h2>
    <table id="productTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Shipping Charges</th>
                <th>Specifications</th>
                <th>Return Policy</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>iPhone 14</td>
                <td>Apple</td>
                <td>999</td>
                <td>899</td>
                <td>20</td>
                <td>128GB, A15 Bionic Chip</td>
                <td>Return within 14 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Galaxy S23</td>
                <td>Samsung</td>
                <td>799</td>
                <td>749</td>
                <td>15</td>
                <td>256GB, Snapdragon 8 Gen 2</td>
                <td>Return within 30 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Pixel 7</td>
                <td>Google</td>
                <td>599</td>
                <td>549</td>
                <td>10</td>
                <td>128GB, Google Tensor G2</td>
                <td>Return within 15 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Xperia 1 IV</td>
                <td>Sony</td>
                <td>1199</td>
                <td>1099</td>
                <td>25</td>
                <td>256GB, 4K OLED Display</td>
                <td>Return within 10 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>OnePlus 11</td>
                <td>OnePlus</td>
                <td>699</td>
                <td>649</td>
                <td>20</td>
                <td>256GB, Snapdragon 8 Gen 2</td>
                <td>Return within 7 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Redmi Note 12</td>
                <td>Xiaomi</td>
                <td>299</td>
                <td>279</td>
                <td>10</td>
                <td>128GB, AMOLED Display</td>
                <td>Return within 14 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Find X5 Pro</td>
                <td>Oppo</td>
                <td>999</td>
                <td>949</td>
                <td>20</td>
                <td>256GB, Hasselblad Camera</td>
                <td>Return within 30 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Vivo X90</td>
                <td>Vivo</td>
                <td>799</td>
                <td>749</td>
                <td>15</td>
                <td>256GB, Zeiss Optics</td>
                <td>Return within 20 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Realme GT 3</td>
                <td>Realme</td>
                <td>499</td>
                <td>469</td>
                <td>10</td>
                <td>128GB, 240W Charging</td>
                <td>Return within 7 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
            <tr>
                <td>Razor Phone 2</td>
                <td>Razer</td>
                <td>699</td>
                <td>649</td>
                <td>15</td>
                <td>64GB, 120Hz Display</td>
                <td>Return within 10 days</td>
                <td><img src="black.png" alt="Product Image" style="width: 50px; height: 50px;"></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
                </td>
            </tr>
        </tbody>
    </table>

    <?php include_once './components/others/footer.php' ?>
</body>

</html>