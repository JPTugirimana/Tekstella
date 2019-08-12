
<?php
 
 //$string1 = "Hello JP. First PHP Script.";
 // $string2 = " Second line";
 //echo $string1.$string2;

/* $blogs = [
 	'one'=>['Title' => 'Mangoes', 'Likes'=>20],
 	'two'=>['Title' => 'Bananas', 'Likes'=>3]
 ];*/

 /*$blogs = [
 	['Title' => 'Mangoes3', 'Likes'=>20],
 	['Title' => 'Bananas', 'Likes'=>3]
 ];
 */

/* $u = 1;
 foreach ($blogs as $blog) {
 			// print_r( $blog['Title'].$blog['Likes'].'    ');
 		echo $u.'. '. $blog['Title'].' '.$blog['Likes'].'<br />';
 		$u++;
 	 }*/
 	
 /*	$i = 0;

 	while($i < count($blogs))
 	{
 		echo $blogs[$i]['Likes'].'<br />';
 		$i++;
 	}*/


 	//========calling php inside HTML ==example
 	/*<ol>
		<?php foreach ($blogs as $blog){ 

			 if ($blog['Likes'] < 10) { ?>
				<li><?php  print_r( $blog['Title'].': '.$blog['Likes']." Likes"); ?> </li>
		<?php	}
 			
 		 } ?>
	</ol>*/


 ?> 

<?php 

function sayHello()
{
	echo "Jaaay P";
}

//sayHello();
?>

<!DOCTYPE html>
<html>
<head>
	<title>JP: PHP 101</title>
</head>
<body>
	<h1>JP: Tutorial 101</h1>

	<h4>   Blog archives</h4>
 <?php sayHello(); ?>
	

</body>
</html>



