<div class="row" id="main_trainings_row">
	<h3 class="page-header">Video Gallery
        <small><a href="videos.php">View all videos</a></small>
    </h3>
	<?php 
		
		include 'admin/db.php';

		$query = "SELECT * FROM videos ORDER BY id DESC LIMIT 4";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$id    = $row['id'];
			$title = $row['title'];
			$youtube_url = $row['youtube_url'];
			$youtubeID  = substr(ltrim($youtube_url),32);

			echo '
			   	<div class="col-md-3 portfolio-item">
			   	   <div class="col-md-12" id="items">
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