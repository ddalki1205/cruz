<?php
session_start();
if(isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1)) {
    header(header: "Location: ../public/login.php");
    exit();
}
$pageTitle = "Registration Success!";
include '../includes/header.php';

?>
<main>
    <h1 class="heading">Thank You for Registering!</h1>
    <div class="thank-you-container">
        <p class="paragraph">Your registration was successful. You can now log in to your account.</p>
        <a href="../public/index.php" class="homepage-link">Go to Homepage</a>
    </div>
</main>

<?php include '../includes/footer.php'; ?>