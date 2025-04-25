<?php
session_start();
require_once '../config/connection.php';
require_once '../utils/message.php';
require_once '../utils/filters.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = filterInput($_POST['fullname']);
    $username = filterInput($_POST['username']);
    $email = filterInput($_POST['email'], 'email');
    $password = filterInput($_POST['password']);
    $c_password = filterInput($_POST['c_password']);

    // Basic validation
    if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($c_password)) {
        setMessage("../signup.php", "warning", "All fields are required");
    }
    if ($password !== $c_password) {
        setMessage("../signup.php", "warning", "Password do not match");
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert query
    $sql = "INSERT INTO `users`(`username`, `full_name`, `email`, `password`, `isActive`) VALUES ('$username','$fullname','$email','$hash',TRUE)";
    $res = mysqli_query($conn, $sql);


    if ($res) {
        setMessage("../login.php", "success", "Account Created successfully");
    } else {
        setMessage("../signup.php", "error", "Something Wrong");
    }

    mysqli_close($conn);
} else {
    redirect("../");
}
