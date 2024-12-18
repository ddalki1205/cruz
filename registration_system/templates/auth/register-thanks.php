<?php
$config = include __DIR__ . '/../../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user_level'])) {
    header(header: "Location: ../../public/");
    exit();
}
$pageTitle = "Registration Success!";
include '../includes/header.php';

?>
<main class="ty-img">
    <center>
    <section class="thank-you-container">
    <h1 class="ty-heading">Thank You for Registering</h1>
    <p class="paragraph">You can now log in to your account.</p><br>
    <a class="navregister-button" href="<?php echo BASE_URL ?>/public/" class="homepage-link">Go to Homepage</a>
    </section>
    </center>
</main>

<?php include '../includes/footer.php'; ?>