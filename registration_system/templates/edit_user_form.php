<main class="main-content-edit">
    <h2>Edit User Record</h2>
    <?php if (!empty($message)) echo $message; ?>
    <form class="container" action="edit_user.php" method="post">
        <p>
            <label class="label" for="fname">First Name</label><br>
            <input type="text" class="input-text" name="fname" size="30" maxlength="40" 
                   value="<?php echo htmlspecialchars($row['fname']); ?>">
        </p>

        <p>
            <label class="label" for="lname">Last Name</label><br>
            <input type="text" class="input-text" name="lname" size="30" maxlength="40" 
                   value="<?php echo htmlspecialchars($row['lname']); ?>">
        </p>

        <p>
            <label class="label" for="email">Email Address</label><br>
            <input type="text" class="input-text" name="email" size="30" maxlength="50" 
                   value="<?php echo htmlspecialchars($row['email']); ?>">
        </p>

        <p>
            <input type="submit" class="update-button" name="update" value="Update">
        </p>
        <p>
            <a href="register-view-users.php">
                <button type="button" class="go-back-button">Go Back</button>
            </a>
        </p>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    </form>
</main>
