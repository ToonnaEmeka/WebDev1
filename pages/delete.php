<?php
include('../includes/header.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require('../includes/db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: dashboard.php');
}
?>
