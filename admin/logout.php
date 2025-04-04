<?php
session_start();
require_once '../utils/auth.php';
require_once '../utils/message.php';

if(!authenticateAdmin()){
  setMessage('../', "error", "Not Authorized");
}

session_unset();
session_destroy();

redirect('./');


?>