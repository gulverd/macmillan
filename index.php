<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Macmillan Education in Georgia</title>
	<meta name="keywords" content="<?php include 'keywords.php';?>">
	<meta property="og:url" content="http://englishbookgeorgia.com/macmillan" />
	<meta property="og:title" content="Macmillan Education in Georgia" />
	<meta property="og:image" content="http://englishbookgeorgia.com/macmillan/imgs/macmillan.png" />
</head>
<body>

<div class="col-md-12" id="header_wrapper">	
	<?php include 'navbar.php';?>
</div>
<div class="col-md-12" id="slide_show_wrapper">
	<?php include 'slide_show.php';?>
</div>
<div class="container">
	<?php 
		include 'main_trainings.php';
		include 'main_videos.php';
		include 'main_testimonial.php';
	?>
</div>
<?php include 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="app.js"></script>
</body>
</html>
