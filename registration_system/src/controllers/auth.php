<?php
    session_start();
    // Redirect to login if the user is not an admin
    if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
        header("Location: ../public/login.php");
        exit();
    }
?>