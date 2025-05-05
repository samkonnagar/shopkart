<?php

require_once __DIR__.'/../utils/message.php';
require_once __DIR__.'/constants.php';
require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    $conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
} catch (\Throwable $th) {
    $path = root_path . "/errors/500.php";
    redirect($path);
}

?>
