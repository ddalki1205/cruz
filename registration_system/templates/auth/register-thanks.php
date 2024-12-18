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
<main>
    <h1 class="heading">Thank You for Registering!</h1>
    <div class="thank-you-container">
            <p class="paragraph">Your registration was successful. You can now log in to your account.</p>
            <a href="<?php echo BASE_URL ?>/public/" class="homepage-link">Go to Homepage</a>
    </div>
</main>

<?php include '../includes/footer.php'; ?>