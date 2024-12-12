<?php
    session_start();
    if(isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1)) {
        header(header: "Location: login.php");
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
    <link rel="stylesheet" type="text/css" href="../public/css/ad-col.css"> <!-- Add this line to include advertisement CSS -->
    
    <title>Members Page</title>

</head>

<body class="body">
<div class="wrapper">
    <?php include '../includes/header-mem.php'; ?>


    <div class="content-container"  >
        <main class="mem-content"><center>
            <h2 class="main-heading">Homepage for Members</h2>
            <p class="main-paragraph">Our content</p>
            <img src="" alt="image here" class="mainpage-image"></center>
        </main>

    </div>
    <?php include '../includes/about_members.php'; ?>

    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>
