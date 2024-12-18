<?php
function display_validation_errors($errors) {
    echo '<div class="register-box">';
    echo '<p class="error">';
    foreach ($errors as $msg) {
        echo " - " . htmlspecialchars($msg) . "<br>\n"; // Escaping for security
    }
    echo '<br></div>';
}

// Initialize errors array and form values
$errors = [];
$fn = $ln = $e = $p = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input fields
    if (empty($_POST['fname'])) {
        $errors[] = 'Please enter your first name.';
    } else {
        $fn = trim($_POST['fname']);
    }

    if (empty($_POST['lname'])) {
        $errors[] = 'Please enter your last name.';
    } else {
        $ln = trim($_POST['lname']);
    }

    if (empty($_POST['email'])) {
        $errors[] = 'Please enter your email.';
    } else {
        $e = trim($_POST['email']);
    }

    if (!empty($_POST['psword1'])) {
        if ($_POST['psword1'] !== $_POST['psword2']) {
            $errors[] = 'Your passwords do not match.';
        } else {
            $p = trim($_POST['psword1']);
        }
    } else {
        $errors[] = 'Please enter your password.';
    }

    // Check if the email already exists in the database
    if (empty($errors)) {
        require('../../src/mysqli_connect.php'); // Connect to the database

        // Check for duplicate email
        $q = "SELECT email FROM users WHERE email = '$e'";
        $result = @mysqli_query($dbconnect, $q);

        if (mysqli_num_rows($result) > 0) {
            // Email already exists, add error
            $errors[] = 'This email address is already registered.';
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
                // Display an error message if the query failed
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
<main>
    <div class="container">
        <h1 class="form-title">Register</h1>
        <form action="register.php" method="post"> 
            <label style="color:black" for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" class="input-field" value="<?php if (isset($fn)) echo htmlspecialchars($fn); ?>"><br>
    
            <label style="color:black" for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" class="input-field" value="<?php if (isset($ln)) echo htmlspecialchars($ln); ?>"><br>
    
            <label style="color:black" for="email">Email:</label>
            <input type="email" name="email" id="email" class="input-field" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>"><br>
    
            <label style="color:black" for="psword1">Password:</label>
            <input type="password" name="psword1" class="input-field" id="psword1"><br>
    
            <label style="color:black" for="psword2">Confirm Password:</label>
            <input type="password" name="psword2" class="input-field" id="psword2"><br>
    
            <!-- Display validation errors if any exist after the form is submitted -->
            <?php if (!empty($errors)) {
                display_validation_errors($errors);
            } ?>
    
            <input type="submit" value="Register" class="submit-button">
        </form>
    </div>
</main>

<?php include '../includes/footer.php' ?>