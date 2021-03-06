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
    <link rel="stylesheet" href="CSS/signin.css">
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
                <a href="signup.php"><button class="btn btn-primary" type="button">Sign up</button></a>
                <a href="signin.php"><button class="btn btn-primary" type="button">Login</button></a>
                <a href="postPage.php"><button class="btn btn-primary" type="button">Post a Blog</button></a>
            </div>
        </div>
    </nav>

    <form action="signin-verify.php" method="get">
        <div class="container" id="signin-area">
        <h1>Sign In</h1>
            <hr class="mb-3">

            <?php
                if (isset($_REQUEST['error'])) {
                    echo("
                    <div class='alert alert-danger' role='alert'>
                        Username not found, or password does not match.
                    </div>");
                }
            ?>

            <div class="container">
                <div class="form-group row justify-content-center">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <input type="submit" class="btn btn-primary justify-content-center" name="submitted" value="Login">
                </div>
            </div>

            <hr class="mb-3">
            <div class="container d-flex justify-content-center">
                <p class="p-2">Don't have an account?</p>
                <div class="d-inline-flex p-2">
                    <a href="signup.php"><button class="btn btn-primary" type="button">Sign Up</button></a>
                </div>
            </div>
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

</html>