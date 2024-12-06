<?php include('../includes/header.php'); ?>
<div class="auth-page">
    <div class="form-container">
        <h2>Welcome Back</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require('../includes/db_connect.php');
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ];
                header('Location: dashboard.php');
                exit;
            } else {
                echo "<p class='error'>Invalid email or password.</p>";
            }
        }
        ?>
        <form method="POST">
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn">Log In</button>
            <p class="switch-link">Don't have an account? <a href="register.php">Sign up here</a></p>
        </form>
    </div>
</div>
<?php include('../includes/footer.php'); ?>


