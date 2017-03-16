<?php 
	
	include 'admin/db.php';

	$year = $_POST['year'];

	if($year == 'all' or $year == ''){

				$query = "SELECT * FROM testimonials ORDER BY id DESC";
				$run   = mysqli_query($conn,$query);

				while($row = mysqli_fetch_array($run)){
					$id    = $row['id'];
					$title = $row['testimonial_title'];
					$pic_1 = $row['pic'];
					$video = $row['video_url'];
					$youtubeID  = substr(ltrim($video),32);
					$post_type  = $row['testimonial_type'];

					if($pic_1 == '' or is_null($pic_1)){
						$picture1 = '<img src="imgs/macmillan.png"  id="main_training_pic" class="img-responsive">';
					}else{
						$picture1 = '<img src="imgs/testimonials/'.$pic_1.'" id="main_training_pic" class="img-responsive">';
					}

					if($post_type == 1){
									echo '
								   	<div class="col-md-3 portfolio-item">
								   		<div class="col-md-12" id="itemsai">
									   		<div class="col-md-12" id="padd">
										        <a href="single_testimonial.php?post_id='.$id.'">
										           '.$picture1.'
										        </a>
										        <div class="col-md-12 info">
										            <a href="single_testimonial.php?post_id='.$id.'">'.$title.'</a>
										        </div>
										    </div>
										    <a href="single.php?post_id='.$id.'">
											    <div class="col-md-12 search_hov">
											    	<i class="fa fa-search-plus" aria-hidden="true"></i>
											    </div>
										    </a>
										</div>
								    </div>';
								}else{
									echo '
								   	<div class="col-md-3 portfolio-item">
								   		<div class="col-md-12" id="itemsai">
									       <div class="col-md-12" id="padd">
												<a href="single_testimonial.php?post_id='.$id.'">
												    <img class="img-responsive" src="https://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg" id="main_training_pic" alt="">
												</a>
												<div class="col-md-12 info">
												    <a href="single_testimonial.php?post_id='.$id.'">'.$title.'</a>
												</div>
											</div>
											<a href="single_video.php?post_id='.$id.'">
												<div class="col-md-12 search_hov">
											    	<i class="fa fa-play-circle" aria-hidden="true"></i>
											    </div>
										    </a>
										</div>
								    </div>';
								}
				}
	}else{

				$query = "SELECT * FROM testimonials where testimonial_type = '$year' ORDER BY id DESC";
				$run   = mysqli_query($conn,$query);

				while($row = mysqli_fetch_array($run)){
					$id    = $row['id'];
					$title = $row['testimonial_title'];
					$pic_1 = $row['pic'];
					$video = $row['video_url'];
					$youtubeID  = substr(ltrim($video),32);
					$post_type  = $row['testimonial_type'];

					if($pic_1 == '' or is_null($pic_1)){
						$picture1 = '<img src="imgs/macmillan.png"  id="main_training_pic" class="img-responsive">';
					}else{
						$picture1 = '<img src="imgs/testimonials/'.$pic_1.'" id="main_training_pic" class="img-responsive">';
					}

					if($post_type == 1){
									echo '
								   	<div class="col-md-3 portfolio-item">
								   		<div class="col-md-12" id="itemsai">
									   		<div class="col-md-12" id="padd">
										        <a href="single_testimonial.php?post_id='.$id.'">
										           '.$picture1.'
										        </a>
										    	<div class="col-md-12 info">
									            	<a href="single_testimonial.php?post_id='.$id.'">'.$title.'</a>
									        	</div>
										    </div>
										    <a href="single.php?post_id='.$id.'">
											    <div class="col-md-12 search_hov">
											    	<i class="fa fa-search-plus" aria-hidden="true"></i>
											    </div>
										    </a>
									    </div>
								    </div>';
								}else{
									echo '
								   	<div class="col-md-3 portfolio-item">
								   		<div class="col-md-12" id="itemsai">
									        <div class="col-md-12" id="padd">
												<a href="single_testimonial.php?post_id='.$id.'">
												    <img class="img-responsive" src="https://img.youtube.com/vi/'.$youtubeID.'/maxresdefault.jpg" id="main_training_pic" alt="">
												</a>
												<div class="col-md-12 info">
											    	<a href="single_testimonial.php?post_id='.$id.'">'.$title.'</a>
												</div>
											</div>
											<a href="single_video.php?post_id='.$id.'">
												<div class="col-md-12 search_hov">
											    	<i class="fa fa-play-circle" aria-hidden="true"></i>
											    </div>
										    </a>
										</div>
								    </div>';
								}
				}
	}


?>
<script type="text/javascript">
	$('.portfolio-item').hover(
	  function() {
	    $(this).find('.search_hov').show("slow");
	  }, function() {
	    $(this).find('.search_hov').hide("slow");
	  }
	);
</script>