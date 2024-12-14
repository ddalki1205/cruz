<?php 
$pageTitle = "Buildboard";

include '../templates/includes/header.php';?>
<?php include '../templates/includes/bg-hero.php'; ?>



<div class="separator-design">
    <div class="sblock sblock-1"></div>
    <div class="sblock sblock-2"></div>
    <div class="sblock sblock-3"></div>
    <div class="sblock sblock-4"></div>
</div>

<main>
    <section class="main-content">
            <center>
            <?php include '../templates/auth/register-login.php'; ?>
            </center>
    </section>
    <section class="main-content">
    <?php include '../templates/includes/news.php'; ?>
    </section>

</main>
<?php include '../templates/includes/footer.php'; ?>