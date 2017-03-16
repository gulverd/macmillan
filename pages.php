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
<?php 
	$page_id = $_GET['page_id'];
?>
<div class="col-md-12" id="header_wrapper">	
	<?php include 'navbar.php';?>
</div>
<div class="container">
	<div class="row" id="main_trainings_row">
	<?php 
		
		include 'admin/db.php';

		$query = "SELECT * FROM pages WHERE id = '$page_id'";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$id    		 = $row['id'];
			$title 		 = $row['page_name'];
			$desc  		 = $row['page_content'];
			$page_pic  	 = $row['page_pic'];
			if($page_pic == '' or is_null($page_pic)){
				$picture = '';
			}else{
				$picture = '<div class="col-md-12" id="single_content_pics_wrp">
			   			<div class="col-md-12">
			   				<img src="imgs/covers/'.$page_pic.'" id="imga">
			   			</div>
			   		</div>';
			}


			echo '
			   	<div class="col-md-12" id="single_content_wrp">
			   		<div class="col-md-12" id="single_content_title_wrp">
			   			<h3>'.$title.'</h3>
			   		</div>
			   		'.$picture.'
			       	<div class="col-md-12" id="single_content_desc_wrp">
			       		'.$desc.'
			       	</div>
			    </div>
			';
		}

	?>


</div>
</div>
	<?php include 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
