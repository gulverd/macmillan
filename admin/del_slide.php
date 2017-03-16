<?php

	include 'db.php';

	$slide_id = $_GET['slide_id'];

	$query = "DELETE FROM slider WHERE id = '$slide_id'";
	$run   =  mysqli_query($conn,$query);

	header('Location: slider.php');

?>