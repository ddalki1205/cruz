<?php
session_start();
if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    header("Location: auth/login.php");
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