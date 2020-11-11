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

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/<?php echo($_GET['title']);?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?php echo $_GET['comment']?></h1>
                    <span class="meta">Posted by
              <a href="about.php">Lorem Nullam</a>
            on August 24, 2019</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- submit the comments -->
<?php
include_once 'function.php';

$postid = $_GET['post_id'];
$name = $_POST['COMMENT'];

$date = date("Y-m-d  H:i:s", time());

if(isset($_POST['Submits'])) {
    if(empty($_POST['COMMENT'])=='submit'){

    }
    else {
        date_default_timezone_set('America/Halifax');
        $sql= "INSERT INTO comments (commentid, userid, postid, COMMENT, date) VALUES (NULL, '1', '$postid', '$name', '$date')";
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
                        <form method="post">
                            <input type="text" class="form-control" name="COMMENT" />
                            <div class="form-group">

                            </div>
                            <button type="submit" class="btn btn-primary" name="Submits">Submit</button>
                        </form>

                    </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4">

                    <div class="media-body">


                        <h5 class="mt-0"> </h5

                        <?php
                        $getTitle= $_GET['title'];
                        $myquery= "SELECT posts.postImage,comments.COMMENT FROM comments,posts WHERE posts.postid = comments.postid ORDER BY comments.date Desc";
                        //echo row [key] --> columns --> line file 1 post table
                        $result = $conn->query($myquery);
                        if ($result = $conn->query($myquery)) {
                            date_default_timezone_set('America/Halifax');
                            while ($row = $result->fetch_assoc()) {
                                // comment id equal post id comments.postId == post.postId postImage
                                // if postImage == titles
                                if($getTitle == $row["postImage"]) {
                                    ?>

                                    <?php
                                    echo $row["COMMENT"]."<br>";
                                    echo( date("D. F jS, Y - H:i A", time()))."<br>";
                                }
                            }
                        }
                        else {
                            echo "Nothing here to display! Sorry!";
                        }
                        $conn->close();
                        ?>
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
