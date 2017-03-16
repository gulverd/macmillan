<?php 
	
	include 'admin/db.php';

	$year = $_POST['year'];

	if($year == 'all' or $year == ''){

				$query = "SELECT * FROM trainings ORDER BY id DESC";
				$run   = mysqli_query($conn,$query);

				while($row = mysqli_fetch_array($run)){
					$id    = $row['id'];
					$title = $row['title'];
					$pic_1 = $row['pic_1'];
					$datee = $row['datee'];


					if($pic_1 == '' or is_null($pic_1)){
						$picture1 = '<img src="imgs/macmillan.png"  id="main_training_pic" class="img-responsive">';
					}else{
						$picture1 = '<img src="imgs/covers/'.$pic_1.'" id="main_training_pic" class="img-responsive">';
					}
					echo '
					   	<div class="col-md-3 portfolio-item">
					   		<div class="col-md-12" id="itemsa">
						   		<div class="col-md-12 training_wrp" id="padd">
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
		}else{
				$query = "SELECT * FROM trainings WHERE year = '$year' ORDER BY id DESC";
				$run   = mysqli_query($conn,$query);

				while($row = mysqli_fetch_array($run)){
					$id    = $row['id'];
					$title = $row['title'];
					$pic_1 = $row['pic_1'];
					$datee = $row['datee'];


					if($pic_1 == '' or is_null($pic_1)){
						$picture1 = '<img src="imgs/macmillan.png"  id="main_training_pic" class="img-responsive">';
					}else{
						$picture1 = '<img src="imgs/covers/'.$pic_1.'" id="main_training_pic" class="img-responsive">';
					}
					echo '
					   	<div class="col-md-3 portfolio-item">
					   		<div class="col-md-12" id="itemsa">
						   		<div class="col-md-12 training_wrp" id="padd">
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