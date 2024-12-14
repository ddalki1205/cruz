<?php
$config = include __DIR__ . '/../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo BASE_URL .'public/images/bee.png'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'public/css/styles.css'; ?>">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Website ni Cruz'?></title>
</head>
<body>
    <!-- Header for members-->
    <?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 0): ?>
    <header>
        <?php include 'navbar.php'; ?>
    </header>



    <!-- Header for admins-->
    <?php elseif(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 1): ?>
    <header>
        <?php include 'navbar.php'; ?>
    </header>



    <!-- General header for guests -->
    <?php else: ?>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <?php endif?>