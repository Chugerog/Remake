<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Online Market</title>
    <link rel="stylesheet" href="assets/sign-up.css">
</head>
<body>
    <div class="container">
        <h1>SOLE MATES</h1>
        <p>Sign Up</p>
        <form action="Supprocess.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
            <p>Already have an account? <a href="sign-up.php">Login</a></p>
        </form>
    </div>
</body>
</html>
