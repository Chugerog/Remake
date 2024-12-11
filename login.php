<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sole Mates</title>
    <link rel="stylesheet" href="assets/sign-up.css">
</head>
<body>
    <div class="container">
        <h1>SOLE MATES</h1>
        <p>Log In</p>
        <form action="logprocess.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>
