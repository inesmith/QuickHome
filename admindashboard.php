<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: unauthorized.php");
    exit();
}
include 'admin_nav.php';
?>
<h2>Welcome to the Admin Dashboard</h2>
