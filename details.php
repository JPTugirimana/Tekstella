<?php 
	
	// Connect to the database
	include('config/db_connect.php'); 

	if(isset($_POST['delete'])){
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM lessons WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			//success
			header('Location: index.php');
		} else {
			echo 'query error: ' . mysqli_error($conn);
		}

	}

	// check GET request id parameter
	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// create a sql query
		$sql = "SELECT * FROM lessons WHERE id = $id";

		// get query result
		$result = mysqli_query($conn, $sql);

		// fetch the 1 record result in array format
		$lesson = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);
	}
 ?>

 <!DOCTYPE html>
 <html>
 	<!-- Display the header -->
	<?php include('templates/header.php'); ?>

	<div class="container center">
		<?php if($lesson): ?>
			<h4><?php echo htmlspecialchars($lesson['title']); ?></h4>
			<p>Created by: <?php echo htmlspecialchars($lesson['email']); ?></p>
			<p>Date : <?php echo date($lesson['created_at']); ?></p>
			<h5>Details: </h5>
			<p><?php echo htmlspecialchars($lesson['details']); ?></p>

			<!--- Delete Form --->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $lesson['id'] ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>
		<?php else: ?>
			<h5>No such lesson exists in our records.</h5>
		<?php endif; ?>
	</div>

	<!--- Display the Footer -->
	<?php include('templates/footer.php'); ?>
 </html>