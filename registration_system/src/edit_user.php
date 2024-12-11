<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/web_design.css">

    <title>Edit User - Website ni Cruz</title>

</head>

<body class="body">
    <?php include '../includes/header.php'; ?>

<div class="wrapper-edit">  
    <main class="main-content-edit">
        <h2> Edit User Record  </h2></center>
        <?php
			if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
				$id = $_GET['id']; 
			} 
			elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
				$id = $_POST['id'];
			} 
			else {
				echo '<p class="error">This page has been accessed by mistake</p>';
				exit();
			}
			require('mysqli_connect.php');

			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$errors = array();
				if (empty($_POST['fname'])) { #check if the fname box is empty
					$errors[] = 'Please input your first name.';
				} else {
					$fn = trim($_POST['fname']);
				}

				if (empty($_POST['lname'])) { #check if the lname box is empty
					$errors[] = 'Please input your last name.';
				} else {
					$ln = trim($_POST['lname']);
				}

				if (empty($_POST['email'])) { #check if the email box is empty
					$errors[] = 'Please input your email.';
				}else {
					$e = trim($_POST['email']);
				}
				
				if(empty($errors)){ #if there are no errors
					$q ="UPDATE users 
						 SET fname='$fn', lname='$ln', email='$e' 
						 WHERE id = '$id' 
						 LIMIT 1";
					$result = @mysqli_query($dbconnect, $q);
					if (mysqli_affected_rows($dbconnect) == 1){
						echo '<p id="user_edited" class="message message-yehey">The record has been updated.</p>';
					} else {
						echo '<h3 class="message message-error">The system detected no changes to User.</h3>';
					}
				} else {
					echo '<p id="user_not_edited">The record was NOT updated.</p>';
				}
			}
			$q = "SELECT fname, lname, email FROM users where id=$id";
			$result = @mysqli_query($dbconnect, $q);
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				echo '
				<form class="edit-form" action="edit_user.php" method="post">
                    <p> <label class="label" for="fname"><br>First Name</label>
                        <input type="text" class="input-text" name="fname" size="30" maxlength="40"
                        value="'.$row["fname"].'"></p>

                    <p> <label class="label" for="lname"<br><br>Last Name</label>
                        <input type="text" class="input-text" name="lname" size="30" maxlength="40"
                        value="'.$row["lname"].'"></p>

                    <p> <label class="label" for="email"><br>Email Address</label>
                        <input type="text" class="input-text" name="email" size="30" maxlength="50"
                        value="'.$row["email"].'"></p><br>

                    <p> <input type="submit" class="update-button" name="update" value="Update"></p>
                    <p> <a href="register-view-users.php">
                        <button type="button" class="go-back-button">Go Back</button></a></p>
                    <p> <input type="hidden" name="id" value="'.$id.'"></p>
                </form>
				';
			} else {
				echo '<p class="error">This page has been accessed by mistake</p>';
                exit();
			}
		?>
    
    </main>
    <?php include '../includes/footer.php'; ?>

</div>
</body>
</html>
