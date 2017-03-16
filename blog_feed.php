<div class="row">
<?php


	$conna = mysqli_connect('http://englishbookgeorgia.com','englita2_puser','password888','englita2_blog');
	if($conna == TRUE){
		//echo 'connaected';
	}else{
		echo 'Not connaected!';
	}

	$query = "SELECT * FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' AND ID IN (
			  
			  SELECT tr.object_id
			  FROM wp_terms t 
			  INNER JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
			  INNER JOIN wp_term_relationships tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
			  WHERE tt.taxonomy='category' AND t.slug='articles'

			  UNION

			  SELECT tr.object_id
			  FROM wp_terms t 
			  INNER JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
			  INNER JOIN wp_term_relationships tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
			  WHERE tt.taxonomy='category' AND t.slug='teachernews-trainingconferences-didyouknow-facts-interestingwords-interestingpeople-onthisday-interestingwordsandexpressions')
			  ORDER BY RAND() LIMIT 4";


			$run   = mysqli_query($conna,$query);

			while($row = mysqli_fetch_array($run)){
					$id  	= $row['ID'];
					$title  = $row['post_title'];
					$link   = $row['guid'];

					$pic_id = $id + 1;

					$query2 = "SELECT guid as pic FROM wp_posts WHERE id = '$pic_id'";
					$run2   =  mysqli_query($conna,$query2);

					while($row2 = mysqli_fetch_array($run2)){

						$pic = $row2['pic'];

					
						if (preg_match('/(\.jpg|\.png|\.bmp)$/', $pic)) {
							$pict = $pic;
						}else{
							$pict = 'https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg';
						}

						echo '<div class="col-md-3 id="blog_feed_box_wrp">
								<div class="blog_fd_wrp">
									<div class="col-md-12">';
										echo '<img src="'.$pict.'" id="blog_feed_pic">
									</div>
									 <div class="col-md-12">
									 	'.$title.'
									 </div> 
								</div>
							</div>';
							
					}
			}
?>
</div>