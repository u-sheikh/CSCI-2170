<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!== true){
    header("location:login.php");
    exit();
}


?>

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
      <a class="navbar-brand" href="about.php"><?php  echo $_SESSION['User_Name'] ?></a>
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
            <a class="nav-link" href="logout.php">logout</a>
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
        include_once 'function.php';
        $myquery= "SELECT * FROM posts,users where posts.userid = users.userid ORDER by posts.date DESC";
                //echo row [key] --> columns --> line file 1 post table

        $result = $conn->query($myquery);
        if ($result = $conn->query($myquery)) {
          while ($row = $result->fetch_assoc()) {


//          $conn = mysqli_connect($serverName,$dbName,$userName,$userPassword);
//          if (!$conn){
//              die("connection failed".mysqli_connect_error());
//          }
//            mysqli_close($conn);
          //following line of  code is used to open the csv file.
          //The while loop goes through the posts.csv file and passes information to pos.pho
          // and prints useful information in index.php such as images and authors and dates these images were posted.

              # code...

              // the href takes in the data from the csv file like image information and comments file name
              // that are then being passed onto the post.php page

              date_default_timezone_set('America/Halifax');
            ?>
            <a href="post.php?title=<?php echo($row["postImage"])?>&comment=<?php echo($row["post"])?> &post_id=<?php echo($row["postid"])?> &post_date=<?php echo($row["date"])?>" >
              <img src="img/<?php  echo($row["postImage"]); ?>" style = " width: 720px; height: 380px "> </a>


              <?php
              // gets the caption for the image dynamically
//              echo file_get_contents($line_file[3])."<br>";


//              $myquery_user= "SELECT name FROM users;";
//              //echo row [key] --> columns --> line file 1 post table
//              $result_user = $conn->query($myquery_user);
//              echo $result_user;
                // following line will display the author name.
              ?>
              <a href="about.php" > <?php echo ($row["post"]);?> </a>
              <br>
              <?php
              echo ("posted By: ");
              ?>
              <a href="about.php" > <?php echo ($row["name"]);?> </a>
              <?php
              echo(" on ");
              // following line will set the time zone to halifax.
              date_default_timezone_set('America/Halifax');
              echo( date("F jS, Y - g:ia", $row["date"]))."<br>";



              ?>
              <br>
              <br>

              <?php

            }
          }
          else {
            echo "Nothing here to display! Sorry!";
          }
          $conn->close();
//
//?>

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
