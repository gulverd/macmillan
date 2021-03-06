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
</head>
<body>
	<?php 
		$now = date("Y / m / d");
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonials</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_testimonial.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add new Testimonial</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">Testimonial title</td>
						<td id="cent_td">Person</td>
						<td id="cent_td">Position</td>
						<td id="cent_td">Quote</td>
						<td id="cent_td">Picture</td>
						<td id="cent_td">Video</td>
						<td id="cent_td">Post Type</td>
						<td id="cent_td">Category</td>
						<td id="cent_td">Edit</td>
						<td id="cent_td">Delete</td>
					</tr>

					<?php 

						$query = "SELECT a.id as ida, a.testimonial_title,a.description,a.pic,a.video_url,a.testimonial_type,a.full_name,a.position,a.category_id,b.testimonial_name FROM testimonials a 
								JOIN testimonial_cats b ON a.category_id = b.id ORDER BY a.id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['ida'];			
							$title 	    = $row['testimonial_title'];
							$content    = $row['description'];
							$pic_1		= $row['pic'];
							$video      = $row['video_url'];
							$type 		= $row['testimonial_type'];
							$full_name 	= $row['full_name'];
							$position 	= $row['position'];
							$cageory_id = $row['category_id'];
							$catName    = $row['testimonial_name'];

							if($content == '' or is_null($content)){
								$content = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$content = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							if($pic_1 == '' or is_null($pic_1)){
								$pic_1 = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$pic_1 = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							if($video == '' or is_null($video)){
								$video = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$video = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							if($position == '' or is_null($position)){
								$position = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$position = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							if($type == 1){
								$type = 'Article';
							}elseif($type == 2){
								$type = 'Video';
							}

							echo '<tr>
								<td id="cent_td">'.$title.'</td>
								<td id="cent_td">'.$full_name.'</td>
								<td id="cent_td">'.$position.'</td>
								<td id="cent_td">'.$content.'</td>
								<td id="cent_td">'.$pic_1.'</td>
								<td id="cent_td">'.$video.'</td>
								<td id="cent_td">'.$type.'</td>
								<td id="cent_td">'.$catName.'</td>';
						echo'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_testimonial.php?testimonial_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> Edit</a></button></td>								
								<td id="cent_td">
									<button type="button" data-toggle="modal" data-target="#myModal'.$id.'">
									  <span class="glyphicon glyphicon-trash" id="dl"></span>
									</button>
									<div class="modal fade" id="myModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Delete Traning</h4>
									      </div>
									      <div class="modal-body">
											<p>
												Are you sure you want to delete : <span id="del">'.$title.'</span> ?
											</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal" id="butia">Cancel</button>
									        <button type="button" class="btn btn-danger" id="butia"><a href="del_testimonial.php?testimonial_id='.$id.'"><span class="glyphicon glyphicon-trash"></span> Delete</a></button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
								</td>
							</tr>'; 
						}

					?>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
