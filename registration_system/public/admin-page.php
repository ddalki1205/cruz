<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/web_design.css">
    <link rel="stylesheet" type="text/css" href="../public/css/info-col.css"> <!-- Add this line to include advertisement CSS -->

    <title>Admin Page</title>

</head>

<body class="body">
<div class="wrapper">

    <?php include '../includes/header-admin.php'; ?>

    <div class="content-container">
        <main class="main-content">
            <h2 class="main-heading">This is the Homepage</h2>
            <p class="main-paragraph">Lorem ipsum odor amet, consectetuer adipiscing elit. Fermentum diam fermentum eros ornare
              magna adipiscing. Senectus malesuada viverra dictum dis faucibus vehicula est est.</p>

            <img src="../public/images/art.png" alt="art" class="mainpage-image">
        </main>

        <!-- Advertisement Section -->
        <?php include '../includes/info-col.php'; ?>

    </div>

    <?php include '../src/about_us.php'; ?>
    
    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>
