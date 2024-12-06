<?php include('../includes/header.php'); ?>
<div class="auth-page">
    <div class="form-container">
        <h2>Create Your Account</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require('../includes/db_connect.php');
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            try {
                $stmt->execute([$name, $email, $password]);
                echo "<p class='success'>Registration successful! <a href='login.php'>Log in here</a></p>";
            } catch (PDOException $e) {
                if ($e->getCode() === '23000') { // Duplicate entry
                    echo "<p class='error'>Email is already registered.</p>";
                } else {
                    echo "<p class='error'>Something went wrong. Please try again.</p>";
                }
            }
        }
        ?>
        <form method="POST">
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>
            <button type="submit" class="btn">Register</button>
            <p class="switch-link">Already have an account? <a href="login.php">Log in here</a></p>
        </form>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
