<?php
include('../includes/header.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require('../includes/db_connect.php');
$userId = $_SESSION['user']['id'];
$stmt = $conn->prepare("SELECT * FROM projects WHERE user_id = ?");
$stmt->execute([$userId]);
$projects = $stmt->fetchAll();
?>
<h1>Dashboard</h1>
<a href="create.php">Add New Portfolio</a>
<ul>
    <?php foreach ($projects as $project): ?>
        <li>
            <?= $project['title'] ?>
            <a href="update.php?id=<?= $project['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $project['id'] ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
<?php include('../includes/footer.php'); ?>
