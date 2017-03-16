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

		$query2 = "SELECT * FROM testimonials WHERE id = '$testimonial_id'";
		$run2   = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$title1 	= $row2['testimonial_title'];
			$full_name1 = $row2['full_name'];
			$position1 	= $row2['position'];
			$desc1 		= $row2['description'];
			$pic_1 		= $row2['pic'];
			$video1 	= $row2['video_url'];
			$cat_id1 	= $row2['category_id'];
			$post_type  = $row2['testimonial_type'];
		}

			$video_id  = substr(ltrim($video1),32);

		if($pic_1 == '' or is_null($pic_1)){
			$picture1 = '<img src="..//imgs/macmillan.png" id="training_pic">';
		}else{
			$picture1 = '<img src="..//imgs/testimonials/'.$pic_1.'" id="training_pic">';
		}

	?>	
	<div class="col-md-12" id="edt_testi_pica">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonials</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="testimonials_posts.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="col-md-7">
						<div class="form-group">
							<label>Testimonial Category</label>
							<select class="form-control" name="category">

								<?php
									$query3 = "SELECT * FROM testimonial_cats WHERE id = '$cat_id1'";
									$run3   = mysqli_query($conn,$query3);
									while($row3 = mysqli_fetch_array($run3)){
										$id3 			= $row3['id'];
										$category_name3 = $row3['testimonial_name'];
										echo '<option value="'.$id3.'">'.$category_name3.'</option>';
									}
									$query = "SELECT * FROM testimonial_cats WHERE id != '$cat_id1'";
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
							<input type="text" name="title" class="form-control" placeholder="Testimonial Title" value="<?php echo $title1;?>">
						</div>
					
						<div class="form-group">
							<label>Person Full Name</label>
							<input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php echo $full_name1;?>">
						</div>
						<div class="form-group">
							<label>Person Position</label>
							<input type="text" name="position" class="form-control" placeholder="Person Position" value="<?php echo $position1;?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="col-md-12">
							<div class="col-md-12" id="padd">
								<div class="col-md-6" id="padd">
									<a href="edit_testimonial_pic.php?testimonial_id=<?php echo $testimonial_id;?>"> ADD / Edit Picture</a>
								</div>
								<div class="col-md-6" id="padd">
									<a href="del_testimonial_pic.php?testimonial_id=<?php echo $testimonial_id;?>"> Delete Picture </a>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Featured Image</label>
									<?php echo $picture1;?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="desc"><?php echo $desc1;?></textarea>
			        		<script>
			           			CKEDITOR.replace('desc');
			       	 		</script>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Update Testimonial" class="btn btn-primary submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="edt_testi_vida">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonials</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="testimonials_posts.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="col-md-7">
						<div class="form-group">
							<label>Testimonial Category</label>
							<select class="form-control" name="category">

								<?php
									$query3 = "SELECT * FROM testimonial_cats WHERE id = '$cat_id1'";
									$run3   = mysqli_query($conn,$query3);
									while($row3 = mysqli_fetch_array($run3)){
										$id3 			= $row3['id'];
										$category_name3 = $row3['testimonial_name'];
										echo '<option value="'.$id3.'">'.$category_name3.'</option>';
									}
									$query = "SELECT * FROM testimonial_cats WHERE id != '$cat_id1'";
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
							<input type="text" name="title" class="form-control" placeholder="Testimonial Title" value="<?php echo $title1;?>">
						</div>
					
						<div class="form-group">
							<label>Person Full Name</label>
							<input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php echo $full_name1;?>">
						</div>
						<div class="form-group">
							<label>Person Position</label>
							<input type="text" name="position" class="form-control" placeholder="Person Position" value="<?php echo $position1;?>">
						</div>
						<div class="form-group">
							<label>Video URL</label>
							<input type="text" name="video" class="form-control" placeholder="Youtube URL" value="<?php echo $video1;?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="col-md-12">
							<div class="form-group">
								<label>Featured Video</label>
								<iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $video_id;?>" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="desca"><?php echo $desc1;?></textarea>
			        		<script>
			           			CKEDITOR.replace('desca');
			       	 		</script>
						</div>
						<div class="form-group">
							<input type="submit" name="submit2" value="Update Testimonial" class="btn btn-primary submit">
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
<script type="text/javascript">
	$(document).ready(function(){
	  	var testimonal_type = '<?php echo $post_type;?>';
	  	console.log(testimonal_type);

		if(testimonal_type == 1){
	     	$('#edt_testi_pica').show();
	     	$('#edt_testi_vida').hide();
	    }else{
	     	$('#edt_testi_vida').show();
	     	$('#edt_testi_pica').hide();
	    }
	});

</script>

<?php

	if(isset($_POST['submit'])){
		$testimonial_title = $_POST['title'];
		$testimonial_cat   = $_POST['category'];
		$full_name 		   = $_POST['full_name'];
		$position  		   = $_POST['position'];
		$desc 			   = $_POST['desc'];
	
		$queryI = "UPDATE testimonials SET testimonial_title = '$testimonial_title', full_name = '$full_name', position = '$position', 
						description = '$desc',category_id = '$testimonial_cat'
		 WHERE id = '$testimonial_id'";
		$runI   = mysqli_query($conn,$queryI);

		header('Location: edit_testimonial.php?testimonial_id='.$testimonial_id);
	}

	if(isset($_POST['submit2'])){
		$testimonial_title2 = $_POST['title'];
		$testimonial_cat2   = $_POST['category'];
		$full_name2 		= $_POST['full_name'];
		$position2  		= $_POST['position'];
		$desc2 			    = $_POST['desc'];
		$video2  			= $_POST['video'];
	
		$queryI = "UPDATE testimonials SET testimonial_title = '$testimonial_title2', full_name = '$full_name2', position = '$position2', 
						description = '$desc2',category_id = '$testimonial_cat2', video_url = '$video2'
		 WHERE id = '$testimonial_id'";
		$runI   = mysqli_query($conn,$queryI);

		header('Location: edit_testimonial.php?testimonial_id='.$testimonial_id);
	}
?>