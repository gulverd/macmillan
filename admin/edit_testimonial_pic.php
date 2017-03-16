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

		include 'db.php';
		include 'nav_in.php';
		
		$testimonial_id = $_GET['testimonial_id'];
		
		$now   = date("YmdHms");
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonials</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="edit_testimonial.php?testimonial_id=<?php echo $testimonial_id;?>" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="col-md-12">
						<div class="form-group">
							<label>Picture </label>
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Update Testimonial Picture" class="btn btn-primary submit">
						</div>
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

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name1  = $_FILES['image']['name'];
			$file_size1  = $_FILES['image']['size'];
			$file_tmp1   = $_FILES['image']['tmp_name'];
			$file_type1  = $_FILES['image']['type'];   
			$file_ext1   = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions1 = array("jpeg","jpg","png"); 

			if(empty($errors)==true){

			    $fl_name1    = $now.'1'.'.'.$file_ext1; 
			    move_uploaded_file($file_tmp1,"..//imgs/testimonials/".$fl_name1);
			    $queryI = "UPDATE testimonials SET pic ='$fl_name1' WHERE id = '$testimonial_id'";
				$runI   = mysqli_query($conn,$queryI);
			    header('Location: edit_testimonial.php?testimonial_id='.$testimonial_id);

			}
		}

	}
?>