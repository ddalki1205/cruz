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
    <div style="margin-bottom: 20px;"> <!-- Cancel Login Button -->
        <a href="../public/index.php" class="cancel-button">Cancel Login</a> 
    </div>

    <div class="container">
        <h1 class="form-title">Login</h1>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="input-field" value=" "><br>

            <label for="psword1">Password:</label>
            <input type="password" name="psword1" class="input-field" id="psword1"><br>

            <a href="members-page.php" class="submit-button">Log in</a>
    </div>
</body>
</html>
