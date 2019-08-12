<?php 
	
	if(isset($_POST['submit'])){
		//echo htmlspecialchars($_POST['email']);

		// Check Email
		if(empty($_POST['email'])){
			echo 'An email is required <br />';
		} else {
			//echo htmlspecialchars($_POST['email']).'<br />';
			$email = $_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo 'Email is not valid!';
			}
		}

		if(empty($_POST['title'])){
			echo 'A title is required <br />';
		} else {
			//echo htmlspecialchars($_POST['title']);
			$title = $_POST['title'];
			if(!preg_match('/^[A-Za-z\s]+$/', $title)){
				echo 'Must be letters and spaces only. ';
			}
		}

		if(empty($_POST['details'])){
			echo 'At least one detail is required <br />';
		} else {
			$details = $_POST['details'];
			if(!preg_match('/^([A-Za-z\s]+)(,\s*[A-Za-z\s]*)*$/', $details)){
				echo 'Must be comma-separated words! ';
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
			<input type="text" name="email">
			<label>Curriculum Title</label>
			<input type="text" name="title">
			<label>Details (comma separated): </label>
			<input type="text" name="details">
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>