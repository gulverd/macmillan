<?php
	$conn = mysqli_connect('localhost','root','','macmillan');

	if($conn == TRUE){
		//echo 'Connected';
	}else{
		echo 'Not Connected!';
	}