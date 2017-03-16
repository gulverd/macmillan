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
		$now   = date("YmdHms");
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonials</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="testimonials_posts.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp" id="testimonial_select">
				<div class="form-group">
					<div class="form-group">
						<label>Testimonial Type</label>
						<select name="testimonial_type" class="form-control" id="testimonial_type">
							<option>Please Choose Testimonial Type</option>
							<option value="1">Article</option>
							<option value="2">Video</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp" id="testimonial_article">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tesimonial Category</label>
						<select class="form-control" name="category">
							<?php
								$query = "SELECT * FROM testimonial_cats";
								$run   = mysqli_query($conn,$query);
								while($row = mysqli_fetch_array($run)){
									$id = $row['id'];
									$category_name = $row['testimonial_name'];
									echo '<option value="'.$id.'">'.$category_name.'</option>';
								}

							?>
						</select>
					</div>
					<div class="form-group">
						<label>Testimonial Title</label>
						<input type="text" name="testimonial_title" class="form-control" placeholder="Testimonial title">
					</div>
					<div class="form-group">
						<label>Person Full Name</label>
						<input type="text" name="full_name" class="form-control" placeholder="Full Name">
					</div>
					<div class="form-group">
						<label>Person Position</label>
						<input type="text" name="position" class="form-control" placeholder="Position">
					</div>
					<div class="form-group">
						<label>Person Picture</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description"></textarea>
		        		<script>
		           			CKEDITOR.replace('description');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit1" value="Add Testimonial" class="btn btn-primary submit">
					</div>
				</form>
			</div>
			
			<div class="col-md-12 dashboard_buttons_main_wrp" id="testimonial_video">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tesimonial Category</label>
						<select class="form-control" name="category1">
							<?php
								$query = "SELECT * FROM testimonial_cats";
								$run   = mysqli_query($conn,$query);
								while($row = mysqli_fetch_array($run)){
									$id = $row['id'];
									$category_name = $row['testimonial_name'];
									echo '<option value="'.$id.'">'.$category_name.'</option>';
								}

							?>
						</select>
					</div>
					<div class="form-group">
						<label>Testimonial Title</label>
						<input type="text" name="testimonial_title1" class="form-control" placeholder="Testimonial title">
					</div>
					<div class="form-group">
						<label>Person Full Name</label>
						<input type="text" name="full_name1" class="form-control" placeholder="Full Name">
					</div>
					<div class="form-group">
						<label>Person Position</label>
						<input type="text" name="position1" class="form-control" placeholder="Position">
					</div>
					<div class="form-group">
						<label>Youtube URL</label>
						<input type="text" name="video" class="form-control" placeholder="Youtube URL ">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description1"></textarea>
		        		<script>
		           			CKEDITOR.replace('description1');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit2" value="Add Testimonial" class="btn btn-primary submit">
					</div>
				</form>
			</div>



		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
<script type="text/javascript">

	$(document).ready(function(){

	    $('#testimonial_type').on("change",function () {
	        var testimonial_id = $(this).find('option:selected').val();

	     	if(testimonial_id == 1){
	     		$('#testimonial_article').show();
	     		$('#testimonial_video').hide();
	     	}else{
	     		$('#testimonial_video').show();
	     		$('#testimonial_article').hide();
	     	}
	    }); 

	});

</script>

<?php

	if(isset($_POST['submit1'])){

		$testimonial_title 	= $_POST['testimonial_title'];
		$full_name 			= $_POST['full_name'];
		$position 			= $_POST['position'];
		$description 		= $_POST['description'];
		$category 			= $_POST['category'];

		if(isset($_FILES['image'])){
			$errors 	 = array();
			$file_name   = $_FILES['image']['name'];
			$file_size   = $_FILES['image']['size'];
			$file_tmp    = $_FILES['image']['tmp_name'];
			$file_type   = $_FILES['image']['type'];   
			$file_ext    = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions  = array("jpeg","jpg","png"); 

			if($file_name == '' or is_null($file_name)){

				$queryI = "INSERT INTO testimonials (testimonial_title,full_name,position,description,testimonial_type,category_id) 
							VALUES ('$testimonial_title','$full_name','$position','$description',1,'$category')";
				$runI   = mysqli_query($conn,$queryI);

				header('Location: testimonials_posts.php');
			}else{
			
				$fl_name    = $now.'.'.$file_ext; 
				move_uploaded_file($file_tmp,"..//imgs/testimonials/".$fl_name);
				
				$queryI  	 	 = "INSERT INTO testimonials (testimonial_title,full_name,position,description,testimonial_type,pic,category_id) 
									VALUES ('$testimonial_title','$full_name','$position','$description',1,'$fl_name','$category')";
				$runI 			 = mysqli_query($conn,$queryI);
				
				header('Location: testimonials_posts.php');
			}

		}

	}

	if(isset($_POST['submit2'])){

		$testimonial_title1 = $_POST['testimonial_title1'];
		$full_name1 		= $_POST['full_name1'];
		$position1 			= $_POST['position1'];
		$description1 		= $_POST['description1'];
		$video 				= $_POST['video'];
		$category1 			= $_POST['category1'];

		

		$queryI = "INSERT INTO testimonials (testimonial_title,full_name,position,description,testimonial_type,video_url,category_id) 
					VALUES ('$testimonial_title1','$full_name1','$position1','$description1',2,'$video','$category1')";
		$runI   = mysqli_query($conn,$queryI);

		header('Location: testimonials_posts.php');
		

		

	}

?>