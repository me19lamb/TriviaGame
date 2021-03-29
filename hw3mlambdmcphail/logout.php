<?php
session_start();
session_destroy();
unset($_SESSION);
header("Location: http://www.sienasellbacks.com/me19lamb/Lab10/login.php");
die("Session Destroyed");
?>