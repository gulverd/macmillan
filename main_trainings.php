<div class="row" id="main_trainings_row">
	<h3 class="page-header">Training Sessions & Conferences
        <small><a href="trainings.php">View all Training Sessions & Conferences</a></small>
    </h3>
	<?php 
		
		include 'admin/db.php';

		$query = "SELECT * FROM trainings ORDER BY id DESC LIMIT 4";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$id    = $row['id'];
			$title = $row['title'];
			$pic_1 = $row['pic_1'];
			$datee = $row['datee'];
			if($pic_1 == '' or is_null($pic_1)){
				$picture1 = '<img src="imgs/macmillan.png"  id="main_training_pic">';
			}else{
				$picture1 = '<img src="imgs/covers/'.$pic_1.'" id="main_training_pic" class="img-responsive">';
			}
			echo '
			   	<div class="col-md-3 portfolio-item">
			   		<div class="col-md-12" id="items">
				   		<div class="col-md-12" id="padd">
					        <a href="single.php?post_id='.$id.'">
					           '.$picture1.'
					        </a>
						    <div class="col-md-12 info">
					            <a href="single.php?post_id='.$id.'">'.$title.'</a>
					        </div>
					    </div>
					    <a href="single.php?post_id='.$id.'">
						    <div class="col-md-12 search_hov">
						    	<i class="fa fa-search-plus" aria-hidden="true"></i>
						    </div>
					    </a>
				    </div>
			    </div>
			';
		}

	?>


</div>