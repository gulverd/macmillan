<?php
	
	ob_start();
	include 'db.php';

	$cat_id = $_GET['cat_id'];

		
	$query  = "DELETE FROM testimonial_cats WHERE id = '$cat_id'";
	$run    = mysqli_query($conn,$query);

	$query3 = "DELETE FROM testimonials WHERE category_id = '$cat_id'";
	$run3   = mysqli_query($conn,$query3);
		
	header('location:testimonials_cats.php');
	
?>

