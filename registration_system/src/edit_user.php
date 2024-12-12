<?php
    session_start();
    if(isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1)) {
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
    <link rel="stylesheet" type="text/css" href="../public/css/web_design.css">

    <title>Edit User - Website ni Cruz</title>

</head>

<body class="body">
    <?php include '../includes/header.php'; ?>

<div class="wrapper-edit">  
    <main class="main-content-edit">
        <h2> Edit User Record  </h2></center>

    </main>
    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>
