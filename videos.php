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
<div class="container">
	<div class="row" id="single_header_wpr">
		<h3 class="page-header">Video Gallery</h3>
		<?php 
			
			include 'admin/db.php';

			$query = "SELECT * FROM videos ORDER BY id DESC";
			$run   = mysqli_query($conn,$query);

			while($row = mysqli_fetch_array($run)){
				$id    = $row['id'];
				$title = $row['title'];
				$youtube_url = $row['youtube_url'];
				$youtubeID  = substr(ltrim($youtube_url),32);

				echo '
				   	<div class="col-md-3 portfolio-item">
				   		<div class="col-md-12" id="itemsai">
		 					<div class="col-md-12" id="padd">
								<a href="single_video.php?post_id='.$id.'">
								    <img class="img-responsive" src="https://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg" id="main_training_pic" alt="">
								</a>
								<div class="col-md-12 info">
							    	<a href="single_video.php?post_id='.$id.'">'.$title.'</a>
								</div>
							</div>
							<a href="single_video.php?post_id='.$id.'">
								<div class="col-md-12 search_hov">
						    		<i class="fa fa-play-circle" aria-hidden="true"></i>
						    	</div>
					    	</a>
					    </div>
				    </div>
				';
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
