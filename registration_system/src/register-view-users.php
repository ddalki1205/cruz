<?php
    session_start();
    // Redirect to login if the user is not an admin
    if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1) {
        header("Location: ../public/login.php");
        exit();
    }

    require_once 'mysqli_connect.php';

    // Fetch all users
    $q = "SELECT fname, lname, email, DATE_FORMAT(registration_date, '%M %d, %Y') AS regdat, id FROM users ORDER BY id ASC";
    $result = @mysqli_query($dbconnect, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <title>Registered Users</title>
</head>

<body>
<div class="wrapper">

    <?php include '../includes/header-admin.php'; ?>

    <main class="main-content">
        <center><h2 class="main-heading">Registered Users</h2></center>

        <?php
            if ($result) {
                echo '<table> 
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered Date</th>
                            <th class="actions-column">Actions</th>
                        </tr>';

                // Loop through each user and display their details
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo '<tr>
                            <td>' . htmlspecialchars($row['fname'] . " " . $row['lname']) . '</td>
                            <td>' . htmlspecialchars($row['email']) . '</td>
                            <td>' . htmlspecialchars($row['regdat']) . '</td>
                            <td><center>
                                <!-- Edit Button -->
                                <a href="edit_user.php?id=' . urlencode($row['id']) . '" class="button_EDIT">Edit</a>
                                
                                <!-- Delete Button -->
                                <a href="delete_user.php?id=' . urlencode($row['id']) . '" class="button_DELETE">Delete</a>
                            </center></td>
                        </tr>';  // Closing the <tr> tag here
                }

                echo '</table>';  // Closing the <table> tag

                mysqli_free_result($result);
            } else {
                echo '<p class="error">Error fetching users: ' . mysqli_error($dbconnect) . '</p>';
            }

            mysqli_close($dbconnect);
        ?>

    </main>

    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>
