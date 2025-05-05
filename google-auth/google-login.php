<?php
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();


session_start();

$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri('http://localhost/mwf12/shopkart/google-auth/google-callback.php');
$client->addScope("email");
$client->addScope("profile");
$client->setPrompt('select_account');

// Redirect to Google's OAuth 2.0 server
$authUrl = $client->createAuthUrl();
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit;
