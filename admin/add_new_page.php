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
			<div class="col-md-12 buti_wrapper_partners">
				<a href="pages.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Page Title</label>
						<input type="text" name="page_name" class="form-control" placeholder="About Company">
					</div>
					<div class="form-group">
						<label>Page Picture</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label>Page Description</label>
						<textarea name="page_description"></textarea>
		        		<script>
		           			CKEDITOR.replace('page_description');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add Page" class="btn btn-primary submit">
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

		$page_name 			= $_POST['page_name'];
		$page_description	= $_POST['page_description'];

		if(isset($_FILES['image'])){
			$errors 	 = array();
			$file_name   = $_FILES['image']['name'];
			$file_size   = $_FILES['image']['size'];
			$file_tmp    = $_FILES['image']['tmp_name'];
			$file_type   = $_FILES['image']['type'];   
			$file_ext    = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions  = array("jpeg","jpg","png"); 

			if($file_name == '' or is_null($file_name)){

				$queryI = "INSERT INTO pages (page_name,page_content) VALUES ('$page_name','$page_description')";
				$runI   = mysqli_query($conn,$queryI);

				header('Location: pages.php');
			}else{
			
				$fl_name    = $now.'.'.$file_ext; 
				move_uploaded_file($file_tmp,"..//imgs/pages/".$fl_name);
				
				$queryI  	 	 = "INSERT INTO pages (page_name,page_content,page_pic) VALUES ('$page_name','$page_description','$fl_name')";
				$runI 			 = mysqli_query($conn,$queryI);
				
				header('Location: pages.php');
			}

		}

		

	}