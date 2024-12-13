<!-- For members navbar -->
<?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 0): ?>
<nav>
    <ul class="nav-buttons-container">
        <li class="nav-item"><a class="nav-button" href="../public/index.php">Main Homepage</a></li>
        <li class="nav-item"><a class="nav-button" href="../src/change-password.php">Change Password</a></li>
        <li class="nav-item"><a class="navregister-button" href="../public/logout.php">Log Out</a></li>
    </ul>
</nav>




<!-- For admin navbar -->
<?php elseif(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 1): ?>
<nav>
    <div class="nav-buttons-container">
        <li class="nav-item"><a class="nav-button" href="../public/index.php">Main Homepage</a></li>
        <li class="nav-item"><a class="nav-button" href="../public/admin-page.php">Admin Dashboard</a></li>
        <li class="nav-item"><a class="nav-button" href="../src/search.php">Search</a></li>
        <li class="nav-item"><a class="nav-button" href="../src/register-view-users.php">Registered Users</a></li>
        <li class="nav-item"><a class="nav-button" href="../src/register-page.php">Register</a></li>
        <li class="nav-item"><a class="nav-button" href="../src/change-password.php">Change Password</a></li>
        <li class="nav-item"><a class="nav-button" href="../public/logout.php">Log Out</a></li>
    </div>
</nav>






<!-- General navbar for guests -->
<?php else: ?>
<nav>
    <div class="nav-logo-container">
        <img class="navbar-logo" src="../public/images/bee.png" alt="Logo" />
    </div>
    <div class="nav-buttons-container">
        <li class="nav-item"><a class="nav-button" href="../public/index.php">Homepage</a></li>
        <li class="nav-item"><a class="nav-button" href="../public/login.php">Log In</a></li>
        <li class="nav-item"><a class="navregister-button" href="../src/register-page.php">Register</a></li>
    </div>
</nav>
<?php endif ?>