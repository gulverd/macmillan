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
		
		$now    = date("YmdHms");
		
		$video_id = $_GET['video_id'];

		$query1 = "SELECT * FROM videos WHERE id = '$video_id'";
		$run1   = mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$title1 	  = $row1['title'];
			$youtube_url1 = $row1['youtube_url'];
			$description1 = $row1['description'];
		}

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
						<input type="text" class="form-control" name="title" value="<?php echo $title1;?>">
					</div>
					<div class="form-group">
						<label>Youtube URL</label>
						<input type="text" class="form-control" name="youtube_url" value="<?php echo $youtube_url1;?>">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description"><?php echo $description1;?></textarea>
		        		<script>
		           			CKEDITOR.replace('description');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary" value="Update">
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

		$query = "UPDATE videos SET title = '$title', description = '$description', youtube_url = '$youtube_url' WHERE id = '$video_id'";
		$run   = mysqli_query($conn,$query);

		header('Location: edit_video.php?video_id='.$video_id);
		
	}

?>