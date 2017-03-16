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
	<?php include 'nav_in.php';
		  include 'db.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Videos <a href="add_new_video.php">Add Video</a></h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<?php

					$query  = "SELECT * FROM videos ORDER BY id DESC";
					$run    = mysqli_query($conn,$query);

					if(mysqli_num_rows($run) >= 1){
						echo '<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td id="cent_td">Video</td>
									<td id="cent_td">Title</td>
									<td id="cent_td">Description</td>
									<td id="cent_td">Edit</td>
									<td id="cent_td">Delete</td>
								</tr>';

						while($row = mysqli_fetch_array($run)){
							$id    	  	= $row['id'];
							$video_url  = $row['youtube_url'];
							$title 		= $row['title'];
							$desc 	 	= $row['description'];
							$youtubeID  = substr(ltrim($video_url),32);

							if($desc == '' or is_null($desc)){
								$desc = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$desc = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							echo '<tr>
								<td id="cent_td">
									<iframe width="150" height="100" src="https://www.youtube.com/embed/'.$youtubeID.'" frameborder="0" allowfullscreen></iframe>
								</td>
								<td id="cent_td">'.$title.'</td>
								<td id="cent_td">'.$desc.'</td>
								<td id="cent_td"><a href="edit_video.php?video_id='.$id.'" class="btn btn-primary">Edit</a></td>
								<td id="cent_td"><a href="del_video.php?video_id='.$id.'" class="btn btn-danger">Delete</a></td>
							</tr>';
						}
						echo '</table>';
					}else{
						echo '<div class="alert alert-danger" role="alert">ამ დროისათვის არ არის ჩანაწერები!</div>';
					}

				?>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>