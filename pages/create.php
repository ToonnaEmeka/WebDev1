<?php
include('../includes/header.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../includes/db_connect.php');
    $title = $_POST['title'];
    $description = $_POST['description'];
    $userId = $_SESSION['user']['id'];

    $stmt = $conn->prepare("INSERT INTO projects (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $title, $description]);
    header('Location: dashboard.php');
}
?>
<form method="POST">
    <label>Project Title:</label>
    <input type="text" name="title" required>
    <label>Description:</label>
    <textarea name="description" required></textarea>
    <button type="submit">Create</button>
</form>
<?php include('../includes/footer.php'); ?>
