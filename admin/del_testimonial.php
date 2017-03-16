<?php

	include 'db.php';

	$testimonial_id = $_GET['testimonial_id'];

	$query = "DELETE FROM testimonials WHERE id = '$testimonial_id'";
	$run   =  mysqli_query($conn,$query);

	header('Location:testimonials_posts.php');

?>