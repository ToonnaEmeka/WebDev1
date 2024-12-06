<?php
include('../includes/header.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require('../includes/db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    $project = $stmt->fetch();

    if (!$project) {
        echo "<p>Project not found.</p>";
    }
} else {
    header('Location: dashboard.php');
    exit;
}
?>
<h1><?= $project['title'] ?></h1>
<p><strong>Description:</strong> <?= $project['description'] ?></p>
<p><strong>Created At:</strong> <?= $project['created_at'] ?></p>
<a href="dashboard.php">Back to Dashboard</a>
<?php include('../includes/footer.php'); ?>
