<?php
session_start();
require_once '../../config/connection.php';
require_once '../../utils/message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = trim($_POST['categoryName']);
    $description = trim($_POST['description']);

    // Basic validation
    if (empty($categoryName) || empty($description)) {
        setMessage("../", "warning", "All fields are required");
    }

    // Insert query
    $sql = "INSERT INTO `category`(`category_name`, `description`) VALUES ('$categoryName','$description')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        setMessage("../category-management.php", "success", "Category Added");
    }


    mysqli_close($conn);
} else {
    redirect("../");
}
