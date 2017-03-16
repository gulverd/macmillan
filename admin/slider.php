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
				<h2>Slider <a href="add_new_slide.php">Add Slide</a></h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<?php

					$query  = "SELECT * FROM slider";
					$run    = mysqli_query($conn,$query);

					if(mysqli_num_rows($run) >= 1){
						echo '<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td id="cent_td">Slider Picture</td>
									<td id="cent_td">Delete</td>
								</tr>';
						while($row = mysqli_fetch_array($run)){
							$id    	  = $row['id'];
							$pic_url  = $row['slider_pic'];
							echo '<tr>
								<td id="cent_td"><img src="../imgs/slider/'.$pic_url.'" id="slide_pc"></td>
								<td id="cent_td"><a href="del_slide.php?slide_id='.$id.'" class="btn btn-danger">Delete</a></td>
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