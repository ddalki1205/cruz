<?php
$config = include __DIR__ . '/../../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <header>
        <?php include 'navbar.php'; ?>
    </header>