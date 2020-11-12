<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>addPost</title>

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
            <h2 class="subheading">ADD NEW POST</h2>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
     <h3 class="post-title">  ADD a post </h3>
      </div>
    </div>
  </div>


  <article>
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <!-- Comments Form -->
              <div class="card my-4">
                  <h5 class="card-header">Add A Post:</h5>
                  <div class="card-body">
                      <!-- the following lines of code will display new comments added on a specific images along with already existing comments  -->
                      <form method="post"> Post:
                          <input type="text" class="form-control" name="newPost" />
                          <div class="form-group">

                          </div>


                      <form method="post"> Image FileName:
                          <input type="text" class="form-control" name="ImageFile" />
                          <div class="form-group">

                          </div>
                          <button type="submit" class="btn btn-primary" name="Submits">Submit</button>
                      </form>
                      </form>

                  </div>
              </div>
              <?php
              include_once 'function.php';

              $name = $_POST['newPost'];
              $name2= $_POST['ImageFile'];

              $date = date("Y-m-d  H:i:s", time());

              if(isset($_POST['Submits'])) {
                  if(empty($_POST['newPost'])=='submit'){

                  }
                  else {
                      date_default_timezone_set('America/Halifax');
                      $sql= "INSERT INTO posts (postid, userid, postImage, post, date) VALUES (NULL, '1', '$name2', '$name', CURRENT_TIMESTAMP);";
                      // echo "<br>";
                      if ($conn->query($sql) === TRUE) {
                          // echo "New record created successfully";
                      }
                      else {
                          // echo "Error: " . $sql. "<br>" . $conn->error;
                      }
                  }
              }
              ?>
              <!-- Single Comment -->
              <div class="media mb-4">

                  <div class="media-body">


                      <h5 class="mt-0"> </h5

                  </div>
              </div>


          </div>
      </div>
  </div>
  </article>


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
