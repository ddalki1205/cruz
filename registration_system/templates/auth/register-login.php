<?php
// Handle Login Form Logic
$emailError = $passwordError = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
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

// Handle Registration Form Logic
$errors = [];
$fn = $ln = $e = $p = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    if (empty($_POST['fname'])) $errors[] = 'Please enter your first name.';
    else $fn = trim($_POST['fname']);

    if (empty($_POST['lname'])) $errors[] = 'Please enter your last name.';
    else $ln = trim($_POST['lname']);

    if (empty($_POST['email'])) $errors[] = 'Please enter your email.';
    else $e = trim($_POST['email']);

    if (!empty($_POST['psword1'])) {
        if ($_POST['psword1'] !== $_POST['psword2']) {
            $errors[] = 'Your passwords do not match.';
        } else {
            $p = trim($_POST['psword1']);
        }
    } else {
        $errors[] = 'Please enter your password.';
    }

    if (empty($errors)) {
        require('../../src/mysqli_connect.php');
        $q = "SELECT email FROM users WHERE email = '$e'";
        $result = @mysqli_query($dbconnect, $q);

        if (mysqli_num_rows($result) > 0) {
            $errors[] = 'This email address is already registered.';
        } else {
            $hashedPassword = password_hash($p, PASSWORD_DEFAULT);
            $q = "INSERT INTO users (fname, lname, email, password, registration_date)
                  VALUES ('$fn', '$ln', '$e', '$hashedPassword', NOW())";
            $result = @mysqli_query($dbconnect, $q);

            if ($result) {
                header('Location: register-thanks.php');
                exit();
            } else {
                echo '<p class="error">System Error: Could not complete registration.</p>';
            }
        }
        mysqli_close($dbconnect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="fcontainer" id="fcontainer">
        <!-- Register Form -->
        <div class="form-container sign-up">
            <form action="" method="post">
                <h1>Create Account</h1>
                <span>Register with E-mail</span>
                <input type="text" placeholder="First Name" name="fname" value="<?php echo htmlspecialchars($fn); ?>">
                <input type="text" placeholder="Last Name" name="lname" value="<?php echo htmlspecialchars($ln); ?>">
                <input type="email" placeholder="Enter E-mail" name="email" value="<?php echo htmlspecialchars($e); ?>">
                <input type="password" placeholder="Enter Password" name="psword1">
                <input type="password" placeholder="Confirm Password" name="psword2">
                <button type="submit" name="register">Sign Up</button>
                <?php if (!empty($errors)) echo '<p class="error">' . implode('<br>', $errors) . '</p>'; ?>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Sign In</h1>
                <span>Login With Email & Password</span>
                <input type="email" placeholder="Enter E-mail" name="email" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>">
                <input type="password" placeholder="Enter Password" name="password">
                <a href="#">Forgot Password?</a>
                <button type="submit" name="login">Sign In</button>
                <?php 
                if (!empty($emailError)) echo '<p class="error">' . $emailError . '</p>';
                if (!empty($passwordError)) echo '<p class="error">' . $passwordError . '</p>';
                ?>
            </form>
        </div>

        <!-- Toggle Panels -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome back!</h1>
                    <p>Sign in With ID & Password</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome to<br>BuildBoard!</h1>
                    <p>Share us your Minecraft Experiences</p>
                    <button class="hidden" id="register">Create Account</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/forms.js"></script>
</body>
</html>
