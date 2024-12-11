<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/web_design.css">
    <link rel="stylesheet" type="text/css" href="../public/css/info-col.css"> <!-- Add this line to include advertisement CSS -->
    
    <title>Website ni Cruz</title>

</head>

<body class="body">
<div class="wrapper">

    <?php include '../includes/header.php'; ?>

    <div class="content-container">
        <main class="main-content">
            <Center>
            <h2 class="main-heading">This is the Homepage</h2>
            <p class="main-paragraph">Note! the log in button will direct you to members page!<br>Click this temporary button to go to the ff:</p>
            <a href="admin-page.php" target="_blank" class="ad-button">Admin page</a>
            <a href="members-page.php" target="_blank" class="ad-button">Members page</a>
            <br>
            <div class="video-container">
                <iframe width="747" height="420" src="https://www.youtube.com/embed/Sz_wWzgh-vQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            </Center>
        </main>

        <!-- Advertisement Section -->
        <?php include '../includes/info-col.php'; ?>

    </div>

    <?php include '../src/about_us.php'; ?>
    
    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>
