<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'ecommerce';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store user in session and redirect to dashboard
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>
