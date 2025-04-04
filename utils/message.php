<?php

function setMessage($location, $type, $message)
{
    $_SESSION['message'] = $message;
    $_SESSION['type'] = $type;

    header("Location: $location");
    exit();
}


function getMessage()
{
    if (isset($_SESSION['message']) && isset($_SESSION['type'])) {
        # code...
        $message =  $_SESSION['message'];
        $type = $_SESSION['type'];
        echo "$type - $message";
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}


function redirect($location) {
    header("Location: $location");
    exit();
}
