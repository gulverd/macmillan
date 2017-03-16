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
		$date  = date('Y / m / d');
		$now   = date("YmdHms");
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Training Sessions & Conferences</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="trainings.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" placeholder="Training Title">
					</div>
					<div class="form-group">
						<label>Picture 1</label>
						<input type="file" name="image1" class="form-control">
					</div>
					<div class="form-group">
						<label>Picture 2</label>
						<input type="file" name="image2" class="form-control">
					</div>
					<div class="form-group">
						<label>Picture 3</label>
						<input type="file" name="image3" class="form-control">
					</div>
					<div class="form-group">
						<label>Training Year</label>
						<select class="form-control" name="year">
							<option>Select Training Year</option>
							<?php 
							
								$nowa = date('Y');

								for($i = $nowa; $i >= 2007; $i--){
									echo '<option value="'.$i.'">'.$i.'</option>';
								}

							?>
						</select>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="desc"></textarea>
		        		<script>
		           			CKEDITOR.replace('desc');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add training" class="btn btn-primary submit">
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
		$title 		  = $_POST['title'];
		$desc  		  = $_POST['desc'];
		$trainingYear = $_POST['year'];
		

		if(isset($_FILES['image1']) or isset($_FILES['image2']) or isset($_FILES['image3'])){
			$errors= array();
			$file_name1  = $_FILES['image1']['name'];
			$file_size1  = $_FILES['image1']['size'];
			$file_tmp1   = $_FILES['image1']['tmp_name'];
			$file_type1  = $_FILES['image1']['type'];   
			$file_ext1   = strtolower(end(explode('.',$_FILES['image1']['name'])));
			$extensions1 = array("jpeg","jpg","png"); 

			$file_name2  = $_FILES['image2']['name'];
			$file_size2  = $_FILES['image2']['size'];
			$file_tmp2   = $_FILES['image2']['tmp_name'];
			$file_type2  = $_FILES['image2']['type'];   
			$file_ext2   = strtolower(end(explode('.',$_FILES['image2']['name'])));
			$extensions2 = array("jpeg","jpg","png"); 

			$file_name3  = $_FILES['image3']['name'];
			$file_size3  = $_FILES['image3']['size'];
			$file_tmp3   = $_FILES['image3']['tmp_name'];
			$file_type3  = $_FILES['image3']['type'];   
			$file_ext3   = strtolower(end(explode('.',$_FILES['image3']['name'])));
			$extensions3 = array("jpeg","jpg","png");

			if(empty($errors)==true){

			    if($file_name1 == '' or is_null($file_name1)){
			    	$fl_name1 = '';
			    }else{
			    	$fl_name1    = $now.'1'.'.'.$file_ext1; 
			    	move_uploaded_file($file_tmp1,"..//imgs/covers/".$fl_name1);
			    }
			  	if($file_name2 == '' or is_null($file_name2)){
			    	$fl_name2 = '';
			    }else{
			    	$fl_name2    = $now.'2'.'.'.$file_ext2; 
			    	move_uploaded_file($file_tmp2,"..//imgs/covers/".$fl_name2);
			    }
			    if($file_name3 == '' or is_null($file_name3)){
			    	$fl_name3 = '';
			    }else{
			    	$fl_name3    = $now.'3'.'.'.$file_ext3;
			    	move_uploaded_file($file_tmp3,"..//imgs/covers/".$fl_name3);
			    }

				$queryI = "INSERT INTO trainings (title,content,pic_1,pic_2,pic_3,datee,year) VALUES ('$title','$desc','$fl_name1','$fl_name2','$fl_name3','$date','$trainingYear')";
				$runI   = mysqli_query($conn,$queryI);

			    header('Location: trainings.php');

			}else{

				$queryI = "INSERT INTO trainings (title,content,datee,year) VALUES ('$title','$desc','$date','$trainingYear')";
				$runI   = mysqli_query($conn,$queryI);

				header('Location: trainings.php');

			    print_r($errors);
			}
		}
	}
?>