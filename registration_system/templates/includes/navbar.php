<!-- For members navbar -->
<?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 0): ?>
<nav>
    <div class="nav-logo-container">
        <img class="navbar-logo" src="<?php echo BASE_URL ?>public/images/bee.png" alt="Logo" />
    </div>
    <ul class="nav-buttons-container">
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/members-page.php">Content Page</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/auth/change-password.php">Change Password</a></li>
        <li class="nav-item"><a class="navregister-button" href="<?php echo BASE_URL ?>templates/auth/logout.php">Log Out</a></li>
    </ul>
</nav>




<!-- For admin navbar -->
<?php elseif(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 1): ?>
<nav>
    <div class="nav-logo-container">
        <img class="navbar-logo" src="<?php echo BASE_URL ?>public/images/bee.png" alt="Logo" />
    </div>
    <div class="nav-buttons-container">
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/admin-page.php">Admin Dashboard</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/members-page.php">Content Page</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/register-view-users.php">Registered Users</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>public/index.php">Register</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/auth/change-password.php">Change Password</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/auth/logout.php">Log Out</a></li>
    </div>
</nav>






<!-- General navbar for guests -->
<?php else: ?>
<nav>
    <div class="nav-logo-container">
        <img class="navbar-logo" src="<?php echo BASE_URL ?>public/images/bee.png" alt="Logo" />
    </div>
    <div class="nav-buttons-container">
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>public/index.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-button" href="<?php echo BASE_URL ?>templates/auth/login.php">Log In</a></li>
        <li class="nav-item"><a class="navregister-button" href="<?php echo BASE_URL ?>templates/auth/register.php">Register</a></li>
    </div>
</nav>
<?php endif ?>