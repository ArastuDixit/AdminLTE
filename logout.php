<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
// destroy the session
// session_destroy();
header("Location:login.php");
?>