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
		
		$cat_id = $_GET['cat_id'];
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM testimonial_cats WHERE id  = '$cat_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$title_en1      = $row1['testimonial_name'];;
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonial Categories</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="testimonials_cats.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Testimonial Category Name</label>
						<input type="text" name="category_name" class="form-control" placeholder="Testimonial Category Name" value="<?php echo $title_en1;?>">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Update Category" class="btn btn-primary submit">
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
		$category_name = $_POST['category_name'];

		$query = "UPDATE testimonial_cats SET testimonial_name = '$category_name' WHERE id = '$cat_id'";
		$run   = mysqli_query($conn,$query);
			 
		header('Location: testimonials_cats.php');

	}