<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project/css/style.css">
    <title>Portfolio Management</title>
</head>
<body>
<nav>
    <a href="/Project/pages/home.php">Home</a>
    <a href="/Project/pages/about.php">About Us</a>
    <a href="/Project/pages/contact.php">Contact Us</a>
    <?php if (isset($_SESSION['user'])): ?>
        <a href="/Project/pages/dashboard.php">Dashboard</a>
        <a href="/Project/pages/profile.php">Profile</a>
        <a href="/Project/pages/logout.php">Logout</a>
        <span>Welcome, <?= $_SESSION['user']['name'] ?></span>
    <?php else: ?>
        <a href="/Project/pages/login.php">Login</a>
        <a href="/Project/pages/register.php">Register</a>
    <?php endif; ?>
</nav>
