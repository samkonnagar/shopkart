<?php
session_start();
require_once '../../config/connection.php';
require_once '../../utils/message.php';
require_once '../../utils/filters.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $productName = filterInput($_POST['productName']);
    $price = filterInput($_POST['price']);
    $unit = filterInput($_POST['unit']);
    $total_unit = filterInput($_POST['total_unit']);
    $description = filterInput($_POST['description']);
    $category_id = filterInput($_POST['category_id']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);

    if (empty($productName) || empty($price) || empty($unit) || empty($total_unit) || empty($description) || empty($category_id)) {
        setMessage("../product-management.php", "warning", "All fields are required");
    }

    $uploadDir = '../../uploads/';
    $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    $files = $_FILES['productImage'];

    $fileData = [];

    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $fileName = $files['name'][$key];
        $fileTmpName = $files['tmp_name'][$key];
        $fileSize = $files['size'][$key];
        $fileError = $files['error'][$key];
        $fileType = $files['type'][$key];

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($fileError !== 0) {
            setMessage("../product-management.php", "error", "Error in file: $fileName (Error code: $fileError)");
        }

        if (!in_array($fileExt, $allowedTypes)) {
            setMessage("../product-management.php", "warning", "Invalid file type: $fileName");
        }

        if ($fileSize > $maxFileSize) {
            setMessage("../product-management.php", "warning", "File too large: $fileName");
        }

        // Store file info for later use
        $fileData[] = [
            'tmp_name' => $fileTmpName,
            'new_name' => uniqid('IMG-', true) . '-' . time() . '.' . $fileExt
        ];
    }

    $uploadSuccess = true;
    $filesNames = [];
    foreach ($fileData as $file) {
        $destination = $uploadDir . $file['new_name'];
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $filesNames[] = $file['new_name'];
        } else {
            $uploadSuccess = false;
        }
    }

    if (!$uploadSuccess) {
        setMessage("../product-management.php", "error", "File Not Uploaded Successfully");
    }

    $admin_id = $_SESSION['user_id'];
    $images = json_encode($filesNames);

    $sql = "INSERT INTO `products`(`admin_id`, `product_name`, `images`, `description`, `price_per_unit`, `unit`, `total_unit`, `category_id`, `tags`) VALUES ('$admin_id','$productName','$images','$description','$price','$unit','$total_unit','$category_id', '$tags')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        setMessage("../product-management.php", "success", "Product Added Successfully");
    } else {
        setMessage("../product-management.php", "error", "Something Wrong");
    }

    mysqli_close($conn);
} else {
    redirect("../");
}
