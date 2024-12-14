<?php
$config = include __DIR__ . '/../config/config.php';
session_start();
// Redirect to login if the user is not an admin
if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
    header('Location: ' . BASE_URL .  ' public/login.php');
    exit();
}

require_once __DIR__ . '/../src/mysqli_connect.php';

$q = "SELECT fname, lname, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, id FROM users ORDER BY id ASC";
$result = @mysqli_query($dbconnect, $q);

$pageTitle = "Users";
include 'includes/header.php';?>
?>

<main>
    <center>
    <h2 class="main-heading">Registered Users</h2></center>
    <?php
    if (!$result) {
        echo '<p class="error">Error fetching users: ' . mysqli_error($dbconnect) . '</p>';
        mysqli_free_result($result);
        mysqli_close($dbconnect);
        return;
    }
    echo '<table> 
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registered Date</th>
        <th class="actions-column">Actions</th>
    </tr>';

    // Loop through each user and display their details
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '
        <tr>
        <td>' . htmlspecialchars($row['fname'] . " " . $row['lname']) . '</td>
        <td>' . htmlspecialchars($row['email']) . '</td>
        <td>' . htmlspecialchars($row['regdat']) . '</td>
        <td><center>
            <!-- Edit Button -->
            <a href="edit_user.php?id=' . urlencode($row['id']) . '" class="button_EDIT">Edit</a>
            
            <!-- Delete Button -->
            <a href="delete_user.php?id=' . urlencode($row['id']) . '" class="button_DELETE">Delete</a>
        </center></td>
        </tr>';
    }

    echo '</table>';

    mysqli_free_result($result);

    mysqli_close($dbconnect);
    ?>
</main>
<?php include 'includes/footer.php'; ?>

