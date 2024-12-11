<?php
require_once 'dbconfig.php'; // Include database configuration.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // Connect to the database
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check for existing username or email
        $query = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['username' => $username, 'email' => $email]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<script>alert('Username or email already exists. Please try again.'); window.location.href = 'register.php';</script>";
        } else {
            // Insert new user
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);

            echo "<script>alert('Registration successful! Please login.'); window.location.href = 'login.php';</script>";
        }
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}
?>
