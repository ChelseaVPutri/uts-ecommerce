<?php
session_start();
session_destroy();
header("Location: /uts/login-register/login.php");
?>