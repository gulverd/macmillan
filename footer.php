<div class="col-md-12" id="footer_wrp">
	<?php
		include 'admin/db.php';

		$query = "SELECT * FROM contact";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$phone_1 	= $row['phone_1'];
			$phone_2 	= $row['phone_2'];
			$address_1  = $row['address_1'];
			$address_2  = $row['address_2'];
			$email  	= $row['email'];
			$web 	    = $row['web'];
			$fb 		= $row['facebook_url'];
		
		}

	?>
	<ul id="footer_menu">
		<li><i class="fa fa-phone" aria-hidden="true"></i> : <a href="tel: <?php echo $phone_1;?>"><?php echo $phone_1;?></a></li>
		<li><i class="fa fa-phone" aria-hidden="true"></i> : <a href="tel: <?php echo $phone_2;?>"><?php echo $phone_2;?></a></li>
		<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $address_1;?></li>
		<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $address_2;?></li>
		<li><i class="fa fa-envelope-o" aria-hidden="true"></i> : <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></li>
		<li><a href="<?php echo $web;?>"><i class="fa fa-link" aria-hidden="true"></i> englishbookgeorgia.com</a></li>
		<li><a href="<?php echo $fb;?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Find us</a></li>
	</ul>
</div>