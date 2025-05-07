<?php

require_once './mail.php';
session_start();

// Check if POST data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user data from POST
    
    $mail = htmlspecialchars(trim($_POST['mail']));
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    
    if (empty($mail) || empty($fullname)) {
        echo "Email or Fullname can't be Empty";
    }

    $otp = rand(1000, 9999);

    $_SESSION['otp'] = $otp;

    $subject = "Register Email Verification";
    $mailBody = "your One time OTP: <b>$otp</b><br> From- Shopkart Pvt Ltd";
    $mailAltBody = "your One time OTP: $otp\n From- Shopkart Pvt Ltd";

    $res = sendMail($mail, $fullname, $subject, $mailBody, $mailAltBody);
    if ($res) {
        echo "OTP send successfully";
    } else {
        echo "Something wrong to send OTP on your email";
    }
}
else{
    header('location: ../signup.php');
}

?>