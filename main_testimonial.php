<div class="row" id="main_trainings_row">
	<h3 class="page-header">Testimonials
        <small><a href="testimonials.php">View all Testimonials</a></small>
    </h3>
	<?php 
		
		include 'admin/db.php';

		$query = "SELECT * FROM testimonials ORDER BY id DESC LIMIT 4";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$id    		= $row['id'];
			$title 		= $row['testimonial_title'];
			$pic_1 		= $row['pic'];
			$video      = $row['video_url'];
			$post_type  = $row['testimonial_type'];
			$youtubeID  = substr(ltrim($video),32);
			if($pic_1 == '' or is_null($pic_1)){
				$picture1 = '<img src="imgs/macmillan.png"  id="main_training_pic">';
			}else{
				$picture1 = '<img src="imgs/testimonials/'.$pic_1.'" id="main_training_pic" class="img-responsive">';
			}
			if($post_type == 1){
				echo '
			   	<div class="col-md-3 portfolio-item">
			   		<div class="col-md-12" id="items">
				   		<div class="col-md-12" id="padd">
					        <a href="single_testimonial.php?post_id='.$id.'">
					           '.$picture1.'
					        </a>
					        <div class="col-md-12 info">
					            <a href="single_testimonial.php?post_id='.$id.'">'.$title.'</a>
					        </div>
					    </div>
					    <a href="single_testimonial.php?post_id='.$id.'">
						    <div class="col-md-12 search_hov">
						    	<i class="fa fa-search-plus" aria-hidden="true"></i>
						    </div>
					    </a>
					</div>
			    </div>';
			}else{
				echo '
			   	<div class="col-md-3 portfolio-item">
			   	   <div class="col-md-12" id="items">
				       <div class="col-md-12" id="padd">
							<a href="single_testimonial.php?post_id='.$id.'">
							    <img class="img-responsive" src="https://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg" id="main_training_pic" alt="">
							</a>
							<div class="col-md-12 info">
						    	<a href="single_testimonial.php?post_id='.$id.'">'.$title.'</a>
							</div>
						</div>
						<a href="single_testimonial.php?post_id='.$id.'">
							<div class="col-md-12 search_hov">
						    	<i class="fa fa-play-circle" aria-hidden="true"></i>
						    </div>
					    </a>
					</div>
			    </div>';
			}
			
		}

	?>


</div>