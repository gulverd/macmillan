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
		
		$training_id = $_GET['training_id'];

		$query2 = "SELECT * FROM trainings WHERE id = '$training_id'";
		$run2   = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$title1 	= $row2['title'];
			$content1	= $row2['content'];
			$pic_1 		= $row2['pic_1'];
			$pic_2 		= $row2['pic_2'];
			$pic_3		= $row2['pic_3'];
			$year  		= $row2['year'];

		}

		if($pic_1 == '' or is_null($pic_1)){
			$picture1 = '<img src="..//imgs/macmillan.png" id="training_pic">';
		}else{
			$picture1 = '<img src="..//imgs/covers/'.$pic_1.'" id="training_pic">';
		}

		if($pic_2 == '' or is_null($pic_2)){
			$picture2 = '<img src="..//imgs/macmillan.png" id="training_pic">';
		}else{
			$picture2 = '<img src="..//imgs/covers/'.$pic_2.'" id="training_pic">';
		}

		if($pic_3 == '' or is_null($pic_3)){
			$picture3 = '<img src="..//imgs/macmillan.png" id="training_pic">';
		}else{
			$picture3 = '<img src="..//imgs/covers/'.$pic_3.'" id="training_pic">';
		}

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
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="col-md-12" id="padd">
								<div class="col-md-6" id="padd">
									<a href="edit_training_pic.php?training_id=<?php echo $training_id;?>&pic=1"> ADD / Edit Picture 1 </a>
								</div>
								<div class="col-md-6" id="padd">
									<a href="del_training_pic.php?training_id=<?php echo $training_id;?>&pic=1"> Delete Picture 1 </a>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Picture 1</label>
									<?php echo $picture1;?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12" id="padd">
								<div class="col-md-6" id="padd">
									<a href="edit_training_pic.php?training_id=<?php echo $training_id;?>&pic=2"> ADD / Edit Picture 2 </a>
								</div>
								<div class="col-md-6" id="padd">
									<a href="del_training_pic.php?training_id=<?php echo $training_id;?>&pic=2"> Delete Picture 2 </a>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Picture 2</label>
									<?php echo $picture2;?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12" id="padd">
								<div class="col-md-6" id="padd">
									<a href="edit_training_pic.php?training_id=<?php echo $training_id;?>&pic=3"> ADD / Edit Picture 3 </a>
								</div>
								<div class="col-md-6" id="padd">
									<a href="del_training_pic.php?training_id=<?php echo $training_id;?>&pic=3"> Delete Picture 3 </a>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Picture 3</label>
									<?php echo $picture3;?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Training Title" value="<?php echo $title1;?>">
						</div>
					
						<div class="form-group">
							<label>Training Year</label>
							<select class="form-control" name="year">
								<?php 
									echo  '<option value="'.$year.'">'.$year.'</option>';
									$now = date('Y');

									for($i = $now; $i >= 2007; $i--){
										echo '<option value="'.$i.'">'.$i.'</option>';
									}

								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="desc"><?php echo $content1;?></textarea>
			        		<script>
			           			CKEDITOR.replace('desc');
			       	 		</script>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Update Training" class="btn btn-primary submit">
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
		$title = $_POST['title'];
		$desc  = $_POST['desc'];
		$trainingYear = $_POST['year'];
	
		$queryI = "UPDATE trainings SET title = '$title', content = '$desc',year = '$trainingYear' WHERE id = '$training_id'";
		$runI   = mysqli_query($conn,$queryI);

		header('Location: edit_training.php?training_id='.$training_id);

	}
?>