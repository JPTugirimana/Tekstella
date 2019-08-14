<?php 
	
	// Connect to database
	$conn = mysqli_connect('localhost','JP','admin1','tekstella_lessons');

	// Check connection
	if(!$conn){
		echo 'Connection to Database Failed.'.' Error: '.mysqli_connect_error();
	}

	// Query for all Lessons
	$sql = 'SELECT title, details, id FROM lessons ORDER BY created_at';

	// Get query results
	$result = mysqli_query($conn, $sql);

	// Fetch the resulting rows as an array
	// To get them in the form i can use
	$lessons = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Good practice to free the memory & close the connection
	mysqli_free_result($result);
	mysqli_close($conn);

	// Splitting items from the lists for better display in html
	//explode(',',$lessons[0]['details']);

 ?>

<!DOCTYPE html>
<html>

	<!-- Display the header -->
	<?php include('templates/header.php'); ?>

	<!--- Display Lesson Plans order by when they where created --->
	<h4 class="center grey-text"> Lessons: </h4>
	<div class="container">
		<div class="row">
			<?php foreach ($lessons as $lesson): ?>
				<div class="col s6 md3"> 
					<div class="card z-depth-0"> 
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($lesson['title']); ?></h5>
							<ul>
								<?php  foreach(explode(',',$lesson['details']) as $detail): ?>
									<li><?php echo htmlspecialchars($detail)  ?></li>
							<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action center-align">
						<a class="brand-text" href="#">more info</a>	
						</div>
					</div>
				</div> 

			<?php endforeach; ?>
		</div>
	</div>

	<!--- Display the Footer -->
	<?php include('templates/footer.php'); ?>

</html>