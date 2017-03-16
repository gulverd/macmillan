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
	<?php 
		include 'admin/db.php';
		include 'navbar.php';
	?>
</div>
<div class="container">
	<div class="row" id="single_header_wpr">
	<h3 class="page-header">Testimonials</h3>
		<div class="col-md-1" id="padd">
			<div class="col-md-12 filter_menu" id="padd">
				<ul>
					<li><a href="#" class="years" id="all">All</a></li>
					<?php 
						$query2 = "SELECT DISTINCT testimonial_type FROM testimonials ORDER BY testimonial_type DESC";
						$run2   = mysqli_query($conn,$query2);

						while($row2 = mysqli_fetch_array($run2)){
							$type   = $row2['testimonial_type'];
							if($type == 1){
								$typeName = 'Articles';
							}elseif($type == 2){
								$typeName = 'Videos';
							}
							echo '<li><a href="#" class="years" id="'.$type.'">'.$typeName.'</a></li>';
						}
					?>
				</ul>
			</div>
		</div>
		<div class="col-md-11 trainingsa1" id="padd">
			<?php
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
								   		<div class="col-md-12" id="itemsai">
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
		<div class="col-md-11 trainingsa" id="padd">
			<img src="img/loader.gif" id="loading-image">
		</div>



</div>
</div>
	<?php include 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="app.js"></script>
</body>
</html>
<script type="text/javascript">
	
	$(document).ready(function(){
	    $('.years').click(function(){
	    	$('.trainingsa1').hide();
	    	var year = $(this).attr('id');
	    	$.ajax({
	    		url: "ajaxTestimonials.php",
	    		type: "POST",
	    		data: "year="+year,
	    		beforeSend: function() {
		              $("#loading-image").show();
		        },
	    		success: function (response) {
	                console.log(response);
	                $(".trainingsa").html(response);
	            },
	    	});
	    });

	});

</script>