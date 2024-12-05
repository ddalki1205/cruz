<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/registration.css">
    <link rel="stylesheet" type="text/css" href="../public/css/web_design.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <title>LogIn Page</title>
</head>

<body>
<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate input fields
            require('mysqli_connect.php');
            if (empty($_POST['email'])) {
                echo '<p class="error"> Please enter your email.</p>';
            } else {
                $e = trim($_POST['email']);
            }

            if (!empty($_POST['psword'])) {
                echo '<p class="error"> Please enter your password.</p>';
                } else {
                    $p = trim($_POST['psword']);
                }

            if($e && $p){
                $q = "SELECT id, fname, user_level FROM users WHERE (email = '$e' AND psword = '$p');";
                $result = @mysqli_query($dbconnect, $q);

                if(@mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if(password_verify($p, $row['psword'])){
                        session_start();
                        $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        #converting user_level to int
                        $_SESSION['user_level'] = (int) $_SESSION['user_level'];
                        #check if admin or member
                        $url = ($_SESSION['user_level'] === 1) ? '../public/admin-page.php' : '../public/members-page.php';
                        header('Location: '.$url);
                        exit();
                    }else{
                        echo '<p class="error">Please try again.</p>';
                    }
                    mysqli_free_result($result);
                    mysqli_close($dbcon);
                }else{
                    echo '<p class="error"> Please register first.</p>';
                }
            mysqli_close($dbconnect);
            }
        }
?>
    <div style="margin-bottom: 20px;"> <!-- Cancel Login Button -->
        <a href="../public/index.php" class="cancel-button">Cancel Login</a> 
    </div>

    <form class="container">
        <h1 class="form-title">Login</h1>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="input-field" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>"><br>

            <label for="psword1">Password:</label>
            <input type="password" name="psword" class="input-field" id="psword" value="<?php if (isset($e)) echo htmlspecialchars($e); ?>"><br>

            <input type="submit" value="Log in" class="submit-button">
    </form>
</body>
</html><?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input fields
    require('mysqli_connect.php');
    
    $e = trim($_POST['email'] ?? '');
    $p = trim($_POST['psword'] ?? '');

    if (empty($e)) {
        echo '<p class="error">Please enter your email.</p>';
    }

    if (empty($p)) {
        echo '<p class="error">Please enter your password.</p>';
    }

    if (!empty($e) && !empty($p)) {
        // Use prepared statements to prevent SQL injection
        $q = "SELECT id, fname, user_level, psword FROM users WHERE email = ?";
        $stmt = mysqli_prepare($dbconnect, $q);
        mysqli_stmt_bind_param($stmt, 's', $e);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if (password_verify($p, $row['psword'])) {
                session_start();
                $_SESSION['user_level'] = (int) $row['user_level'];
                $_SESSION['fname'] = $row['fname'];

                // Redirect based on user level
                $url = ($_SESSION['user_level'] === 1) ? '../public/admin-page.php' : '../public/members-page.php';
                header('Location: ' . $url);
                exit();
            } else {
                echo '<p class="error">Invalid email or password. Please try again.</p>';
            }
        } else {
            echo '<p class="error">No account found. Please register first.</p>';
        }
        mysqli_close($dbconnect);
    }
}
?>


