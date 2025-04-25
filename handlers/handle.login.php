<?php
session_start();
require_once '../config/connection.php';
require_once '../utils/message.php';
require_once '../utils/filters.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filterInput($_POST['email'], 'email');
    $password = filterInput($_POST['password']);
    
    // Basic validation
    if ( empty($email) || empty($password)) {
        setMessage("../login.php", "warning", "All fields are required");
    }

    // Fetch query
    $sql = "SELECT * FROM `users` WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($res) === 1) {
        $data = mysqli_fetch_assoc($res);

        if (password_verify($password, $data['password'])) {
            session_regenerate_id();
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['full_name'] = $data['full_name'];
            $_SESSION['user_email'] = $data['email'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['user_picture'] = "dummy.jpg";
            $_SESSION['is_loggdin'] = true;
            setMessage("../", "success", "Login successfull");
        } else {
            setMessage("../login.php", "warning", "Invalid Password");
        }
    } else {
        setMessage("../login.php", "warning", "Email is not Registered");
    }
    
    mysqli_close($conn);
} else {
    redirect("../");
}



?>