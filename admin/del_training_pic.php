<?php
	include 'db.php';
	$training_id = $_GET['training_id'];
	$pic_id		 = $_GET['pic'];

	if($pic_id == 1){
		$query = "UPDATE trainings SET pic_1 = '' WHERE id = '$training_id'";
		$run   = mysqli_query($conn,$query);
		header('Location: edit_training.php?training_id='.$training_id);
	}elseif($pic_id == 2){
		$query = "UPDATE trainings SET pic_2 = '' WHERE id = '$training_id'";
		$run   = mysqli_query($conn,$query);
		header('Location: edit_training.php?training_id='.$training_id);
	}elseif($pic_id == 3){
		$query = "UPDATE trainings SET pic_3 = '' WHERE id = '$training_id'";
		$run   = mysqli_query($conn,$query);
		header('Location: edit_training.php?training_id='.$training_id);
	}

?>