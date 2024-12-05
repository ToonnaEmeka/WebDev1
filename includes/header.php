<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/portfolio_tool/css/style.css">
    <title>Portfolio Tool</title>
</head>
<body>
<nav>
    <a href="/portfolio_tool/pages/home.php">Home</a>
    <?php if (isset($_SESSION['user'])): ?>
        <a href="/portfolio_tool/pages/dashboard.php">Dashboard</a>
        <a href="/portfolio_tool/pages/profile.php">Profile</a>
        <a href="/portfolio_tool/pages/logout.php">Logout</a>
        <span>Welcome, <?= $_SESSION['user']['name'] ?></span>
    <?php else: ?>
        <a href="/portfolio_tool/pages/login.php">Login</a>
        <a href="/portfolio_tool/pages/register.php">Register</a>
    <?php endif; ?>
</nav>
