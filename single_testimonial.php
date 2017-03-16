<?php 
	include 'admin/db.php';
	$post_id = $_GET['post_id'];
		
	$query3 = "SELECT * FROM trainings WHERE id = '$post_id'";
	$run3   = mysqli_query($conn,$query3);

	while($row3 = mysqli_fetch_array($run3)){
		$id3    = $row3['id'];
		$title3 = $row3['title'];
		$pic_13 = $row3['pic_1'];
		$desc3  = $row3['content'];
	}

?>
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
	<meta property="og:url"   content="http://englishbookgeorgia.com/single.php?post_id=<?php echo $id3;?>"/>
	<meta property="og:type"  content="article" />
	<meta property="og:title" content="<?php echo $title;?>" />
	<meta property="og:image" content="http://englishbookgeorgia.com/macmillan/imgs/covers/<?php echo $pic_13;?>" />
</head>
<body>
<div class="col-md-12" id="header_wrapper">	
	<?php include 'navbar.php';?>
</div>
<div class="container">
	<div class="col-md-9">
	<div class="row" id="main_trainings_row">
	<?php 

		$query = "SELECT * FROM testimonials WHERE id = '$post_id' ORDER BY id DESC";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
				$id    		= $row['id'];
				$title 		= $row['testimonial_title'];
				$pic_1 		= $row['pic'];
				$video 		= $row['video_url'];
				$desc  		= $row['description'];
				$youtubeID  = substr(ltrim($video),32);
				$post_type  = $row['testimonial_type'];
				$full_name  = $row['full_name'];
				$position 	= $row['position'];
				
				if($pic_1 == '' or is_null($pic_1)){
					$picture1 = '<img class="img-responsive" src="imgs/macmillan.png" alt="" id="imga">';
				}else{
					$picture1 = '
				   	<img class="img-responsive" src="imgs/testimonials/'.$pic_1.'" alt="" id="imga">';
				}

			if($post_type == 1){
				echo '
				   	<div class="col-md-12" id="single_content_wrp">
				   		<div class="col-md-12" id="single_content_title_wrp">
				   			<h3>'.$title.'</h3>
				   		</div>
				   		<div class="col-md-8">
				   			'.$picture1.'
						</div>
						<div class="col-md-4">
							<div class="col-md-12 fl_wrp" id="padd">
								'.$full_name.'
							</div>
							<div class="col-md-12 pst_wrp" id="padd">
								'.$position.'
							</div>
							<div class="col-md-12 dsc_wrp" id="padd">
				       			'.$desc.'
				       		</div>
				       	</div>
				    </div>
				';
			}else{
				echo '
				   	<div class="col-md-12" id="single_content_wrp">
				   		<div class="col-md-12" id="single_content_title_wrp">
				   			<h3>'.$title.'</h3>
				   		</div>
				   		<div class="col-md-8">
				   			<iframe width="100%" height="300" src="https://www.youtube.com/embed/'.$youtubeID.'" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 fl_wrp" id="padd">
								'.$full_name.'
							</div>
							<div class="col-md-12 pst_wrp" id="padd">
								'.$position.'
							</div>
							<div class="col-md-12 dsc_wrp" id="padd">
				       			'.$desc.'
				       		</div>
				       	</div>
				    </div>
				';				
			}
			
			
		}

	?>
	</div>
	</div>
	<div class="col-md-3" id="sidebar_suggestions">
		<div class="col-md-12" id="single_content_title_wrp">
			<h3>Suggestions</h3>
		</div>
		<?php 
			$query2 = "SELECT * FROM testimonials WHERE id != '$post_id' ORDER BY rand() LIMIT 10 ";
			$run2   = mysqli_query($conn,$query2);

			while($row2 = mysqli_fetch_array($run2)){
				$id2    = $row2['id'];
				$title2 = $row2['testimonial_title'];
				$pic_12 = $row2['pic'];
				$post_type2= $row2['testimonial_type'];
				$video2 		= $row2['video_url'];
				$youtubeID2  = substr(ltrim($video2),32);
				
				if($pic_12 == '' or is_null($pic_12)){
					$pic_sidebar = '<img class="img-responsive" src="imgs/macmillan.png" id="main_training_pic">';
				}else{
					$pic_sidebar = '<img class="img-responsive" src="imgs/testimonials/'.$pic_12.'" alt="" id="main_training_pic">';
				}
				if($post_type2 == 1){
									echo '<div class="col-md-12 portfolio-item" id="padd">
											<div class="col-md-12" id="items">
										   		<div class="col-md-12" id="sidebar_suggs_wrp">
										        	<div class="col-md-12" id="padd">
												        <a href="single_testimonial.php?post_id='.$id2.'">
												           '.$pic_sidebar.'
												        </a>
												        <div class="col-md-12 info">
											            	<a href="single_testimonial.php?post_id='.$id2.'">'.$title2.'</a>
											        	</div>
												    </div>
												    <a href="single_testimonial.php?post_id='.$id2.'">
													    <div class="col-md-12 search_hov">
													    	<i class="fa fa-search-plus" aria-hidden="true"></i>
													    </div>
												   	</a>
										   		</div>
										   	</div>
				      					</div>';	
				}else{
					echo '<div class="col-md-12 portfolio-item" id="padd">
							<div class="col-md-12" id="itemsai">
						   		<div class="col-md-12" id="sidebar_suggs_wrp">
						        	<div class="col-md-12" id="padd">
								        <a href="single_testimonial.php?post_id='.$id2.'">
								           <img class="img-responsive" src="https://img.youtube.com/vi/'.$youtubeID2.'/maxresdefault.jpg" id="main_training_pic" alt="">
								        </a>
								    </div>
								    <a href="single_testimonial.php?post_id='.$id2.'">
									    <div class="col-md-12 search_hov">
									    	<i class="fa fa-search-plus" aria-hidden="true"></i>
									    </div>
								   	</a>
						   		</div>
						   	</div>
				      </div>';
				}

			}

		?>
	</div>
</div>
	<?php include 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="app.js"></script>
</body>
</html>
