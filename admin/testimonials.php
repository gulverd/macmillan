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
		$now = date("Y / m / d");
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonials</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="dashboard.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-md-6 dashboard_buttonsi">
					<a href="testimonials_cats.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-list" aria-hidden="true"></i> Testimonial Categories</h2>
					</div>
					</a>
				</div>
				<div class="col-md-6 dashboard_buttonsi">
					<a href="testimonials_posts.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-file-video-o" aria-hidden="true"></i> Testimonials</h2>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
