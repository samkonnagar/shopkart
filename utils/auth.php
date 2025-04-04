<?php

function authenticateAdmin()
{
    if (!(isset($_SESSION['user_id']) && $_SESSION['is_loggdin'] === true && $_SESSION['role'] === "admin")) {
        return false;
    }
    return true;
}

function authenticate()
{
    if (!(isset($_SESSION['user_id']) && $_SESSION['is_loggdin'] === true)) {
        return false;
    }
    return true;
}
