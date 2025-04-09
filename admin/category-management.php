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
    <h1>Add New Category</h1>
    <form id="productForm" action="./admin-handlers/handle.category.php" method="post">
        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <div class="button-row">
            <button type="submit" style="background-color: #5cb85c; color: white;">Add Category</button>
        </div>
    </form>
    <h2>Product List</h2>
    <table id="productTable">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT `category_name`, `description` FROM `category`";
            $res = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?php echo $data['category_name'] ?></td>
                <td><?php echo $data['description'] ?></td>
                <td>
                    <button onclick="deleteProduct(this)" style="background-color: #d9534f; color: white;">Delete</button>
                    <button onclick="updateProduct(this)" style="background-color: #5bc0de; color: white;">Update</button>
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