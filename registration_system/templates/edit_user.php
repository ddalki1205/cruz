<?php
$config = include __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    if (isset($_SESSION['user_level'])) {
        header('Location: ' . BASE_URL . 'public/');
        exit();
    }
    header('Location: ' . BASE_URL . 'templates/auth/login.php');
    exit();
}

require_once __DIR__ . '/../src/mysqli_connect.php';

$id = $fn = $ln = $e = '';
$errors = ['fname' => '', 'lname' => '', 'email' => ''];
$message = '';

// Determine the user ID
if ((isset($_GET['id']) && is_numeric($_GET['id']))) {
    $id = $_GET['id'];
} elseif ((isset($_POST['id']) && is_numeric($_POST['id']))) {
    $id = $_POST['id'];
} else {
    echo '<p class="error">This page has been accessed by mistake</p>';
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fn = trim($_POST['fname'] ?? '');
    $ln = trim($_POST['lname'] ?? '');
    $e = trim($_POST['email'] ?? '');

    if (empty($fn)) {
        $errors['fname'] = 'Please input your first name.';
    }

    if (empty($ln)) {
        $errors['lname'] = 'Please input your last name.';
    }

    if (empty($e)) {
        $errors['email'] = 'Please input your email.';
    }

    if (empty(array_filter($errors))) {
        $q = "UPDATE users SET fname=?, lname=?, email=? WHERE id=? LIMIT 1";
        $stmt = mysqli_prepare($dbconnect, $q);
        mysqli_stmt_bind_param($stmt, 'sssi', $fn, $ln, $e, $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) == 1) {
            $message = '<p class="message message-yehey">The record has been updated.</p>';
        } else {
            $message = '<h3 class="message message-error">The system detected no changes to User.</h3>';
        }
    } else {
        $message = '<p class="error">The record was NOT updated. Please fix the errors below.</p>';
    }
}

// Fetch user data for the form
$q = "SELECT fname, lname, email FROM users WHERE id=?";
$stmt = mysqli_prepare($dbconnect, $q);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $fn = $fn ?: $row['fname'];
    $ln = $ln ?: $row['lname'];
    $e = $e ?: $row['email'];
} else {
    echo '<p class="error">This page has been accessed by mistake</p>';
    exit();
}

include '../includes/header.php';
?>
<main class="main-content-edit">
    <form class="container" method="post">
        <h1 class="form-title">Edit User Record</h1>
        <?php if (!empty($message)) echo $message; ?>

        <label class="form-label" for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" class="input-field" value="<?php echo htmlspecialchars($fn); ?>">
        <?php if (!empty($errors['fname'])) echo '<p class="error">' . $errors['fname'] . '</p>'; ?>
        <br>

        <label class="form-label" for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" class="input-field" value="<?php echo htmlspecialchars($ln); ?>">
        <?php if (!empty($errors['lname'])) echo '<p class="error">' . $errors['lname'] . '</p>'; ?>
        <br>

        <label class="form-label" for="email">Email Address:</label>
        <input type="text" name="email" id="email" class="input-field" value="<?php echo htmlspecialchars($e); ?>">
        <?php if (!empty($errors['email'])) echo '<p class="error">' . $errors['email'] . '</p>'; ?>
        <br>

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="submit" value="Update" class="submit-button">
        <a href="register-view-users.php" class="go-back-button">Go Back</a>
    </form>
</main>
<?php include '../includes/footer.php'; ?>
