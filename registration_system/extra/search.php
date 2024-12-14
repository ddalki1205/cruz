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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">

    <title>Search Page - Website ni Cruz</title>

</head>

<body class="body">
<div class="wrapper">

    <?php include '../includes/header-admin.php'; ?>

    <main class="main-content">
    <center>
    <h2> Search Page </h2><br>
            
    </center>
    </main>
    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>