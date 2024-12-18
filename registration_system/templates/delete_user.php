<?php
$config = include __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    if (isset($_SESSION['user_level'])) {
        header('Location: ' . BASE_URL .  'public/');
        exit();
    }
    header('Location: ' . BASE_URL .  'templates/auth/login.php');
    exit();
}

$pageTitle = 'Confirm?';
include 'includes/header-no-nav.php';
?>
<main>
<center>
<h2> Deleting Record... </h2><br>
        <?php
        if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
            $id = $_GET['id'];
        } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
            $id = $_POST['id'];
        } else {
            echo '<p>Invalid ID Number</p>';
            echo '<a href="' . BASE_URL . 'public/index.php">Home</a>';
            exit();
        }

        require_once __DIR__ . '/../src/mysqli_connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['sure'] == 'Yes') { // User pressed Yes
                // Delete the specific user
                $q = "DELETE FROM users WHERE id = $id";  // Use the correct column name
                $result = @mysqli_query($dbconnect, $q);

                if (mysqli_affected_rows($dbconnect) == 1) {
                    // Deleted successfully
                    echo '<p>Deleted Successfully</p>';
                    echo '<a href="register-view-users.php">View Users</a>';
                } else {
                    // Not deleted successfully
                    echo '<p>ERROR. Kindly Contact Administrator.</p>';
                }
            } else { // User pressed No
                $q = "SELECT CONCAT(fname, ' ', lname) FROM users WHERE id = '$id'";  // Use 'id' here
                $result = @mysqli_query($dbconnect, $q);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                echo "<p>$row[0] was not deleted.</p>";
                echo '<a href="register-view-users.php">View Users</a>';
            }
        } else {
            // Display form to confirm deletion
            $q = "SELECT CONCAT(fname, ' ', lname) FROM users WHERE id = '$id'";  // Use 'id' here
            $result = @mysqli_query($dbconnect, $q);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                echo "<h3>Are you sure you want to delete $row[0]?</h3>";
                echo '
                <form action="delete_user.php" method="post">
                    <input class="button-delete-id="submit-yes" type="submit" name="sure" value="Yes">
                    <input id="submit-no" type="submit" name="sure" value="No">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
                ';
            } else {
                echo '<h1>User not found pareh.</h1>';
                echo '<img src="https://i.pinimg.com/474x/27/6b/63/276b632832568d2a2d2dcca54ccb1e77.jpg" alt="BOOLAGAH" style="width:1400px;height:900px;"><br>';
                echo '  <form action="../src/register-page.php" method="get">
                        <br><button class="register-button" type="submit">Register A New User</button>
                        </form>';
            }
        }

        mysqli_close($dbconnect);
        ?>
</center>
</main>
<?php include '../includes/footer.php'; ?>