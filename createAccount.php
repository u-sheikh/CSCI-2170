
<?php
//session_start();
include_once 'function.php';
$_SESSION["loggedin"]= false;
$loggedIn = false;
if (isset($_POST["createAccount"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    $about = $_POST['about'];
    $name = $_POST['name'];
    $myquery = "SELECT * FROM login where username = '$username'";
    $result = $conn->query($myquery);
}
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dbusername = $row["username"];
            $dbpassword = $row["password"];
        }
    }
    if ($username != $dbusername) {


        $sql = "INSERT INTO users (name, about, aboutImage) VALUES ('$name', '$about', '$image')";
        $conn->query($sql);
        $insert_id = 0;

        $insert_id = $conn->insert_id;

        $sql2 = "INSERT INTO login ( userID, username,password) VALUES ( '$insert_id','$username', '$password')";
        $conn->query($sql2);

        echo "New user created successfully";
        $_SESSION["loggedin"] = true;
        $loggedIn = true;
        header("location: index.php");



    }
    else{
        echo "user already exists";
    }



$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

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
      <a class="navbar-brand">picturegram</a>
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
          <div class="page-heading">
            <h1>Picturegram</h1>
            <span class="subheading">LOGIN TO YOUR ACCOUNT</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form method="post" name="sentMessage" action="createAccount.php" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" placeholder=" Name" name="name" required data-validation-required-message="Please enter your  Name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Tell us about you</label>
              <input type="text" class="form-control" placeholder="tell us about you" name="about" required data-validation-required-message="Please tell us about yourself.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
            <div class="control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>image</label>
                    <input type="text" class="form-control"  placeholder=" your image"name="image" required data-validation-required-message="Please enter an image name.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Username</label>
                    <input type="text" class="form-control"  placeholder=" your name" name="username" required data-validation-required-message="Please enter a username.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="your password" name="password" required data-validation-required-message="Please enter a password.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" name="createAccount" id="sendMessageButton">create Account</button>
        </form>
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

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
