<?php
print_r($_SESSION);
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}
?>