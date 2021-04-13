<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a047e9d6ce.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/navFooter.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/postblog.css">
    <title>Sports Blog</title>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <h1 class="navbar-brand">T3 Blogs</h1>

        <!-- TOGGLE BUTTON -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- NAVBAR ELEMENTS -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="navbar-nav ml-auto">
                <a href="mainPage.php"><button class="btn btn-primary" type="button">Home</button></a>
                <a href="browseBlogs.php"><button class="btn btn-primary" type="button">Browse Blogs</button></a>
                <?php include 'include/navbarLoggedIn.php';?>
                <a href="postPage.php"><button class="btn btn-primary" type="button">Post a Blog</button></a>
            </div>
        </div>
    </nav>

    <!-- Must be logged in to post. If not, will go to login page -->
    <?php
        if(!isset($_SESSION)) 
            session_start(); 

        if(!isset($_SESSION["username"]))
            header("Location: http://localhost/project/sportsSite/signin.php");
    ?>

    <?php include 'include/checkUserDisabled.php';?>

    <form action="postPage-verify.php" method="post" id="blog-post-form" enctype="multipart/form-data">
        <div class="container" id="postblog-area">
            <h1>Post a Blog</h1>
            <hr class="mb-3">

            <?php
                if (isset($_REQUEST['uploadError'])) {
                    echo("
                    <div class='alert alert-danger' role='alert'>
                        There was an error uploading this blog.
                    </div>");
                }
            ?>

            <div class="container">
                <div class="form-group">
                    <label for="title"><h3>Blog Title</h3></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    <small id="title-limit" class="form-text text-muted">Max limit of 50 characters.</small>
                </div>
                
                <div class="form-group">
                    <label for="blog-image"><h3>Blog Image</h3></label>
                    <input type="file" class="form-control-file" id="blog-image" name="image" placeholder="Image" required>
                </div>

                <div class="form-group">
                    <label for="blog-text"><h3>Blog Text</h3></label>
                    <textarea class="form-control" id="blog-text" name="blog-text" required></textarea>
                    <small id="blog-limit" class="form-text text-muted">Max limit of 8000 characters.</small>
                </div>

                <div class="container">
                    <div class="form-group row">
                        <input type="submit" class="btn btn-primary justify-content-center" name="submitted" value="Post">
                    </div>
                </div>

            </div>

            <hr class="mb-3">
        </div>
    </form>

    <!-- FOOTER -->
    <footer>
        <div class="container-fluid">
            <span href="#" class="brand">T3 Blogs</span>

            <span class="float-right" id="socialMedia">
                <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="http://facebook.com"><i class="fab fa-facebook-square"></i></a>
                <a href="http://twitter.com"><i class="fab fa-twitter-square"></i></a>
            </div>
        </div>
    </footer>

</body>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="scripts/checkBlogLimit.js"></script>

</html>