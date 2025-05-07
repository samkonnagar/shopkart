<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

function sendMail($to, $toName, $sub, $body, $altBody)
{

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'samkonnagar123@gmail.com';
        $mail->Password   = $_ENV['GMAIL_APP'];  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('samkonnagar123@gmail.com', 'Shopkart - Team');
        $mail->addAddress($to, $toName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $sub;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
