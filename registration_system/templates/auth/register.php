<?php
$errors = ['fname' => '', 'lname' => '', 'email' => '', 'password' => '', 'confirm_password' => ''];
$fn = $ln = $e = $p = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input fields
    if (empty($_POST['fname'])) {
        $errors['fname'] = 'Please enter your first name.';
    } else {
        $fn = trim($_POST['fname']);
    }

    if (empty($_POST['lname'])) {
        $errors['lname'] = 'Please enter your last name.';
    } else {
        $ln = trim($_POST['lname']);
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Please enter your email.';
    } else {
        $e = trim($_POST['email']);
        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email address.';
        }
    }

    if (empty($_POST['psword1'])) {
        $errors['password'] = 'Please enter your password.';
    } elseif ($_POST['psword1'] !== $_POST['psword2']) {
        $errors['confirm_password'] = 'Your passwords do not match.';
    } else {
        $p = trim($_POST['psword1']);
    }

    // Check if the email already exists in the database
    if (empty(array_filter($errors))) {
        require('../../src/mysqli_connect.php'); // Connect to the database

        // Check for duplicate email
        $q = "SELECT email FROM users WHERE email = '$e'";
        $result = @mysqli_query($dbconnect, $q);

        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = 'This email address is already registered.';
        } else {
            // Hash the password
            $hashedPassword = password_hash($p, PASSWORD_DEFAULT);

            // Prepare and execute the query to insert the user data
            $q = "INSERT INTO users (fname, lname, email, password, registration_date)
                  VALUES ('$fn', '$ln', '$e', '$hashedPassword', NOW())";

            $result = @mysqli_query($dbconnect, $q);

            if ($result) {
                // Redirect to thank you/success page
                header('Location: register-thanks.php');
                exit();
            } else {
                echo '<h2>System Error</h2>
                      <p class="error">Your registration could not be completed due to a system error. Please try again later.</p>';
                echo '<p>' . mysqli_error($dbconnect) . '</p>'; // Debugging message
            }
        }
        mysqli_close($dbconnect);
    }
}

$pageTitle = 'Register with us!';
include '../includes/header.php';
?>
<main class="register-img">
    <div class="container">
        <h1 class="form-title">Register</h1>
        <form action="register.php" method="post"> 
            <label class="form-label" for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" class="input-field" value="<?php if (isset($fn)) echo htmlspecialchars($fn); ?>">
            <?php if (!empty($errors['fname'])): ?>
                <p class="error"><?php echo htmlspecialchars($errors['fname']); ?></p>
            <?php endif; ?>
            <br>
    
            <label class="form-label" for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" class="input-field" value="<?php if (isset($ln)) echo htmlspecialchars($ln); ?>">
            <?php if (!empty($errors['lname'])): ?>
                <p class="error"><?php echo htmlspecialchars($errors['lname']); ?></p>
            <?php endif; ?>
            <br>
    
            <label class="form-label" for="email">Email:</label>
            <input type="email" name="email" id="email" class="input-field" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>">
            <?php if (!empty($errors['email'])): ?>
                <p class="error"><?php echo htmlspecialchars($errors['email']); ?></p>
            <?php endif; ?>
            <br>
    
            <label class="form-label" for="psword1">Password:</label>
            <input type="password" name="psword1" class="input-field" id="psword1">
            <?php if (!empty($errors['password'])): ?>
                <p class="error"><?php echo htmlspecialchars($errors['password']); ?></p>
            <?php endif; ?>
            <br>
    
            <label class="form-label" for="psword2">Confirm Password:</label>
            <input type="password" name="psword2" class="input-field" id="psword2">
            <?php if (!empty($errors['confirm_password'])): ?>
                <p class="error"><?php echo htmlspecialchars($errors['confirm_password']); ?></p>
            <?php endif; ?>
            <br>
    
            <input type="submit" value="Register" class="submit-button">
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
