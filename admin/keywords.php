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
</head>
<body>
	<?php 
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';
		$query2  = "SELECT * FROM keywords";
		$run2    = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$keywords = $row2['words'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Keywords</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Keywords (სიტყვები გამოყავით მძიმეებით)</label>
						<textarea name="desc_en" class="form-control" rows="10"><?php echo $keywords;?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Update" class="btn btn-primary submit">
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
		$desc_en 	 = $_POST['desc_en'];


		$query = "UPDATE keywords SET words = '$desc_en'";
		$run   = mysqli_query($conn,$query);

		header('Location: keywords.php');
	}