<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'standard_user') {
    header("Location: unauthorized.php");
    exit();
}
include 'user_nav.php';
?>
<h2>Welcome to the User Dashboard</h2>
