<?php

require_once __DIR__.'/../utils/message.php';
require_once __DIR__.'/constants.php';
// Database configuration
$host = "localhost";

try {
    $conn = mysqli_connect($host, username, password, db_name);
} catch (\Throwable $th) {
    $path = root_path . "/errors/500.php";
    redirect($path);
}

?>
