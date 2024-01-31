<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('location:./admins/login_form.php');
    exit; // Pastikan untuk menambahkan exit setelah header location
}
?>
