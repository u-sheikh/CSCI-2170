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

  <title>About</title>

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
<?php

$userid= $_SESSION['user_ID'];
include_once "function.php";
$myquery= "SELECT * FROM users where userid = '$userid'";
//echo $myquery;
$result = $conn->query($myquery);

if ($result = $conn->query($myquery)) {
//    echo "------------Here---------\n";
//    $row = $result->fetch_assoc();
//    echo "$row";
    while ($row = $result->fetch_assoc()) {
//        echo "%s (%s, %s, %s)<br>", $row["userid"];


?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="about.php"><?php echo $_SESSION['User_Name']; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php"><?php echo  $_SESSION['User_Name'];?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addPost.php">Add Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" >Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/<?php echo $row["aboutImage"]; ?>')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1><?php  echo $_SESSION['User_Name']?></h1>
            <span class="subheading">This is what I do.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <p>  <?php echo ($row["about"]."<br>"); ?> </p>

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

<?php

    }
}
else {
    echo "Nothing here to display! Sorry!";
}
$conn->close();

?>
</body>

</html>
