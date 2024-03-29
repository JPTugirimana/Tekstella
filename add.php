<?php 
	
	// Connect to the database
	include('config/db_connect.php'); 

	$email = $title = $details = '';
	$errors = array('email'=>'','title'=>'','details'=>'');

	if(isset($_POST['submit'])){
		//echo htmlspecialchars($_POST['email']);

		// Check Email
		if(empty($_POST['email'])){
			$errors['email'] =  'An email is required <br />';
		} else {
			//echo htmlspecialchars($_POST['email']).'<br />';
			$email = $_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email is not valid!';
			}
		}

		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required <br />';
		} else {
			//echo htmlspecialchars($_POST['title']);
			$title = $_POST['title'];
			if(!preg_match('/^[A-Za-z\s]+$/', $title)){
				$errors['title'] = 'Must be letters and spaces only. ';
			}
		}

		if(empty($_POST['details'])){
			$errors['details'] = 'At least one detail is required <br />';
		} else {
			$details = $_POST['details'];
			if(!preg_match('/^([A-Za-z\s]+)(,\s*[A-Za-z\s]*)*$/', $details)){
				$errors['details'] = 'Must be comma-separated words! ';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
			// errors get displayed in html codes
		} else {
			// Save to database
			//==================

			// First, proect data going in the database
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$details = mysqli_real_escape_string($conn, $_POST['details']);

			// Create sql query
			$sql = "INSERT INTO lessons(title,email,details) VALUES ('$title','$email','$details')";

			// Save to db and check
			if(mysqli_query($conn, $sql)){
				//success
				// Redirect to homepage
				//=======================
				header('Location: index.php');
			} else {
				// error
				echo 'query error: ' . mysqli_error($conn);
			}

		}

	} // the end of POST check
 ?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>


	<section class="container grey-text text-darken-3">
		<h4 class="center">Add a Curriculum</h4>
		<form class="hite" action="" method="POST">
			<label>Your Email:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email'] ?></div>
			<label>Curriculum Title</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title'] ?></div>
			<label>Details (comma separated): </label>
			<input type="text" name="details" value="<?php echo htmlspecialchars($details) ?>">
			<div class="red-text"><?php echo $errors['details'] ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>