<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Ambil domain dari email
    $email_parts = explode('@', $email);
    $domain = count($email_parts) == 2 ? $email_parts[1] : '';
    
    if ($password === $domain) {
        $_SESSION['user'] = $email;
        setcookie('user', $email, time() + (86400), "/"); // Simpan email di cookie selama 30 hari
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required value="<?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : ''; ?>">
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>