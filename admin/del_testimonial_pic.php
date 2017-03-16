<?php
	include 'db.php';
	$testimonial_id = $_GET['testimonial_id'];

	
		$query = "UPDATE testimonials SET pic = '' WHERE id = '$testimonial_id'";
		$run   = mysqli_query($conn,$query);
		header('Location: edit_testimonial.php?testimonial_id='.$testimonial_id);
	

?>