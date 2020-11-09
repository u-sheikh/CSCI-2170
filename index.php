<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Picturgram</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="about.php">Lorem Nullam</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addPost.php">add Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/logo.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Picturegram</h1>
            <span class="subheading">your life in pictures</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <?php
//
//          require_once 'serverLogin.php';
//
//
//          $conn = mysqli_connect($serverName,$dbName,$userName,$userPassword);
//          if (!$conn){
//              die("connection failed".mysqli_connect_error());
//          }
//            mysqli_close($conn);
          //following line of  code is used to open the csv file.
          $file_open = fopen("posts.csv", "r");
          fgetcsv($file_open);
          //The while loop goes through the posts.csv file and passes information to pos.pho
          // and prints useful information in index.php such as images and authors and dates these images were posted.
          while ($line_file = fgetcsv($file_open)) {
              # code...

              // the href takes in the data from the csv file like image information and comments file name
              // that are then being passed onto the post.php page
              ?>
             <a href="post.php?title=<?php echo($line_file[1]);?>&comment=<?php echo($line_file[4])?>" >
              <img src="img/<?php  echo($line_file[1]); ?>" style = " width: 720px; height: 380px "> </a>


              <?php
              // gets the caption for the image dynamically
              echo file_get_contents($line_file[3])."<br>";
              echo ("posted By  ");
                // following line will display the author name.
              ?>
              <a href="about.php" > <?php echo ($line_file[2]);?> </a>
              <?php
              echo(" on ");
              // following line will set the time zone to halifax.
              date_default_timezone_set('America/Halifax');
              echo( date("F jS, Y - g:ia", $line_file[0]))."<br>";


          }
          ?><br>
          <br>



        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                  <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
              </div>
          </div>
      </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
