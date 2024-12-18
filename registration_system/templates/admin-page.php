<?php
$config = include __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    if (isset($_SESSION['user_level'])) {
        header('Location: ' . BASE_URL .  'public/');
        exit();
    }
    header('Location: ' . BASE_URL .  'templates/auth/login.php');
    exit();
}

$pageTitle = "Admin page";
include 'includes/header.php';
?>

<main>
    <center>
    <h2 class="main-heading">Admin Dashboard</h2>
    <p>Updates for your website!</p>
    <img src="../public/images/dashboard.jpg" alt="dashboard" class="mainpage-image">
    </center>
</main>

<?php include 'includes/footer.php'; ?>
