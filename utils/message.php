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
        echo "<div class='popup-msg $type'><span>$type - </span>$message</div>";
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}

function getMessageClient()
{
    if (isset($_SESSION['message']) && isset($_SESSION['type'])) {
        # code...
        $message =  $_SESSION['message'];
        $type = $_SESSION['type'];
?>
        <div class="notification-toast" data-toast>

            <button class="toast-close-btn" data-toast-close>
                X
            </button>

            <div class="toast-banner">
                <img src="./assets/images/logo/logo.svg" alt="Rose Gold Earrings" width="80" height="70">
            </div>

            <div class="toast-detail">

                <p class="toast-message">
                    <?php echo strtoupper($type); ?>
                </p>

                <p class="toast-title">
                    <?php echo ucwords($message) ?>
                </p>

            </div>

        </div>
<?php
        unset($_SESSION['message']);
        unset($_SESSION['type']);
    }
}


function redirect($location)
{
    header("Location: $location");
    exit();
}
