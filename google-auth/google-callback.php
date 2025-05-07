<?php
require_once '../vendor/autoload.php';
require_once '../config/connection.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


session_start();

$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri('http://localhost/mwf12/shopkart/google-auth/google-callback.php');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        // Get user profile info
        $oauth = new Google_Service_Oauth2($client);
        $user = $oauth->userinfo->get();

        // Fetch query
        $sql = "SELECT * FROM `users` WHERE email = '$user->email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) !== 1){
            $insertSql = "INSERT INTO `users`(`user_id`, `username`, `full_name`, `email`, `avatar`, `register_type`, `isActive`) VALUES ('$user->id','$user->email','$user->name','$user->email','$user->picture','google',TRUE)";
            $inserRes = mysqli_query($conn, $insertSql);
            if ($inserRes) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['full_name'] = $user->name;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['role'] = "user";
                $_SESSION['user_picture'] = $user->picture;
                $_SESSION['is_loggdin'] = true;
                setMessage("../", "success", "Google login successfull");
            }
        } else {
            if (mysqli_fetch_assoc($res)['register_type'] === 'google') {
                session_regenerate_id();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['full_name'] = $user->name;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['role'] = "user";
                $_SESSION['user_picture'] = $user->picture;
                $_SESSION['is_loggdin'] = true;
                setMessage("../", "success", "Google login successfull");
            } else {
                setMessage("../login.php", "warning", "Email Already Registered Use Normal Login");
            }
        }
    } else {
        echo "Error fetching token: " . $token['error'];
    }
} else {
    echo "No code parameter found in callback.";
}
