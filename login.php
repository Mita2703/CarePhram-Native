<?php
session_start();
include __DIR__ . "/config/db.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Cek user
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' LIMIT 1");

    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);

        // Verifikasi password (plain text)
        if ($password === $user['password']) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit;

        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login CarePharm</title>
    <link rel="stylesheet" href="/carepharm/css/style.css">
</head>
<body class="login-page">

<div class="login-container">

    <div class="login-card">
        <h2>Login</h2>

        <?php if ($error) : ?>
            <p class="login-error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

</div>

</body>
</html>
