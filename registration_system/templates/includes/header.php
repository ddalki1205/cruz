<!-- Header for members-->
<?php if(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 0): ?>
<header>
    <?php include 'navbar.php'; ?>
</header>



<!-- Header for admins-->
<?php elseif(isset($_SESSION['user_level']) && $_SESSION['user_level'] === 1): ?>
<header>
    <?php include 'navbar.php'; ?>
</header>



<!-- General header for guests -->
<?php else: ?>
<header>
    <?php include 'navbar.php'; ?>
</header>
<?php endif?>