<?php
$config = include __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_level'])) {
    header('Location: ' . BASE_URL .  'templates/auth/login.php');
    exit();
}

$pageTitle = "Members page";
include 'includes/header.php';
?>

<main>
    <center>
    <h2 class="main-heading">Homepage for Members</h2>
    <p class="main-paragraph">Our content (WIP)</p>
    <img class="mem-content-img" src="<?php echo BASE_URL ?>public/images/wallpaper_minecraft_caves_cliffs(part1)_2560x1440.png" class="mainpage-image">
    </center>
</main>


<?php include 'includes/footer.php'; ?>
