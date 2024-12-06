<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <link rel="stylesheet" href="/Project/css/style.css">
</head>
<body>
    <div class="logout-page">
        <div class="logout-container">
            <h1>Thanks for the business!</h1>
            <p>You have been successfully logged out.</p>
            <a href="/Project/pages/login.php" class="btn">Log In Again</a>
        </div>
    </div>
</body>
</html>

