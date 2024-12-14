<?php
session_start();
if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] == 1) {
    header("Location: auth/login.php");
    exit();
}

$pageTitle = "Members page";

include 'includes/header.php';?>
?>
<main>
    <center>
    <h2 class="main-heading">Homepage for Members</h2>
    <p class="main-paragraph">Our content</p>
    <img src="" alt="image here" class="mainpage-image">
    </center>
</main>


<?php include 'includes/footer.php'; ?>
