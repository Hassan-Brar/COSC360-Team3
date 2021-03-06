<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Graduate&family=Open+Sans&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a047e9d6ce.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/navFooter.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/blog.css">
    <title>Sports Blog</title>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
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

    <?php include 'include/getBlogData.php';?>
    <?php include 'include/increaseViewCount.php';?>

    <div class="container" id="blog">

        <div class="container" id="blog-info">
            <?php echo '<img class="img-fluid rounded" id="blog-img" src="data:image/jpeg;base64,' .base64_encode($blogImage) .'"/>' ?>
            <?php echo "<h1 id='article-title'>$blogName</h1>"?>
            <?php echo "<p id='date'>Posted: $uploadDate</p>"?>
        </div>

        <div class="container d-flex align-items-center">
            <?php echo '<img class="rounded-circle" id="profile-icon" src="data:image/jpeg;base64,' .base64_encode($uploaderImage) .'"/>';?>
            <?php echo "<p class='card-text' id='poster-name'>$uploaderFirstName $uploaderLastName</p>"?>
        </div>

        <div class="container d-flex align-items-center" style="margin-top: 10px;">
            <?php echo "<p><i class='fas fa-heart'></i> <span id='likes-count'>$likes</span></p>"?>
            <p>&nbsp&nbsp&nbsp</p>
            <?php echo "<p><i class='fas fa-eye'></i> $views</p>"?>
        </div>

        <div class="container" id="like-button-container">
            <?php include 'include/checkLiked.php';?>
        </div>

        <?php include 'likeBtn.php';?>

        <div class="container" id="text">
            <?php echo "<p>$blogText</p>"?>
        </div>
    </div>

    <div class="container" id="comments-section">
        <hr class="mb-3">
        <div class="container"><h2>Comments</h2></div>

        <div class="container">
            <ul class="list-group list-group-flush" id="comments-list">
            </ul>

            <script>
                $.ajax({
                    type: "GET",
                    url: "include/getComments.php",
                    data: { 'blogID': '<?php echo htmlspecialchars($_GET["blogID"]) ?>'}
                }).done(function(msg) {
                    $("#comments-list").html(msg);
                });

                setInterval(() => {
                    $.ajax({
                    type: "GET",
                    url: "include/getComments.php",
                    data: { 'blogID': '<?php echo htmlspecialchars($_GET["blogID"]) ?>'}
                    }).done(function(msg) {
                        $("#comments-list").html(msg);
                    });
                }, 5000);
            </script>

        </div>

        <hr class="mb-3">

        <?php include 'include/checkUserDisabled.php';?>

        <?php 
            if(!isset($_SESSION)) 
                session_start(); 

            if(isset($_SESSION["username"])) {
                echo "<div class='container' id='post-comment-section'>
                        <form>
                            <div class='form-group'>
                                <label for='post-comment'><h2>Post a comment</h2></label>
                                <textarea class='form-control' id='post-comment' name='post-comment' required></textarea>
                                <small id='comment-limit' class='form-text text-muted'>Max limit of 1000 characters.</small>
                            </div>
                            <input type='hidden' name='blogID' value='$blogID'/>
                            <button type='submit' class='btn btn-primary' id='submit-comment'>Post Comment</button>
                        </form>
                      </div>";
            } else {
                echo "<h5>Login to post a comment</h5>";
                echo "<a href='signin.php'><button class='btn btn-primary' type='button'>Login</button></a>";
            }
        ?>

        <script src="scripts/checkCommentLimit.js"></script>

        <script>
            $('#submit-comment').click(function(e) {
                e.preventDefault();
                var comment = document.getElementById('post-comment');
                if(comment.value.length > 1000)
                    return;
                $.ajax({
                    type: "POST",
                    url: "postComment.php",
                    data: { 'post-comment': $("#post-comment").val(),
                            'blogID': '<?php echo $blogID ?>' }
                }).done(function(msg) {
                    $("#no-comment").remove();
                    $("#post-comment").val("");
                    $("#comments-list").append(msg);
                });
            });
        </script>

    </div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>