<?php 
	include 'admin/db.php';

	$query = "SELECT * FROM keywords";
	$run   = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($run)){
		$words = $row['words'];
		echo $words;
	}
?>