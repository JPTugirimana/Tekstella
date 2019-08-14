<?php 
	
	// Connect to database
	$conn = mysqli_connect('localhost','JP','admin1','tekstella_lessons');

	// Check connection
	if(!$conn){
		echo 'Connection to Database Failed.'.' Error: '.mysqli_connect_error();
	}

	// Query for all Lessons
	$sql = 'SELECT title, details, id FROM lessons';

	// Get query results
	$result = mysqli_query($conn, $sql);

	// Fetch the resulting rows as an array
	// To get them in the form i can use
	$lessons = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Good practice to free the memory & close the connection
	mysqli_free_result($result);
	mysqli_close($conn);

	print_r($lessons);
 ?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<?php include('templates/footer.php'); ?>

</html>