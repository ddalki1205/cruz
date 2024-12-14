<?php 
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
                $passwordError = 'Wrong password. Please try again.';
            }
        } else {
            $emailError = 'No account found. Please register first.';
        }
        mysqli_close($dbconnect);
    }
}

include '../includes/header-no-nav.php';

?>
<main>
    <div style="margin-bottom: 20px;"> <!-- Cancel Registration Button -->
        <a href="javascript:window.history.back();" class="cancel-button">Cancel Login</a> 
    </div>

    <form class="container" method="post">
        <h1 class="form-title">Login</h1>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" class="input-field" autocomplete="off" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>">
        <?php if (!empty($emailError)) echo '<p class="error">' . $emailError . '</p>'; ?>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" class="input-field" id="password" autocomplete="off" value="<?php if (isset($p)) echo htmlspecialchars($p); ?>">
        <?php if (!empty($passwordError)) echo '<p class="error">' . $passwordError . '</p>'; ?>
        <br>

        <input type="submit" value="Log in" class="submit-button">
    </form>
    <? include '../includes/header.php'; ?>
</main>
<?php include '../includes/footer.php'; ?>