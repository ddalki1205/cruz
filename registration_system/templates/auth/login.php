<?php
$config = include __DIR__ . '/../../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$emailError = $passwordError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../../src/mysqli_connect.php');

    $e = trim($_POST['email'] ?? '');
    $p = trim($_POST['password'] ?? '');

    if (empty($e)) {
        $emailError = 'Please enter your email.';
    }

    if (empty($p)) {
        $passwordError = 'Please enter your password.';
    }

    if (!empty($e) && !empty($p)) {
        $q = "SELECT id, fname, user_level, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($dbconnect, $q);
        mysqli_stmt_bind_param($stmt, 's', $e);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if (password_verify($p, $row['password'])) {
                session_start();
                $_SESSION['user_level'] = (int) $row['user_level'];
                $_SESSION['fname'] = $row['fname'];

                $url = ($_SESSION['user_level'] === 1) ? '../admin-page.php' : '../members-page.php';
                header('Location: ' . $url);
                exit();
            } else {
                $passwordError = 'Wrong email or password. Please try again.';
            }
        } else {
            $emailError = 'Wrong email or password. Please try again.';
        }
        mysqli_close($dbconnect);
    }
}

include '../includes/header.php';

?>
<main class="login-img">
    <form class="container" method="post">
        <h1 class="form-title">Login</h1>

        <label class=form-label for="email">Email:</label>
        <input type="text" name="email" id="email" class="input-field" autocomplete="off" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>">
        <br>
        
        <label class=form-label for="password">Password:</label>
        <input type="password" name="password" class="input-field" id="password" autocomplete="off" value="<?php if (isset($p)) echo htmlspecialchars($p); ?>">
        <?php if (!empty($emailError)) echo '<p class="error">' . $emailError . '</p>'; ?>
        <?php if (!empty($passwordError)) echo '<p class="error">' . $passwordError . '</p>'; ?>
        <br>

        <input type="submit" value="Log in" class="submit-button">
    </form>
    <? include '../includes/header.php'; ?>
</main>
<?php include '../includes/footer.php'; ?>