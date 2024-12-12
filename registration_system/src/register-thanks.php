<?php
    session_start();
    if(isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1)) {
        header(header: "Location: ../public/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/registration_thanks.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <title>Registration Successful</title>
</head>

<body>
<div class="wrapper">

    <header class="header">
        <h1 class="heading">Thank You for Registering!</h1>
    </header>

    <main class="main">
        <div class="thank-you-container">
            <p class="paragraph">Your registration was successful. You can now log in to your account.</p>
            <a href="../public/index.php" class="homepage-link">Go to Homepage</a>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>

</div>
</body>

</html>