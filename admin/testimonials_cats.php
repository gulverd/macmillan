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
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Testimonial Categories</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="testimonials.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the previous page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Category Name</label>
						<input type="text" name="category_name" class="form-control" placeholder="Ex: Exams">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add Category" class="btn btn-primary submit">
					</div>
				</form>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">Category Name</td>
						<td id="cent_td">Posts</td>
						<td id="cent_td" class="table_rights">Edit</td>
						<td id="cent_td" class="table_rights">Remove</td>
					</tr>
					<?php 
						$query = "SELECT id as id, testimonial_name
						FROM testimonial_cats ORDER BY id ASC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];			
							$title_en   = $row['testimonial_name'];

							echo '<tr>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">';
								 $query3 = "SELECT count(*) as count FROM testimonials WHERE category_id = '$id'";
								 $run3   = mysqli_query($conn,$query3);

								 while ($row3 = mysqli_fetch_array($run3)) {
								 	$count 	= $row3['count'];
								 	echo $count;
								 }
														

							echo '</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_category.php?cat_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> Edit</a></button></td>								
								<td id="cent_td">
									<button type="button" data-toggle="modal" data-target="#myModal'.$id.'">
									  <span class="glyphicon glyphicon-trash" id="dl"></span>
									</button>
									<div class="modal fade" id="myModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
									      </div>
									      <div class="modal-body">
											<p>
												Are you sure you want to delete category: <span id="del">'.$title_en.'</span> ?
											</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal" id="butia">Cancel</button>
									        <button type="button" class="btn btn-danger" id="butia"><a href="del_category.php?cat_id='.$id.'"><span class="glyphicon glyphicon-trash"></span> წაშლა</a></button>
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

<?php 

	if(isset($_POST['submit'])){
		
		$category_name = $_POST['category_name'];

		$query2 = "INSERT INTO testimonial_cats (testimonial_name) VALUES ('$category_name')";
		$run2   = mysqli_query($conn,$query2);

		header('Location: testimonials_cats.php');

	}