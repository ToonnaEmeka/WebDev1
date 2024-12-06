<?php include('../includes/header.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../includes/db_connect.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
    } else {
        echo "<p>Invalid credentials.</p>";
    }
}
?>
<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
<?php include('../includes/footer.php'); ?>
