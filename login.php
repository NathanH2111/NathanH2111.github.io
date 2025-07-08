<?php
session_start();
include 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (password_verify($user, USERNAME) && password_verify($pass, PASSWORD_HASH)) {
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/styles.css">
        <title>Nathan Hedemark</title>
    </head>
    <body>
        <header>
            <a href="index.php" class="logo-link">Nathan Hedemark</a>
            <a href="logout.php" class="logout-link">Logout</a>
        </header>
        <main>
            <form class="login-form" method="POST">
                <label for="username">Username</label>
                <input name="username" placeholder="Username" required>
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <?php if ($error): ?><p><?= $error ?></p><?php endif; ?>
            </form>
        </main>

        <footer>&copy; 2025 Nathan Hedemark. All rights reserved.</footer>
    </body>
</html>
