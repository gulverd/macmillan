<?php ob_start();?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Macmillan Georgia - Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
</head>
<body>
	<?php 
		include 'nav_in.php';
		include 'db.php';
		$now   = date("YmdHms");
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Videos</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label>Youtube URL</label>
						<input type="text" class="form-control" name="youtube_url">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description"></textarea>
		        		<script>
		           			CKEDITOR.replace('description');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Add video">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>


<?php

	if(isset($_POST['submit'])){

		$title 		 = $_POST['title'];
		$description = $_POST['description'];
		$youtube_url = $_POST['youtube_url'];

		$query = "INSERT INTO videos (title, description, youtube_url) VALUES ('$title','$description','$youtube_url')";
		$run   = mysqli_query($conn,$query);

		header('Location: videos.php');
		
	}

?>