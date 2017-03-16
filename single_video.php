<?php
	include 'admin/db.php';
	$post_id = $_GET['post_id'];
	$query3 = "SELECT * FROM videos WHERE id = '$post_id'";
	$run3   = mysqli_query($conn,$query3);

	while($row3 = mysqli_fetch_array($run3)){
		$id3    		 = $row3['id'];
		$title3 		 = $row3['title'];
		$youtube_url3 	 = $row3['youtube_url'];
		$youtubeID3      = substr(ltrim($youtube_url3),32);
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
	<meta property="og:url"   content="http://englishbookgeorgia.com/single_video.php?post_id=<?php echo $id3;?>"/>
	<meta property="og:type"  content="article" />
	<meta property="og:title" content="<?php echo $title;?>" />
	<meta property="og:image" content="<img class='img-responsive' src='https://img.youtube.com/vi/<?php echo $youtubeID3;?>/maxresdefault.jpg'">
</head>
<body>
<div class="col-md-12" id="header_wrapper">	
	<?php include 'navbar.php';?>
</div>
<div class="container">
	<div class="col-md-9">
		<div id="main_trainings_row">
		<?php 
			
			include 'admin/db.php';

			$query = "SELECT * FROM videos WHERE id = '$post_id'";
			$run   = mysqli_query($conn,$query);

			while($row = mysqli_fetch_array($run)){
				$id    		 = $row['id'];
				$title 		 = $row['title'];
				$desc  		 = $row['description'];
				$youtube_url = $row['youtube_url'];
				$youtubeID  = substr(ltrim($youtube_url),32);
				echo '
				   	<div class="col-md-12" id="single_content_wrp">
				   		<div class="col-md-12" id="single_content_title_wrp">
				   			<h3>'.$title.'</h3>
				   		</div>
				   		<div class="col-md-12" id="single_content_pics_wrp">
				   			<div class="col-md-12">
				   				<iframe width="100%" height="500" src="https://www.youtube.com/embed/'.$youtubeID.'" frameborder="0" allowfullscreen></iframe>
				   			</div>
				   		</div>
				       	<div class="col-md-12" id="single_content_desc_wrp">
				       		'.$desc.'
				       	</div>
				    </div>
				';
			}

		?>
		</div>
	</div>
	<div class="col-md-3" id="sidebar_suggestions">
		<div class="col-md-12" id="single_content_title_wrp">
			<h3>Suggestions</h3>
		</div>
		<?php 
			$query2 = "SELECT * FROM videos WHERE id != '$post_id'";
			$run2   = mysqli_query($conn,$query2);

			while($row2 = mysqli_fetch_array($run2)){
				$id2    		 = $row2['id'];
				$title2 		 = $row2['title'];
				$desc2  		 = $row2['description'];
				$youtube_url2    = $row2['youtube_url'];
				$youtubeID2  	 = substr(ltrim($youtube_url2),32);

				echo '<div class="col-md-12 portfolio-item" id="padd">
						<div class="col-md-12" id="items">
					   		<div class="col-md-12" id="sidebar_suggs_wrp">
					  			<div class="col-md-12" id="padd">
							        <a href="single_video.php?post_id='.$id2.'">
							           <img class="img-responsive" src="https://img.youtube.com/vi/'.$youtubeID2.'/maxresdefault.jpg" alt="" id="main_training_pic">
							        </a>
							       	<div class="col-md-12 info">
						            	<a href="single_video.php?post_id='.$id2.'">'.$title2.'</a>
						        	</div>
							    </div>
							   	<a href="single_video.php?post_id='.$id.'">
									<div class="col-md-12 search_hov">
								    	<i class="fa fa-play-circle" aria-hidden="true"></i>
								    </div>
							    </a>
					   		</div>
					   	</div>
				      </div>';
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
