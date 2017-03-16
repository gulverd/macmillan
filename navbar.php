<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Macmillan for Georgia</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="trainings.php">Tranings & Conferences</a></li>  
          <li><a href="videos.php">Video Gallery</a></li>
          <li><a href="testimonials.php">Testimonials</a></li>
          <?php 
              
              include 'admin/db.php';
              
              $query = "SELECT id, page_name FROM pages ORDER by id ASC";
              $run   = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($run)){
                  $id = $row['id'];
                  $page_name = $row['page_name'];
                  echo '<li><a href="pages.php?page_id='.$id.'">'.$page_name.'</a></li>';
              }
          ?>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>