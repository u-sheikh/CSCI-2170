<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

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

  <?php
  $getTitle= $_GET["title"];
  $getPost = $_GET["comment"];
  $getComment= $_POST["comment"];
  include_once 'function.php';
  // following variables take in information passed from the index.php page.
  // get title  variable is responsible for taking image data
  //get comments variable is responsible for taking in comments information and using that information
  // to call files containing comments and then displaying
  ?>



  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/<?php echo($getTitle);?>')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $getPost?></h1>
            <span class="meta">Posted by
              <a href="about.php">Lorem Nullam</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <!-- the following lines of code will display new comments added on a specific images along with already existing comments  -->
                    <form method="post" action="post.php?title=<?php echo($getTitle);?>">
                        <input type="hidden" name="title" value="<?php echo ($getComment); ?>"/>
                        <input type="text" name="comment" />
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

            <!-- Single Comment -->
            <div class="media mb-4">

                <div class="media-body">


                    <h5 class="mt-0"> </h5>

                    <?php
                    #todo: add sql statements to the post file where a comment is added. according to post name
                    // the following lines of code do: 1. get contents from the comment files for the specific images selected.
                    //2. create an array for the comments that is then used to display all the comments for a post.
                    $content = file_get_contents($getComment);
                    $array = explode("\n",$content);
                    $arrayLen= count($array);
                    // the following if-else checks and adds newly typed comments to the already existing comments of an image.
                    if(isset($_POST['comment'])) {
                        if(empty($_POST['comment'])=='Submit'){
                            $name = "(Not entered)";echo $name;
                        }
                        else {
                            $name = $_POST['comment'];
//                            ?>
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <!--                            --><?php
                            echo( date("F jS, Y - g:ia", time()))."<br>";
                            echo ($name);
                            #todo: add sql query here for var name
                            $myquery_insert= "INSERT INTO comments(postid,COMMENT,date) VALUES (5, $name,CURRENT_TIMESTAMP) ;";
                            $result = $conn->query($myquery_insert);
                            if ($conn->query($myquery_insert) === TRUE) {
                                echo "New record created successfully";
                            }
                            else {
                                echo "Error: " . $myquery_insert. "<br>" . $conn->error;
                            }

                        }
                    }
                    for ($i=0; $i<$arrayLen; $i=$i+3){


                        ?>

                        <?php
                        date_default_timezone_set('America/Halifax');
                        echo( date("F jS, Y - g:ia", $array[$i]))."<br>";
                        echo($array[$i+1])."<br>";


                    }
                    ?>

                    <?php

                    $myquery= "SELECT posts.postImage,comments.COMMENT FROM comments,posts WHERE posts.postid = comments.postid";
                    //echo row [key] --> columns --> line file 1 post table
                    $result = $conn->query($myquery);
                    if ($result = $conn->query($myquery)) {
                        while ($row = $result->fetch_assoc()) {
                            // comment id equal post id comments.postId == post.postId postImage
                            // if postImage == titles
                            if($getTitle == $row["postImage"]) {
                                ?>
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">

                                <?php
                                echo( date("F jS, Y - g:ia", time()))."<br>";
                                echo $row["COMMENT"]."<br>";

                            }
                            ?>
                    <?php
                    // get image from index that we will check if it is equal to comment.


                        }
                    }
                    else {
                        echo "Nothing here to display! Sorry!";
                    }
                    ?>


                    <?php



                    $conn->close();
                    //
                    //?>

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
