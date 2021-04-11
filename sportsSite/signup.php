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
    <link rel="stylesheet" href="CSS/signup.css">
    <title>Sign up</title>
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
                <a href="signup.php"><button class="btn btn-primary" type="button">Sign up</button></a>
                <a href="signin.php"><button class="btn btn-primary" type="button">Login</button></a>
                <a href="postPage.php"><button class="btn btn-primary" type="button">Post a Blog</button></a>
            </div>
        </div>
    </nav>

    <!-- Sign up Form -->
    <form action="signup-verify.php" id="signup-form" method="post" enctype="multipart/form-data">
        <div class="container" id="signup-area">
            <h1>Registration</h1>
            <hr class="mb-3">

            <?php
                if (isset($_REQUEST['error'])) {
                    echo("
                    <div class='alert alert-danger' role='alert'>
                        Username or Email already used!
                    </div>");
                }
            ?>

            <div class="container" id="password-warning"></div>
            </div>


            <div class="container">
                <div class="form-group row justify-content-center">
                    <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    </div>
                </div>

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
                    <label for="re-enter-password" class="col-sm-2 col-form-label">Re-enter Password</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="re-enter-password" placeholder="Re-enter Password" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control-file" id="image" name="image" placeholder="Image" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <input type="submit" class="btn btn-primary justify-content-center" name="submitted" value="Sign Up">
                </div>

            </div>
            <hr class="mb-3">

            <div class="container d-flex justify-content-center">
                <p class="p-2">Already have an account?</p>
                <div class="d-inline-flex p-2">
                    <a href="signin.php"><button class="btn btn-primary" type="button">Login</button></a>
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
<script src="scripts/checkPassword.js"></script>

</html>