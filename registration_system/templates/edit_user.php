<?php
$config = include __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    if (isset($_SESSION['user_level'])) {
        header('Location: ' . BASE_URL .  'public/');
        exit();
    }
    header('Location: ' . BASE_URL .  'templates/auth/login.php');
    exit();
}

$pageTitle = "Users";
include 'includes/header.php';
?>

<main>
<form class="container" action="edit_user.php" method="post">
    <h2 class="form-title"> Edit User Record  </h2></center>
    <?php
        if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
            $id = $_GET['id']; 
        } 
        elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
            $id = $_POST['id'];
        } 
        else {
            echo '<p class="error">This page has been accessed by mistake</p>';
            exit();
        }
        require_once __DIR__ . '/../src/mysqli_connect.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = array();
            if (empty($_POST['fname'])) { #check if the fname box is empty
                $errors[] = 'Please input your first name.';
            } else {
                $fn = trim($_POST['fname']);
            }

            if (empty($_POST['lname'])) { #check if the lname box is empty
                $errors[] = 'Please input your last name.';
            } else {
                $ln = trim($_POST['lname']);
            }

            if (empty($_POST['email'])) { #check if the email box is empty
                $errors[] = 'Please input your email.';
            }else {
                $e = trim($_POST['email']);
            }
            
            if(empty($errors)){ #if there are no errors
                $q ="UPDATE users 
                        SET fname='$fn', lname='$ln', email='$e' 
                        WHERE id = '$id' 
                        LIMIT 1";
                $result = @mysqli_query($dbconnect, $q);
                if (mysqli_affected_rows($dbconnect) == 1){
                    echo '<p id="user_edited" class="message message-yehey">The record has been updated.</p>';
                } else {
                    echo '<h3 class="message message-error">The system detected no changes to User.</h3>';
                }
            } else {
                echo '<p id="user_not_edited">The record was NOT updated.</p>';
            }
        }
        $q = "SELECT fname, lname, email FROM users where id=$id";
        $result = @mysqli_query($dbconnect, $q);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo '
                <p> <label class="form-label" for="fname"><br>First Name</label>
                    <input type="text" class="input-field" name="fname" size="30" maxlength="40"
                    value="'.$row["fname"].'"></p>

                <p> <label class="form-label" for="lname"<br><br>Last Name</label>
                    <input type="text" class="input-field" name="lname" size="30" maxlength="40"
                    value="'.$row["lname"].'"></p>

                <p> <label class="form-label" for="email"><br>Email Address</label>
                    <input type="text" class="input-field" name="email" size="30" maxlength="50"
                    value="'.$row["email"].'"></p><br>

                <p> <input type="submit" class="submit-button" name="update" value="Update"></p>
                <p> <a href="register-view-users.php">
                    <button type="button" class="submit-button">Go Back</button></a></p>
                <p> <input type="hidden" name="id" value="'.$id.'"></p>
            
            ';
        } else {
            echo '<p class="error">This page has been accessed by mistake</p>';
            exit();
        }
    ?>
</form>
</main>

<?php include 'includes/footer.php'; ?>