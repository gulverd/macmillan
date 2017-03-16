<?php

	ob_start();

	include 'db.php';

	$training_id = $_GET['training_id'];
	
	$query4 = "DELETE FROM trainings WHERE id = '$training_id'";
	$run4   = mysqli_query($conn,$query4);

	header('location:trainings.php');
	
?>

