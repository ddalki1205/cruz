
<?php 
$pageTitle = "Change password";

include '../includes/header-no-nav.php';?>

<main>
    <button type="button" class="cancel-button" onclick="window.history.back();">Cancel Changes</button>

    <div class="container">
        <h1 class="form-title">Change Password</h1>

            <label for="email">Old Password:</label>
            <input type="email" name="email" id="email" class="input-field" value=" "><br>

            <label for="psword1">New Password:</label>
            <input type="password" name="psword1" class="input-field" id="psword1"><br>

            <a href="members-page.php" class="submit-button">Change</a>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
