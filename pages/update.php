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
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE projects SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);

    header('Location: dashboard.php');
    exit;
}
?>
<form method="POST">
    <label>Project Title:</label>
    <input type="text" name="title" value="<?= $project['title'] ?>" required>
    <label>Description:</label>
    <textarea name="description" required><?= $project['description'] ?></textarea>
    <button type="submit">Update</button>
</form>
<?php include('../includes/footer.php'); ?>
