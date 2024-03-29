<?php

session_start();
require 'function.php';

$loggedIn = false;

if(isset($_SESSION['loggedin'])){

  $loggedIn = true;

}



//echo row [key] --> columns --> line file 1 post table

if (isset($_POST['Username'])){

    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $myquery= "SELECT * FROM login where username = '".$username."' and password = '".$password."'";
    $result = $conn->query($myquery);


//        $result->bind_param("ss", $username, $password);
//        $result->execute();
    if ($result->num_rows>0){

        while ($row = $result->fetch_assoc()){
            $dbusername = $row["username"];
            $dbpassword = $row["password"];
            $dbuserID= $row["userID"];
            echo "Line 14";
            if ($username == $dbusername && $password == $dbpassword){
                $_SESSION['User_Name'] = $dbusername;
//                    $_SESSION['Password'] = $dbpassword;
                $_SESSION['user_ID'] = $dbuserID;
                $_SESSION['loggedin'] = true;
                $loggedIn = true;
                break;

            }
        }
    }


}

if ($loggedIn==true){
//    echo "Logged In";
    header("location: index.php");
}

//
//session_destroy();
//
//if(isset($_POST['user_name'])){
//  $_SESSION['user_name'] = $_POST['user_name'];
//  header("index.php");
//  die();
//
//}
//else {
//  # code...
//  unset($_SESSION['user_name']);
//  header("login.php");
//  die();
//
//}


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
        <form method="post" name="sentMessage" action="login.php" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>User Name</label>
              <input type="text" class="form-control" placeholder="User Name" name="Username" required data-validation-required-message="Please enter your User Name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="Password" required data-validation-required-message="Please enter your Password.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit"  class="btn btn-primary" name="loginButton" value="Login" >login</button>
            <button type="submit" formaction="createAccount.php" value="Create Account"> create account </button>

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
