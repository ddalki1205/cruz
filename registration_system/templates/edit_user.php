<?php
session_start();
if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    header("Location: ../public/login.php");
    exit();
}
$pageTitle = "Users";
include 'includes/header.php';
?>

<main>
    <h2> Edit User Record  </h2>
</main>
    
<?php include 'includes/footer.php'; ?>