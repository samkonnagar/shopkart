<?php
session_start();
require_once '../../config/connection.php';
require_once '../../utils/message.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Basic validation
    if ( empty($username) || empty($password)) {
        setMessage("../", "warning", "All fields are required");
    }

    // Insert query
    $sql = "SELECT `user_id`, `full_name`, `email`, `password`, `role` FROM `users` WHERE username = '$username'";
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
            setMessage("../dashboard.php", "success", "Login successfull");
        } else {
            setMessage("../", "warning", "Invalid Password");
        }
    } else {
        setMessage("../", "warning", "Invalid username");
    }
    
    mysqli_close($conn);
} else {
    redirect("../");
}



?>