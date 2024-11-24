<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

echo "Bienvenido al dashboard, usuario ID: " . $_SESSION['user_id'];
?>
