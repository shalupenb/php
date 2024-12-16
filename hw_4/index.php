<?php
session_start();

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        setcookie("user[$username]", password_hash($password, PASSWORD_DEFAULT), time() + 3600 * 24 * 7);
        $_SESSION['message'] = "Register successful! Login into your account.";
    } else {
        $_SESSION['message'] = "Please fill in all fields.";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && isset($_COOKIE['user'][$username])) {
        if (password_verify($password, $_COOKIE['user'][$username])) {
            $_SESSION['username'] = $username;
            $_SESSION['message'] = "Login successful. Welcome, $username!";
        } else {
            $_SESSION['message'] = "Wrong password.";
        }
    } else {
        $_SESSION['message'] = "User with that login does not exist.";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES AND SESSION</title>
</head>
<body>

<?php if (isset($_SESSION['username'])): ?>
    <h1>Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <a href="?logout=1">Logout</a>
<?php else: ?>
    <h1>Register</h1>
    <form method="POST">
        <label>
            Username:
            <input type="text" name="username" required>
        </label>
        <br>
        <label>
            Password:
            <input type="password" name="password" required>
        </label>
        <br>
        <button type="submit" name="register">register</button>
    </form>

    <h1>Login</h1>
    <form method="POST">
        <label>
            Username:
            <input type="text" name="username" required>
        </label>
        <br>
        <label>
            Password:
            <input type="password" name="password" required>
        </label>
        <br>
        <button type="submit" name="login">login</button>
    </form>
<?php endif; ?>

<p>
    <?php echo htmlspecialchars($message); ?>
</p>

</body>
</html>