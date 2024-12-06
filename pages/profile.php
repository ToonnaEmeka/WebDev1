<?php
include('../includes/header.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<h1>Profile</h1>
<p><strong>Name:</strong> <?= $user['name'] ?></p>
<p><strong>Email:</strong> <?= $user['email'] ?></p>
<a href="dashboard.php">Back to Dashboard</a>
<?php include('../includes/footer.php'); ?>
