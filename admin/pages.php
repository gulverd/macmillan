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
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Pages</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_page.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add new page</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-striped table-hover table-bordered">
					<tr class="table_header">
						<td class="cent_td">Title</td>
						<td class="td_right">Description</td>
						<td class="td_right">Picture</td>
						<td class="td_right">Edit</td>
						<td class="td_right">Delete</td>
					</tr>
					<?php

						$query = "SELECT * FROM pages ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id        = $row['id'];
							$page_name = $row['page_name'];
							$page_desc = $row['page_content'];
							$page_pic  = $row['page_pic'];

							if($page_desc === '' or is_null($page_desc)){
								$page_desc = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$page_desc = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							if($page_pic === '' or is_null($page_pic)){
								$page_pic = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$page_pic = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							echo '
								<tr>
									<td>'.$page_name.'</td>
									<td id="td_right">'.$page_desc.'</td>
									<td id="td_right">'.$page_pic.'</td>
									<td id="td_right"><button class="btn btn-primary"><a href="edit_page.php?page_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> Edit</button></a></td>
									<td id="td_right">
									<button type="button" data-toggle="modal" data-target="#myModal'.$id.'">
									  <span class="glyphicon glyphicon-trash" id="dl"></span>
									</button>
									<div class="modal fade" id="myModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Delete Page</h4>
									      </div>
									      <div class="modal-body">
											<p>
												Are you sure you want delete page: <span id="del">'.$page_name.'</span> ?
											</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal" id="butia">Cancel</button>
									        <button type="button" class="btn btn-danger" id="butia"><a href="del_page.php?page_id='.$id.'"><span class="glyphicon glyphicon-trash"></span> Delete</a></button>
									      </div>
									    </div>
									  </div>
									</div>
									</td>
								</tr>
							';
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