<?php 
$pageTitle = "Website ni Cruz"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
    <title><?php echo $pageTitle ? $pageTitle : "Website"?></title>
</head>

<body class="body">
<?php include '../templates/includes/header.php'; ?>

<header class="welcome-header">
    <img src="images/wallpaper_minecraft_update_aquatic_2560x1440.png" alt="Welcome page image" class="welcome-header-image">
</header>

<main class="content-container">
    <section class="main-content">
            <center>
            <h2 class="main-heading">This is the Homepage</h2>
            <p class="main-paragraph">Note! the log in button will direct you to members page!<br>Click this temporary button to go to the ff:</p>
            <a href="admin-page.php" target="_blank" class="ad-button">Admin page</a>
            <a href="members-page.php" target="_blank" class="ad-button">Members page</a>

            <div class="video-container">
                <iframe width="747" height="420" src="https://www.youtube.com/embed/Sz_wWzgh-vQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </center>
    </section>

    <!-- Advertisement Section -->
    <?php include '../templates/includes/ad-col.php'; ?>
</main>

<?php include '../templates/includes/about.php'; ?>
<?php include '../templates/includes/footer.php'; ?>
</body>
</html>
