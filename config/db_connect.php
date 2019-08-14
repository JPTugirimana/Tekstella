<?php  

	// Connect to database
	$conn = mysqli_connect('localhost','JP','admin1','tekstella_lessons');

	// Check connection
	if(!$conn){
		echo 'Connection to Database Failed.'.' Error: '.mysqli_connect_error();
	}


?>