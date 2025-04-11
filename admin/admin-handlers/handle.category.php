<?php
session_start();
require_once '../../config/connection.php';
require_once '../../utils/message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = trim($_POST['categoryName']);
    $description = trim($_POST['description']);

    $uploadDir = '../../uploads/categories/';
    $allowedTypes = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB

    $fileName = $_FILES['categoryImage']['name'];
    $fileTmpName = $_FILES['categoryImage']['tmp_name'];
    $fileSize = $_FILES['categoryImage']['size'];
    $fileError = $_FILES['categoryImage']['error'];
    $fileType = $_FILES['categoryImage']['type'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (empty($categoryName) || empty($description)) {
        setMessage("../", "warning", "All fields are required");
    }

    if ($fileError === 0) {
        if (in_array($fileExt, $allowedTypes)) {
            if ($fileSize <= $maxFileSize) {
                $newFileName = uniqid('IMG-', true) . '.' . $fileExt;
                $destination = $uploadDir . $newFileName;

                if (move_uploaded_file($fileTmpName, $destination)) {
                    $sql = "INSERT INTO `category`(`category_name`, `description`, `image`) VALUES ('$categoryName','$description', '$newFileName')";
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        setMessage("../category-management.php", "success", "Category Added");
                    }
                } else {
                    setMessage("../category-management.php", "error", "Error uploading the file.");
                }
            } else {
                setMessage("../category-management.php", "warning", "File is too large. Max 2MB allowed.");
            }
        } else {
            setMessage("../category-management.php", "warning",  "Invalid file type. Only JPG, JPEG, SVG, PNG, and WEBP allowed.");
        }
    } else {
        setMessage("../category-management.php", "error", "Error while uploading the file. Error code: $fileError");
    }



    mysqli_close($conn);
} else {
    redirect("../");
}
