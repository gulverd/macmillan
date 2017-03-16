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
		$query2  = "SELECT * FROM contact";
		$run2    = mysqli_query($conn,$query2);

		if(mysqli_num_rows($run2) >= 1){
			while($row2 = mysqli_fetch_array($run2)){
				$c_phone1      = $row2['phone_1'];
				$c_phone2      = $row2['phone_2'];
				$c_address1    = $row2['address_1'];
				$c_address2    = $row2['address_2'];
				$c_email       = $row2['email'];
				$c_facebook    = $row2['facebook_url'];
				$c_web 		   = $row2['web'];
			}
		}else{
				$c_phone1      = '';
				$c_phone2      = '';
				$c_address1    = '';
				$c_address2    = '';
				$c_email       = '';
				$c_facebook    = '';
				$c_web 		   = '';
		}

	
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>Contact Information</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post">
					<div class="form-group">
						<label>Phone 1</label>
						<input type="text" name="phone1" class="form-control" placeholder="Ex: 599999999" value="<?php echo $c_phone1;?>">
					</div>
					<div class="form-group">
						<label>Phone 2</label>
						<input type="text" name="phone2" class="form-control" placeholder="Ex: 599999999" value="<?php echo $c_phone2;?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Ex: info@englishbook.ge" value="<?php echo $c_email;?>">
					</div>
					<div class="form-group">
						<label>Address 1</label>
						<input type="text" name="address1" value="<?php echo $c_address1;?>" class="form-control" placeholder="Chavchavadze 14 , Tbilisi , Georgia">
					</div>
					<div class="form-group">
						<label>Address 2</label>
						<input type="text" name="address2" value="<?php echo $c_address2;?>" class="form-control" placeholder="Chavchavadze 14 , Tbilisi , Georgia">
					</div>
					<div class="form-group">
						<label>Facebook url</label>
						<input type="text" name="facebook_url" class="form-control" placeholder="Ex: https://facebook.com/ebg" value="<?php echo $c_facebook;?>">
					</div>
					<div class="form-group">
						<label>Web</label>
						<input type="text" name="web" class="form-control" placeholder="Ex: https://englishbookgeorgia.com/" value="<?php echo $c_web;?>">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Update" class="btn btn-primary submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php

	if(isset($_POST['submit'])){
			$phone1     = $_POST['phone1'];
			$phone2     = $_POST['phone2'];
			$email      = $_POST['email'];
			$address1   = $_POST['address1'];
			$address2   = $_POST['address2'];
			$facebook   = $_POST['facebook_url'];
			$web    	= $_POST['web'];;


		$query = "UPDATE 
		contact 
		SET phone_1 = '$phone1', 
			phone_2 = '$phone2',
			email   = '$email',
			address_1 = '$address1',
			address_2 = '$address2',
			facebook_url = '$facebook',
			web = '$web'";
		$run   = mysqli_query($conn,$query);

		header('Location: contact.php');
	}