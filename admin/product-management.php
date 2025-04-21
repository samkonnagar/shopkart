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
    <link rel="stylesheet" href="../assets/css/popup.css">
</head>

<body>
    <?php
    include_once '../utils/message.php';
    getMessage();
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
        <select id="unit" name="unit">
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
        <select id="category" name="category_id">
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

        <label for="tags">Tags:</label>
        <input type="text" id="tags" name="tags" placeholder="Enter tags (comma separated)">

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
                <th>Product Name</th>
                <th>Price</th>
                <th>Stocks Avaliable</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT `product_id`, `product_name`, `images`, `description`, `price_per_unit`, `unit`, `total_unit` FROM `products`";
            $res = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($res)) {
                $image = json_decode($data['images'])[0];
            ?>
                <tr>
                    <td><?php echo $data['product_name']; ?></td>
                    <td><?php echo $data['price_per_unit']; ?></td>
                    <td><?php echo $data['total_unit']. " ". $data['unit']; ?></td>
                    <td><?php echo $data['description']; ?></td>
                    <td><img src="../uploads/<?php echo $image; ?>" alt="Product Image" style="width: 75px;"></td>
                    <td>
                        <button style="background-color: #d9534f; color: white;">Delete</button>
                        <button style="background-color: #5bc0de; color: white;">Update</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php include_once './components/others/footer.php' ?>
</body>

</html>