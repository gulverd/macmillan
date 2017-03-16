<?php ob_start();?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>OnlineBookShop- Admin</title>
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
				<h2>კატეგორიები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>კატეგორიის დასახელება (ENG)</label>
						<input type="text" name="category_name" class="form-control" placeholder="კატეგორიის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>კატეგორიის სახეობა</label>
						<select class="form-control" name="category_type">
							<option value="1">სასწავლო</option>
							<option value="2">არა სასწავლო</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
					</div>
				</form>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">კატეგორიის დასახელება (ENG)</td>
						<td id="cent_td">ქვექატეგორიები</td>
						<td id="cent_td">წიგნები</td>
						<td id="cent_td" class="table_rights">რედაქტირება</td>
						<td id="cent_td" class="table_rights">წაშლა</td>
					</tr>
					<?php 
						$query = "SELECT id as id, category_name as category_name
						FROM categories ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    = $row['id'];			
							$title_en   = $row['category_name'];

							echo '<tr>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">';
								
								$query2 = "SELECT count(*) as sub_count FROM sub_categories where parent_id = '$id'";
								$run2   = mysqli_query($conn,$query2);

								while($row2 = mysqli_fetch_array($run2)){
									$count_sub = $row2['sub_count'];
									echo $count_sub;
								}

							echo '</td>
								<td id="cent_td">';
									$query3 = "SELECT count(*) as book_count FROM books where category_id = '$id'";
									$run3   = mysqli_query($conn,$query3);

								while($row3 = mysqli_fetch_array($run3)){
									$count_books = $row3['book_count'];
									echo $count_books;
								}
						echo'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_category.php?cat_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</a></button></td>								
								<td id="cent_td">
									<button type="button" data-toggle="modal" data-target="#myModal'.$id.'">
									  <span class="glyphicon glyphicon-trash" id="dl"></span>
									</button>
									<div class="modal fade" id="myModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">კატეგორიის წაშლა</h4>
									      </div>
									      <div class="modal-body">
											<p>
												დარწმუნებული ხართ რომ გინდათ წაშალოთ კატეგორია: <span id="del">'.$title_en.'</span> ?
												შეგახსენებთ რომ კატეგორიასთან ერთად წაიშლება მასში არსებული ქვეკატეგორიები და შესაბამისად მათშიც არსებული წიგნები!
											</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal" id="butia">ოპერაციის გაუქმება</button>
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
		$category_type = $_POST['category_type'];


		$query2 = "INSERT INTO categories (category_name,category_type) VALUES ('$category_name','$category_type')";
		$run2   = mysqli_query($conn,$query2);

		header('Location: categories.php');

	}